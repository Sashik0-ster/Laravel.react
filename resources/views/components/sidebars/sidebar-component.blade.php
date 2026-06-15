<aside
    class="fixed top-15 left-0 z-30 hidden w-60 h-full lg:flex flex-col bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex-1 px-2 py-4 overflow-y-auto space-y-1 bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            @foreach ($menuItems as $menuItem)
                <li>
                    <x-sidebars.sidebar-item href="{{ route($menuItem['route']) }}"
                        active="{{ request()->routeIs($menuItem['route']) }}">
                        <img src="{{ asset('assets/sidebar-icons/' . $menuItem['icon']) }}"
                            class="w-10 h-10 inline-block mr-2 align-center" alt="icon">
                        {{ $menuItem['title'] }}
                    </x-sidebars.sidebar-item>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
