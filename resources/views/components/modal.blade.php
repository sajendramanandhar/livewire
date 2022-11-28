<div
    :class="{'animate__zoomIn': modal, 'animate__zoomOut': !modal}"
    {{ $attributes->merge(['class' => 'w-full bg-white dark:bg-black animate__animated animate__zoomIn']) }}
    @click.away="modal = false">
    {{ $slot }}
</div>
