<button {{ $attributes->merge(['class' => 'px-4 py-2.5 font-bold rounded-md text-white dark:text-zinc-300 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
