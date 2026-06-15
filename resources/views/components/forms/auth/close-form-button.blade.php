<button data-drawer-dismiss="drawer-create-product-default"
    {{ $attributes->merge([
        'class' =>
            'inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-2 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600',
    ]) }}>
    <svg aria-hidden="true" class="w-5 h-5 -ml-1 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
        </path>
    </svg>

    {{ $slot }}

</button>
