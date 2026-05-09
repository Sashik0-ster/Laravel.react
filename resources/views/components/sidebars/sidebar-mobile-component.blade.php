<div
    class="hidden w-full my-1 bg-white border-1 dark:bg-gray-800 dark:border-gray-700"
    id="toggleSidebarMobileOpen">

    <ul class="p-6 space-y-1 dark:bg-gray-800 dark:border-gray-700">

        @foreach($menuItems as $menuItem)
            <li>
                <x-sidebars.sidebar-item href="{{ route($menuItem['route']) }}">
                    <img src="{{ asset('assets/sidebar-icons/' . $menuItem['icon']) }}"
                         class="w-10 h-10 inline-block mr-2 align-center" alt="icon">
                    {{ $menuItem['title'] }}
                </x-sidebars.sidebar-item>
            </li>
        @endforeach

    </ul>

</div>

