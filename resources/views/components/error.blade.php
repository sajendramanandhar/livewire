<div {{ $attributes->merge(['class' => 'text-red-500 font-semibold animate__animated animate__flash']) }} id="{{ rand() }}">
    {{ $slot }}
</div>
