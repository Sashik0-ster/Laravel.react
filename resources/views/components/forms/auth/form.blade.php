@props(['class'=>'','action', 'method'])

<form
    action="{{ $action }}"
    method="{{ $method == 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => $class]) }}
>
    @if($method != 'GET')
        @csrf
    @endif

    {{ $slot }}
</form>
