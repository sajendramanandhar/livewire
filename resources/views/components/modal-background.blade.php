<div
    class="fixed inset-0 z-20 bg-opacity-75 bg-zinc-500 dark:bg-zinc-800 dark:bg-opacity-95 flex justify-center items-center"
    @keydown.esc.window.prevent="modal = false"
    x-cloak
    x-show="modal">
    {{ $slot }}
</div>
