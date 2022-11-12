<div
    class="fixed flex bottom-4 left-0 w-full justify-center px-3"
    id="{{ rand() }}"
    x-data="{ alert : true }"
    x-show="alert"
    x-transition:leave="duration-500">
    <div
        :class="{'animate__flash': alert, 'animate__fadeOut': !alert}"
        {{ $attributes->merge(['class' => 'p-3 rounded-md dark:text-white animate__animated w-full sm:w-8/12 md:w-7-12 lg:w-6/12 xl:w-4/12 flex justify-between']) }}
        style="animation-iteration-count: 1.5">
        <div>
            {{ $slot }}
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
