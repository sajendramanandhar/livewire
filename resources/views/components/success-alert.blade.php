@if (session('success'))
    <x-alert class="bg-emerald-200 dark:bg-emerald-700">
        {{ session('success') }}
    </x-alert>
@endif
