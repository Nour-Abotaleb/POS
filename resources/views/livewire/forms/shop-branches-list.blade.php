<div class="w-full">
    <ul class="text-sm text-gray-700 dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-600">
        @foreach ($restaurant->branches as $item)
            <li>
                <button
                    type="button"
                    wire:key="branch-pick-{{ $item->id }}"
                    wire:click="selectBranch({{ $item->id }})"
                    class="w-full flex items-center justify-between gap-2 px-4 py-3 text-start hover:bg-gray-50 dark:hover:bg-gray-600/80 transition"
                >
                    <span class="font-medium">{{ $item->name }}</span>
                    @if ($shopBranch && (int) $shopBranch->id === (int) $item->id)
                        <span class="text-xs shrink-0 text-[var(--brand-primary)]">✓</span>
                    @endif
                </button>
            </li>
        @endforeach
    </ul>
</div>
