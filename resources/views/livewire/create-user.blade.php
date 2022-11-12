<div>
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
                         wire:model.defer="email"
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
            @if (session('success'))
                <div
                    class="fixed flex bottom-4 left-0 w-full justify-center px-3"
                    id="{{ rand() }}"
                    x-data="{ alert : true }"
                    x-show="alert"
                    x-transition:leave="duration-500">
                    <div
                        :class="{'animate__flash': alert, 'animate__fadeOut': !alert}"
                        class="bg-emerald-200 dark:bg-emerald-700 p-3 rounded-md dark:text-white animate__animated w-full sm:w-8/12 md:w-7-12 lg:w-6/12 xl:w-4/12 flex justify-between"
                        style="animation-iteration-count: 1.5">
                        <div>
                            {{ session('success') }}
                        </div>
                        <div class="flex items-center ml-2">
                            <a href="#" @click="alert = false">
                                <svg fill="none" class="w-3 h-3" viewBox="0 0 48 48"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="white" fill-opacity="0.01" height="48" width="48">
                                    </rect>
                                    <path d="M8 8L40 40" stroke="currentColor" stroke-width="6" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    <path d="M8 40L40 8" stroke="currentColor" stroke-width="6" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            <button type="submit"
                    wire:loading.class="cursor-not-allowed"
                    wire:loading.attr="disabled"
                    class="inline-flex items-center px-4 py-2.5 font-bold rounded-md text-white dark:text-zinc-300 bg-blue-600 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-800 transition ease-in-out duration-150">
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
        </form>
    </div>
</div>
