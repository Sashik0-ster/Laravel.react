export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./storage/framework/views/*.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "./app/Enums/**/*.php",
    ],

    safelist: [
        'w-64',
        'w-1/2',
        'rounded-l-lg',
        'rounded-r-lg',
        'bg-gray-200',
        'grid-cols-4',
        'grid-cols-7',
        'h-6',
        'leading-6',
        'h-9',
        'leading-9',
        'shadow-lg',
        'bg-opacity-50',
        'dark:bg-opacity-80'
    ],

    darkMode: "class",

    theme: {
        extend: {
            colors: {
                primary: {
                    "50": "#eff6ff",
                    "100": "#dbeafe",
                    "200": "#bfdbfe",
                    "300": "#93c5fd",
                    "400": "#60a5fa",
                    "500": "#3b82f6",
                    "600": "#2563eb",
                    "700": "#1d4ed8",
                    "800": "#1e40af",
                    "900": "#1e3a8a"
                }
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                body: ['Inter', 'ui-sans-serif', 'system-ui'],
                mono: ['ui-monospace', 'SFMono-Regular']
            },
            transitionProperty: {
                width: 'width'
            }
        },
    },

    plugins: [
        require('flowbite/plugin')({
            charts: true,
        })
    ],
}
