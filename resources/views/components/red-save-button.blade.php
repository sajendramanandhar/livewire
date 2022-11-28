<x-save-button {{ $attributes->merge(['class' => 'bg-red-600 dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-800 disabled:dark:bg-red-500 disabled:bg-red-400']) }}>
    {{ $slot }}
</x-save-button>
