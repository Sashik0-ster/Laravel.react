<button {{$attributes->merge([
    'class' => 'w-full px-5 py-3 bg-gray-500 border-gray-400 text-base font-medium text-center text-white bg-primary-700 rounded-lg
    hover:bg-primary-800 focus:ring-2 focus:ring-primary-700
    sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800'
])}}>

    {{$slot}}

</button>
