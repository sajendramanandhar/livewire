<div>
    <x-slot name="title">
        Add User
    </x-slot>
    <div class="flex justify-center py-4">
        <h1 class="text-xl font-semibold dark:text-gray-400">
            Add User
        </h1>
    </div>
    <div class="sm:w-10/12 md:w-8/12 lg:w-6/12 sm:mx-auto">
        <form wire:submit.prevent="submit">
            <x-input-div>
                <x-label-required for="name">
                    {{ __('Name') }}
                </x-label-required>
                <x-input type="text"
                         wire:model="name"
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
                         wire:model="password"
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
                         wire:model="password_confirmation"
                         placeholder="Enter password again"/>
                @error('password_confirmation')
                <x-error>
                    {{ $message }}
                </x-error>
                @enderror
            </x-input-div>
            @if (session('success'))
                <div
                    class="fixed flex bottom-2 left-0 w-full justify-center px-3">
                    <div
                        class="bg-emerald-200 dark:bg-emerald-700 p-3 rounded-md dark:text-white animate-bounce w-full sm:w-8/12 md:w-7-12 lg:w-6/12 xl:w-4/12">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <button type="submit"
                    class="bg-blue-600 dark:bg-blue-700 text-white dark:text-zinc-300 py-2.5 px-6 rounded-md font-bold hover:bg-blue-700 dark:hover:bg-blue-800">
                Save
            </button>
        </form>
    </div>
</div>
