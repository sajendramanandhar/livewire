<div class="inline" x-data="{ modal : @entangle('modalStatus') }">
    <a @click="modal = true" href="#" title="Delete">
        <svg fill="none" class="w-5 h-5" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
            <rect fill="white" fill-opacity="0.01" height="48" width="48">
            </rect>
            <path d="M9 10V44H39V10H9Z" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linejoin="round"></path>
            <path d="M20 20V33" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <path d="M28 20V33" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <path d="M4 10H44" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <path d="M16 10L19.289 4H28.7771L32 10H16Z" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linejoin="round"></path>
        </svg>
    </a>
    <div
        class="fixed inset-0 z-20 bg-opacity-75 bg-zinc-500 dark:bg-zinc-600 dark:bg-opacity-95 flex justify-center items-center"
        @keydown.esc.window.prevent="modal = false" x-show="modal" style="display: none;"
        x-transition:leave="duration-500">
        <div
            :class="{'animate__zoomIn': modal, 'animate__zoomOut': !modal}"
            class="pt-2 pb-4 px-4 mx-4 w-full bg-white dark:bg-black animate__animated animate__zoomIn sm:w-6/12 lg:w-4/12 xl:w-3/12"
            @click.away="modal = false">
            <div class="flex mb-2 text-lg">
                {{ __('Are you sure you want to delete?') }}
            </div>
            <div>
                <div class="flex">
                    <form wire:submit.prevent="submit"
                          class="delete-form" method="post">
                        <x-red-button class="mr-3 w-20">
                            {{ __('Yes') }}
                        </x-red-button>
                    </form>
                    <x-blue-button class="w-20 capitalize"
                                   @click="modal = false">
                        {{ __('No') }}
                    </x-blue-button>
                </div>
            </div>
        </div>
    </div>
</div>
