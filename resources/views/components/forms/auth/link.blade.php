@props (['href'])
<a {{$attributes->merge(['href'=> $href, 'class' => 'text-primary-700 hover:underline dark:text-primary-500'])}}>
  {{$slot}}
</a>
