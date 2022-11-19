<div>
    <x-alerts/>
    <x-slot name="title">
        Users
    </x-slot>
    <x-h1-div>
        <x-h1>
            Add User
        </x-h1>
    </x-h1-div>
    <div
        class="dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-800 p-4 flex justify-center mb-8 space-x-4">
        <a href="#">
            Dashboard
        </a>
        <div class="mx-4">-</div>
        <span class="text-zinc-500">
            Users
        </span>
    </div>
    <div class="mb-4 flex flex-col gap-y-4 md:flex-row md:gap-x-4">
        <div>
            <a href="{{ route('users.create') }}">
                <x-blue-button class="w-32">
                    Add User
                </x-blue-button>
            </a>
        </div>
        <x-input wire:model="keyword"
                 type="text"
                 placeholder="Search Users"
                 class="w-full"/>
        <select wire:model="column"
                class="p-3 w-full bg-zinc-200 rounded-md dark:placeholder-zinc-500 dark:bg-zinc-800 focus:outline-none focus:outline-zinc-400 focus:outline-offset-0 dark:focus:outline-zinc-600 mb-1 dark:text-zinc-400">
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="created_at">Created At</option>
        </select>
        <select wire:model="sortOrder"
                class="p-3 w-full bg-zinc-200 rounded-md dark:placeholder-zinc-500 dark:bg-zinc-800 focus:outline-none focus:outline-zinc-400 focus:outline-offset-0 dark:focus:outline-zinc-600 mb-1 dark:text-zinc-400">
            <option value="asc">ASC</option>
            <option value="desc">DESC</option>
        </select>
        <select wire:model="perPage"
                class="p-3 w-full bg-zinc-200 rounded-md dark:placeholder-zinc-500 dark:bg-zinc-800 focus:outline-none focus:outline-zinc-400 focus:outline-offset-0 dark:focus:outline-zinc-600 mb-1 dark:text-zinc-400">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="overflow-x-auto w-full mb-8 border dark:border-zinc-800 rounded-2xl">
        <table class="w-full">
            <thead>
            <tr>
                <x-th>
                    Name
                </x-th>
                <x-th>
                    Email
                </x-th>
                <x-th>
                    Created At
                </x-th>
                <x-th>
                    Status
                </x-th>
                <x-th>
                    Action
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
                    <x-td>
                        Active
                    </x-td>
                    <x-td class="flex space-x-4 sm:space-x-3 flex justify-center">
                        <a href="#" title="Edit"
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
                        <div class="inline" delete-button-1="" x-data="{ modal : false }">
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
                                @keydown.esc.window.prevent="modal = false" x-show="modal" style="display: none;">
                                <div
                                    class="pt-2 pb-4 px-4 mx-4 w-full bg-white dark:bg-black animate__animated animate__zoomIn sm:w-6/12 lg:w-4/12 xl:w-3/12"
                                    @click.away="modal = false">
                                    <div class="mb-2 text-lg">
                                        Are you sure you want to delete?
                                    </div>
                                    <div>
                                        <div class="flex">
                                            <form action="https://tenant-1.pasal.tk/admin/product-categories/1"
                                                  class="delete-form" method="post">
                                                <input type="hidden" name="_token"
                                                       value="5rkIifdTB3sCjcGlPmu8HhSxLeTLxdBRvNUfexDc"> <input
                                                    type="hidden" name="_method" value="delete">
                                                <button
                                                    class="focus:outline-none px-4 p-2 capitalize text-white whitespace-nowrap bg-red-600 hover:bg-red-700 mr-3 w-20">
                                                    Yes
                                                </button>
                                            </form>
                                            <button
                                                class="focus:outline-none px-4 p-2 capitalize text-white whitespace-nowrap bg-blue-600 hover:bg-blue-500 w-20"
                                                @click="modal = false">
                                                No
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>
