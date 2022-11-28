<div>
    <x-alerts/>
    <x-slot name="title">
        {{ __('Users') }}
    </x-slot>
    <x-h1-div>
        <x-h1>
            {{ __('Add User') }}
        </x-h1>
    </x-h1-div>
    <x-breadcrumb-div>
        <a href="#">
            {{ __('Dashboard') }}
        </a>
        <x-breadcrumb-separator-div/>
        <x-breadcrumb-disabled>
            {{ __('Users') }}
        </x-breadcrumb-disabled>
    </x-breadcrumb-div>
    <div class="mb-4 flex flex-col gap-y-4 md:flex-row md:gap-x-4">
        <livewire:create-user/>
        <x-input wire:model="keyword"
                 type="text"
                 placeholder="Search Users"/>
        <select wire:model="column"
                class="p-3 w-full bg-zinc-200 rounded-md dark:placeholder-zinc-500 dark:bg-zinc-800 focus:outline-none focus:outline-zinc-400 focus:outline-offset-0 dark:focus:outline-zinc-600 mb-1 dark:text-zinc-400">
            <option value="name">
                {{ __('Name') }}
            </option>
            <option value="email">
                {{ __('Email') }}
            </option>
            <option value="created_at">
                {{ __('Created At') }}
            </option>
        </select>
        <select wire:model="sortOrder"
                class="p-3 w-full bg-zinc-200 rounded-md dark:placeholder-zinc-500 dark:bg-zinc-800 focus:outline-none focus:outline-zinc-400 focus:outline-offset-0 dark:focus:outline-zinc-600 mb-1 dark:text-zinc-400">
            <option value="asc">
                {{ __('ASC') }}
            </option>
            <option value="desc">
                {{ __('DESC') }}
            </option>
        </select>
        <select wire:model="perPage"
                class="p-3 w-full bg-zinc-200 rounded-md dark:placeholder-zinc-500 dark:bg-zinc-800 focus:outline-none focus:outline-zinc-400 focus:outline-offset-0 dark:focus:outline-zinc-600 mb-1 dark:text-zinc-400">
            <option value="10">
                {{ __('10') }}
            </option>
            <option value="25">
                {{ __('25') }}
            </option>
            <option value="50">
                {{ __('50') }}
            </option>
            <option value="100">
                {{ __('100') }}
            </option>
        </select>
    </div>
    <div class="overflow-x-auto w-full mb-8 border dark:border-zinc-800 rounded-2xl">
        <table class="w-full">
            <thead>
            <tr>
                <x-th>
                    {{ __('Name') }}
                </x-th>
                <x-th>
                    {{ __('Email') }}
                </x-th>
                <x-th>
                    {{ __('Created At') }}
                </x-th>
                <x-th>
                    {{ __('Status') }}
                </x-th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-900 whitespace-nowrap">
                    <x-td>
                        {{ $user->name }}
                    </x-td>
                    <x-td>
                        {{ $user->email }}
                    </x-td>
                    <x-td>
                        {{ $user->created_at }}
                    </x-td>
                    <x-td class="flex space-x-4 sm:space-x-3 justify-center">
                        <a href="{{ route('users.edit',['user' => $user]) }}" title="Edit"
                           edit-button-1="">
                            <svg fill="none" class="w-5 h-5" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <rect fill="white" fill-opacity="0.01" height="48" width="48">
                                </rect>
                                <path
                                    d="M29 4H9C7.89543 4 7 4.89543 7 6V42C7 43.1046 7.89543 44 9 44H37C38.1046 44 39 43.1046 39 42V20.0046"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M13 18H21" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round"></path>
                                <path d="M13 28H25" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round"></path>
                                <path d="M40.9991 6.00079L29.0044 17.9956" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <livewire:delete-user
                            :user="$user"
                            :wire:key="'delete-user-'.$user->id"/>
                    </x-td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>
