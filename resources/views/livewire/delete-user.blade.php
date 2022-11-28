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
    <x-modal-background>
        <x-modal class="pt-4 pb-6 px-6 mx-4 sm:w-8/12 md:w-6/12 lg:w-5/12 xl:w-4/12 2xl:w-3/12 rounded-2xl">
            <div class="flex mb-4 text-lg">
                {{ __('Are you sure you want to delete?') }}
            </div>
            <div>
                <div class="flex">
                    <form wire:submit.prevent="submit"
                          class="delete-form" method="post">
                        <x-red-save-button class="mr-4 w-24">
                            {{ __('Yes') }}
                        </x-red-save-button>
                    </form>
                    <x-blue-button class="w-24 capitalize"
                                   @click="modal = false">
                        {{ __('No') }}
                    </x-blue-button>
                </div>
            </div>
        </x-modal>
    </x-modal-background>
</div>
