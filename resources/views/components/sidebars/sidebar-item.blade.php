@props(['href' => '#', 'active' => false])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 ' . ($active ? 'bg-gray-100 dark:bg-gray-700' : '')]) }}>
{{--    {{ $icon }}--}}
    <span class="ml-3">{{ $slot }}</span>
</a>
