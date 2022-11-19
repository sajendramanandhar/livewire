<div>
    <x-alerts/>
    <x-slot name="title">
        {{ __('Edit User') }}
    </x-slot>
    <x-h1-div>
        <x-h1>
            {{ __('Edit User') }}
        </x-h1>
    </x-h1-div>
    <div class="sm:w-10/12 md:w-8/12 lg:w-6/12 sm:mx-auto">
        <x-breadcrumb-div>
            <a href="#">
                {{ __('Dashboard') }}
            </a>
            <x-breadcrumb-separator-div/>
            <a href="{{ route('users.index') }}">
                {{ __('Users') }}
            </a>
            <x-breadcrumb-separator-div/>
            <x-breadcrumb-disabled>
                {{ __('Create') }}
            </x-breadcrumb-disabled>
        </x-breadcrumb-div>
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
                         placeholder="Enter Email"
                         required
                         type="email"
                         wire:model.defer="email"/>
                <x-errors key="email"/>
            </x-input-div>
            <x-save-button/>
        </form>
    </div>
</div>
