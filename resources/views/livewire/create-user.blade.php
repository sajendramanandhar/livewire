<div>
    <x-alerts/>
    <x-slot name="title">
        Add User
    </x-slot>
    <div class="flex justify-center py-4">
        <h1 class="text-xl font-semibold dark:text-zinc-300">
            Add User
        </h1>
    </div>
    <div class="sm:w-10/12 md:w-8/12 lg:w-6/12 sm:mx-auto">
        <div
            class="dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-800 p-4 flex justify-center mb-8 space-x-4">
            <a href="#">
                Dashboard
            </a>
            <div class="mx-4">-</div>
            <a href="#">
                Users
            </a>
            <div class="mx-4">-</div>
            <span class="text-zinc-500">
                Create
            </span>
        </div>
        <form wire:submit.prevent="submit">
            <x-input-div>
                <x-label-required for="name">
                    {{ __('Name') }}
                </x-label-required>
                <x-input type="text"
                         wire:model.defer="name"
                         placeholder="Enter name"/>
                @error('name')
                <x-error>
                    {{ $message }}
                </x-error>
                @enderror
            </x-input-div>
            <x-input-div>
                <x-label-required for="email">
                    {{ __('Email') }}
                </x-label-required>
                <x-input type="email"
                         wire:model="email"
                         autocomplete="off"
                         placeholder="Enter email"/>
                @error('email')
                <x-error>
                    {{ $message }}
                </x-error>
                @enderror
            </x-input-div>
            <x-input-div>
                <x-label-required for="password">
                    {{ __('Password') }}
                </x-label-required>
                <x-input type="password"
                         wire:model.defer="password"
                         placeholder="Enter password"/>
                @error('password')
                <x-error>
                    {{ $message }}
                </x-error>
                @enderror
            </x-input-div>
            <x-input-div>
                <x-label-required for="confirm_password">
                    {{ __('Confirm Password') }}
                </x-label-required>
                <x-input type="password"
                         wire:model.defer="password_confirmation"
                         placeholder="Enter password again"/>
                @error('password_confirmation')
                <x-error>
                    {{ $message }}
                </x-error>
                @enderror
            </x-input-div>
            <x-save-button/>
        </form>
    </div>
</div>
