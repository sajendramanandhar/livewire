<button {{ $attributes->merge(['class' => 'px-4 py-2.5 font-bold rounded-md text-white dark:text-zinc-300 bg-blue-600 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 transition ease-in-out duration-150 disabled:dark:bg-blue-500 disabled:bg-blue-400 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
