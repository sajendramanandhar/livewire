@foreach($errors->get($key) as $error)
    <x-error>
        {{ $error }}
    </x-error>
@endforeach
