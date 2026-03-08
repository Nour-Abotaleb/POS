# POS Performance Fixes – Issues & Solutions

This document describes the performance issues that were identified on the POS screen (slow clicks, slow loading, infinite update loops) and the solutions that were applied.

---

## Issue 1: Infinite / Repeated Update Requests (Network Tab)

**Symptom:** The Network tab showed many repeated `update` requests, some taking 3–4 seconds each, with some staying in a "pending" state. The page felt like it was stuck in an endless update loop.

**Cause:** The menu’s scroll handler runs every **100 ms** (throttled). When the user scrolls near the bottom, it calls `$wire.loadMoreMenuItems()`. Each call triggers a full Livewire update request. Because one update takes several seconds, multiple scroll events fire before the first response returns, so many `loadMoreMenuItems()` calls were queued and many `update` requests were sent in parallel.

**Solution:**

| Location | Change |
|----------|--------|
| **`app/Livewire/Pos/Pos.php`** | Added a **server-side throttle**: new property `$lastLoadMoreAt`. In `loadMoreMenuItems()`, only allow loading more if at least **1.5 seconds** have passed since the last call. This limits how often new update requests are accepted. |
| **`resources/views/pos/menu.blade.php`** | Added a **client-side throttle** in the Alpine scroll handler: track `lastLoadMoreAt` and only call `$wire.loadMoreMenuItems()` if at least **1.5 seconds** have passed since the last call. This prevents sending a new request on every 100 ms scroll tick. |

**Result:** At most one “load more” update per 1.5 seconds while scrolling, so the infinite-looking stream of updates stops.

---

## Issue 2: Slow Response on Clicks and Interactions

**Symptom:** Each click or interaction (e.g. opening modals, typing in the order note) felt slow and triggered heavy or repeated network activity.

**Cause:**

- **Modals:** Using `wire:model.live` on modal visibility (e.g. `showVariationModal`, `showTableModal`) made Livewire keep the modal state in sync on every request. That added extra round-trips and re-renders.
- **Order note:** Using `wire:model="orderNote"` (no defer) sent an update to the server on **every keystroke**, causing many small updates and a sluggish feel while typing.

**Solution:**

| Location | Change |
|----------|--------|
| **`resources/views/livewire/pos/pos.blade.php`** | **Modals:** Replaced `wire:model.live` with `wire:model` for: `showVariationModal`, `showKotNote`, `showTableModal`, `showDiscountModal`, `showModifiersModal`. Modal open/close still updates the component, but without the extra live syncing that was triggering unnecessary requests. |
| **`resources/views/livewire/pos/pos.blade.php`** | **Order note:** Replaced `wire:model="orderNote"` with `wire:model.defer="orderNote"`. The note is only sent with the next user action (e.g. Save), not on every keystroke. |

**Result:** Fewer round-trips and less work on each click and while typing, so interactions feel faster.

---

## Issue 3: Slow Initial / Loading Data

**Symptom:** Initial load and “loading data” felt slow; large assets (e.g. `app-Regf714y.js`, `app_8HcxDuFI.css`, `livewire.min.js`) contributed to long load times.

**Cause:** The infinite/repeated update loop (Issue 1) and the extra requests from live bindings (Issue 2) made the page constantly busy with `update` requests. That made both initial load and subsequent “loading data” feel slow and sometimes caused multiple overlapping requests.

**Solution:** Addressed indirectly by fixing Issues 1 and 2:

- Throttling `loadMoreMenuItems()` (Issue 1) stops the flood of update requests when scrolling the menu.
- Using `wire:model` (no `.live`) on modals and `wire:model.defer` on the order note (Issue 2) reduces the number of update requests on interaction.

**Result:** Fewer concurrent and repeated requests, so the page can finish initial load and “loading data” without being overwhelmed by infinite or unnecessary updates.

---

## Summary Table

| Issue | Root cause | Fix |
|-------|------------|-----|
| Update loads infinite | Scroll handler called `loadMoreMenuItems()` every 100 ms with no throttle | 1.5 s throttle in PHP and in Alpine scroll handler |
| Slow clicks / modals | `wire:model.live` on modals caused extra sync/round-trips | `wire:model` (no `.live`) on all POS modals |
| Slow typing (order note) | `wire:model` on order note sent an update per keystroke | `wire:model.defer="orderNote"` |
| Slow loading data | Cascading effect of infinite updates and extra live bindings | Resolved by fixing the above |

---

## Files Modified

- `app/Livewire/Pos/Pos.php` – Added `$lastLoadMoreAt`, throttling inside `loadMoreMenuItems()`.
- `resources/views/pos/menu.blade.php` – Throttled scroll handler (1.5 s) before calling `loadMoreMenuItems()`.
- `resources/views/livewire/pos/pos.blade.php` – Modal bindings changed from `wire:model.live` to `wire:model`; order note to `wire:model.defer`.

Search already used `wire:model.live.debounce.500ms="search"`, so it was left unchanged.

---

## Additional Enhancements (from screenshot analysis)

These changes reduce POS payload and improve load time without changing behaviour.

### Issue 4: Unnecessary scripts and CSS on POS

**Symptom:** Large JS/CSS (trix ~174 KB, html-to-image, trix.css ~20 KB) loaded on every page including POS, where they are not used.

**Solution:**

| Location | Change |
|----------|--------|
| **`resources/views/layouts/app.blade.php`** | On POS routes (`pos.*`), do **not** load: `trix.css`, `trix.umd.min.js`, `html-to-image.min.js`, `print-image-handler.js`. Wrapped in `@unless(request()->routeIs('pos.*'))`. |
| **Note** | `livewire-alert.js` is still loaded on POS (required for toast alerts from `$this->alert()`). |

**Result:** POS no longer downloads ~200 KB+ of unused scripts and CSS. Faster initial load.

---

### Issue 5: Short cache TTL for menu/category/order-type data

**Symptom:** Menu list, category list, and order types were cached for 5 minutes (`60 * 5`), causing more DB/cache misses and slightly heavier responses over time.

**Solution:**

| Location | Change |
|----------|--------|
| **`app/Livewire/Pos/Pos.php`** | Increased cache TTL from **5 minutes** to **1 hour** (3600 seconds) for: `pos_menulist_{branchId}`, `pos_order_types_*`, `pos_category_list_{branchId}_*`. |

**Result:** Fewer cache misses; menu/category/order-type data reused longer. Menu items query was already cached for 2 hours; unchanged.

---

### Issue 6: Image loading

**Symptom:** Images could block rendering or cause layout shifts if not hinted for async decode.

**Solution:**

| Location | Change |
|----------|--------|
| **`resources/views/pos/menu.blade.php`** | Menu item photo: added `decoding="async"`. Category/type icon: added `loading="lazy"` and `decoding="async"`. (Main photo already had `loading="lazy"`.) |

**Result:** Better perceived performance and less main-thread work during scroll.

---

## What was not changed (and why)

- **Menu items “load by category”** – Already in place: items are filtered by `menuId`, `filterCategories`, and `search`; only the first batch is loaded via `loadInitialMenuItems()` (40 items), then “load more” on scroll. No change.
- **JS bundle code splitting** – Would require Vite/Webpack and route-based entry points. Not done in this pass.
- **Virtual scrolling** – Current “load more on scroll” already limits DOM size; virtual scrolling would be a larger front-end change. Not done.
- **`php artisan optimize`** – One-time deployment step; run manually when deploying.

---

## Files Modified (full list)

- **`app/Livewire/Pos/Pos.php`** – Throttle `loadMoreMenuItems()` via `$lastLoadMoreAt`; cache TTL 5 min → 1 hr for menu list, order types, category list.
- **`resources/views/pos/menu.blade.php`** – Scroll throttle (1.5 s) in Alpine; `loading="lazy"` and `decoding="async"` on menu images.
- **`resources/views/livewire/pos/pos.blade.php`** – Modal bindings `wire:model.live` → `wire:model`; order note `wire:model.defer`.
- **`resources/views/layouts/app.blade.php`** – Exclude Trix (CSS + JS) and html-to-image (and print-image-handler) on `pos.*` routes.
