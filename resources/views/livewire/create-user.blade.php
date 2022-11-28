<div x-data="{ modal : @entangle('modalStatus') }">
    <a href="#"
       @click="modal = true">
        <x-blue-button class="w-32">
            {{ __('Add User') }}
        </x-blue-button>
    </a>
    <x-modal-background>
        <x-modal
            class="px-4 h-full sm:w-8/12 md:w-7/12 lg:w-6/12 xl:w-5/12 2xl:w-4/12 sm:h-auto sm:px-6 sm:rounded-2xl">
            <button class="focus:outline-none right-2 top-2 absolute" @click="modal = false">
                <x-close-icon/>
            </button>
            <x-h1-div>
                <x-h1>
                    {{ __('Add User') }}
                </x-h1>
            </x-h1-div>
            <form wire:submit.prevent="submit">
                <x-input-div>
                    <x-label-required for="name">
                        {{ __('Name') }}
                    </x-label-required>
                    <x-input maxlength="255"
                             placeholder="Enter Name"
                             required
                             type="text"
                             wire:model.defer="name"/>
                    <x-errors key="name"/>
                </x-input-div>
                <x-input-div>
                    <x-label-required for="email">
                        {{ __('Email') }}
                    </x-label-required>
                    <x-input autocomplete="off"
                             maxlength="255"
                             placeholder="Enter Email"
                             required
                             type="email"
                             wire:model.defer="email"/>
                    <x-errors key="email"/>
                </x-input-div>
                <x-input-div>
                    <x-label-required for="password">
                        {{ __('Password') }}
                    </x-label-required>
                    <x-input maxlength="40"
                             placeholder="Enter Password"
                             required
                             type="password"
                             wire:model.defer="password"/>
                    <x-errors key="password"/>
                </x-input-div>
                <x-input-div>
                    <x-label-required for="confirm_password">
                        {{ __('Confirm Password') }}
                    </x-label-required>
                    <x-input maxlength="40"
                             placeholder="Enter Password Again"
                             required
                             type="password"
                             wire:model.defer="password_confirmation"/>
                    <x-errors key="password_confirmation"/>
                </x-input-div>
                <x-blue-save-button class="mb-4 sm:mb-6">
                    {{ __('Save') }}
                </x-blue-save-button>
            </form>
        </x-modal>
    </x-modal-background>
</div>
