<div
    class="fixed flex bottom-4 left-0 w-full justify-center px-3 z-10"
    @keydown.esc.window.prevent="alert = false"
    id="{{ rand() }}"
    x-data="{ alert : true }"
    x-show="alert"
    x-transition:leave="duration-500">
    <div
        :class="{'animate__flash': alert, 'animate__fadeOut': !alert}"
        @click.away="alert = false"
        {{ $attributes->merge(['class' => 'p-3 rounded-md dark:text-white animate__animated w-full sm:w-8/12 md:w-7-12 lg:w-6/12 xl:w-4/12 flex justify-between']) }}
        style="animation-iteration-count: 2">
        <div>
            {{ $slot }}
        </div>
        <div class="flex items-center ml-2">
            <a href="#" @click="alert = false">
                <x-close-icon/>
            </a>
        </div>
    </div>
</div>
