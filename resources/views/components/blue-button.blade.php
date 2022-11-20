<x-button {{ $attributes->merge(['class' => 'bg-blue-600 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 disabled:dark:bg-blue-500 disabled:bg-blue-400']) }}>
    {{ $slot }}
</x-button>
