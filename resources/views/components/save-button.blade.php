<button type="submit"
        wire:loading.class="cursor-not-allowed"
        wire:loading.attr="disabled"
        class="inline-flex items-center px-4 py-2.5 font-bold rounded-md text-white dark:text-zinc-300 bg-blue-600 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 transition ease-in-out duration-150 disabled:dark:bg-blue-500 disabled:bg-blue-400">
    <div wire:loading>
        <svg class="animate-spin h-4 w-4 text-white mr-2" xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>
    Save
</button>
