@props(['class' => '', 'action', 'method', 'type'])

<form action="{{ $action }}" method="{{ $method == 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => $class, 'type => Model::class']) }}>
    @if ($method !== 'GET')
        @csrf
    @endif

    @if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    {{ $slot }}
</form>
