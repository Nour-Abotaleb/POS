# POS Screen Performance – What Makes It Slow

Summary of what slows down the POS screen and what was fixed or can be improved.

---

## Fixed in this pass

### 1. **`wire:key` with `microtime()` (high impact)**

**Issue:** In `menu.blade.php`, `order_items.blade.php`, and `order_detail.blade.php`, list items used `wire:key='...-{{ microtime() }}'`. Livewire uses `wire:key` to match DOM nodes between updates. With a new key every time, every item is treated as new → full list re-renders, extra DOM work, and slower UI.

**Change:** Use stable keys:

- **menu.blade.php:** `wire:key='item-input-{{ $item->id }}'`
- **order_items.blade.php:** `wire:key='menu-item-{{ $key }}'`
- **order_detail.blade.php:** `wire:key="menu-item-list"` for tbody, `wire:key='menu-item-{{ $key }}'` for rows

---

## Other factors that can make POS slow

### 2. **Heavy work inside `render()`**

On every Livewire request, `render()` in `app/Livewire/Pos/Pos.php` does:

- **Order number generation** when there’s no order: `Order::generateOrderNumber(branch())` (DB: `getOrderNumberSetting`, then `Order::where(...)->max(...)` or similar).
- **Order types:** `$this->orderTypes` (DB query via computed `orderTypes()`).
- **MultiPOS:** If the module is enabled, extra queries (e.g. `PosMachine`, branch/package, counts).

So every interaction that triggers a round-trip (search, filter, add item, etc.) runs this logic and several DB hits.

**Ideas:**

- Generate the order number only when actually creating an order (e.g. in `saveOrder` / equivalent), not on every render when `!$this->orderNumber`.
- Cache `orderTypes` for the branch (e.g. 5–15 minutes) and invalidate when order types are updated in admin.

### 3. **`wire:model.live` causing frequent round-trips**

Used in POS views for:

- Search: `wire:model.live.debounce.500ms="search"`
- Menu filter: `wire:model.live="menuId"`
- Category filter: `wire:model.live="filterCategories"`
- Plus a few others (delivery date, delivery fee, modals, etc.)

Each update triggers a full server round-trip and re-render (and thus all of the above `render()` work). Search is debounced; dropdown changes are not.

**Ideas:**

- Use `wire:model.blur` or `wire:model.defer` for filters that don’t need instant server feedback, then “Apply” or “Search” to submit.
- Keep `wire:model.live` only where you need live server-driven UI (e.g. live search results).

### 4. **Large Livewire component**

- **Size:** `app/Livewire/Pos/Pos.php` is very large (3600+ lines, 80+ public properties).
- **Effect:** Every request serializes/deserializes the whole component and re-runs a lot of logic. More properties and more code in `render()`/computed → more work per round-trip.

**Ideas:**

- Split into smaller Livewire components (e.g. menu list, cart/KOT panel, order detail) and pass only needed data.
- Use Laravel’s view partials or Blade components for read-only UI and keep Livewire only for interactive bits.

### 5. **Uncached or heavy computed data**

- **`menuList`:** Set in `mount()` with `Menu::withoutGlobalScopes()->where('branch_id', branch()->id)->orderBy('sort_order')->get()` — no cache.
- **`categoryList()`:** `ItemCategory::...->withCount('items')->...->get()` — runs every time the computed is needed (e.g. when filters change).
- **`totalMenuItemsCount()`:** Runs a `MenuItem::...->count()` query whenever the computed is needed.

Already cached elsewhere:

- `getRestaurantOrderStats()` uses `cache()->rememberForever(...)`.
- `menuItems()` uses `Cache::remember(..., 2 hours)` (with a composite key).
- Waiters, taxes, delivery executives, cancel reasons use multi-hour cache.

**Ideas:**

- Cache `menuList` in `mount()` (e.g. by branch, 5–15 min) or use a short-lived cache in a dedicated accessor.
- Cache `categoryList` and `totalMenuItemsCount` (e.g. by branch + `menuId` + `filterCategories` + `search`) with short TTL and clear when menus/categories/items change.

### 6. **N+1 and heavy queries when loading an order**

When opening a table/order, the component loads orders, KOTs, items, etc. with various `->with(...)`. If any relation is used in the view without being eager-loaded, it can cause N+1 queries. The `order_detail` view uses `$orderDetail->items->load('modifierOptions')` inside the loop — `load()` there is redundant if `items` are already loaded with `modifierOptions`; otherwise it can add extra queries.

**Idea:** Ensure one consistent eager load for the order detail (e.g. `order->load(['items.menuItem', 'items.menuItemVariation', 'items.modifierOptions'])`) and avoid ad-hoc `load()` in the view.

### 7. **Layout and global helpers**

The main layout (`layouts/app.blade.php`) calls helpers like `restaurantOrGlobalSetting()` for theme, favicon, etc. If those hit the DB or do heavy work on every full page load, they add to initial POS load time. `getRestaurantOrderStats(branch()->id)` in the POS menu view is already cached; other helpers used on every request are worth checking.

---

## Quick wins (in order of impact)

1. **Done:** Stable `wire:key` (no `microtime()`) in POS views.
2. **Next:** Move order number generation out of `render()` to the moment you actually create the order.
3. **Next:** Reduce `wire:model.live` usage (e.g. defer/blur for filters, keep live only for search if needed).
4. **Then:** Short-lived cache for `menuList`, `orderTypes`, `categoryList`, and optionally `totalMenuItemsCount`.
5. **Longer term:** Split the big Pos component and avoid unnecessary `load()` in order detail view.

---

## How to verify

- Open POS, open DevTools → Network. Filter by your app (e.g. “livewire” or “XHR”). Change search, change menu/category, add an item. Confirm fewer or lighter requests and that list items don’t all re-mount (no flicker).
- Enable Laravel Debugbar or Telescope and watch query count and time on POS actions; focus on `render()` and computed properties.
