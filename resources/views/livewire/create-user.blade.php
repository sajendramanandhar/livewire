<div>
    <x-alerts/>
    <x-slot name="title">
        Add User
    </x-slot>
    <x-h1-div>
        <x-h1>
            Add User
        </x-h1>
    </x-h1-div>
    <div class="sm:w-10/12 md:w-8/12 lg:w-6/12 sm:mx-auto">
        <div
            class="dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-800 p-4 flex justify-center mb-8 space-x-4">
            <a href="#">
                Dashboard
            </a>
            <div class="mx-4">-</div>
            <a href="{{ route('users.index') }}">
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
                <x-input maxlength="255"
                         placeholder="Enter name"
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
                         placeholder="Enter email"
                         required
                         type="email"
                         wire:model="email"/>
                <x-errors key="email"/>
            </x-input-div>
            <x-input-div>
                <x-label-required for="password">
                    {{ __('Password') }}
                </x-label-required>
                <x-input maxlength="40"
                         placeholder="Enter password"
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
                         placeholder="Enter password again"
                         required
                         type="password"
                         wire:model.defer="password_confirmation"/>
                <x-errors key="password_confirmation"/>
            </x-input-div>
            <x-save-button/>
        </form>
    </div>
</div>
