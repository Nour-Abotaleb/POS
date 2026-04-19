@props(['id' => null, 'maxWidth' => null, 'maxHeight' => null, 'forceAboveHeader' => false, 'noPadding' => false])

<x-modal :id="$id" :maxWidth="$maxWidth" :maxHeight="$maxHeight" :forceAboveHeader="$forceAboveHeader" {{ $attributes }}>
    <div @class(['px-6 py-4' => !$noPadding])>
    

        <div @class(['mt-4 text-sm text-gray-600 dark:text-gray-400' => !$noPadding])>
            {{ $content }}
        </div>
    </div>

    @if (isset($footer))
    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-end">
        {{ $footer }}
    </div>
    @endif
</x-modal>