@props(['name'])

<input {{ $attributes->merge([
    'name' => $name,
    'value' => old($name),
    'class' => 'bg-gray-50 border sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white ' .
    ($errors->has($name)
        ? 'border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500 dark:border-red-500 dark:text-red-500'
        : 'border-gray-300 text-gray-900 focus:ring-primary-500 focus:border-primary-500 dark:border-gray-600')
]) }}>


