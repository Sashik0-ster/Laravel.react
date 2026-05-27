<x-layouts.app>
    <div class="flex flex-col mb-4">
        <span
            class="text-xl font-semibold my-2 sm:text-2xl whitespace-nowrap dark:text-white">Цілі
            </span>
        @if(session('success'))
            <x-messages.success/>
        @elseif(session('error'))
            <x-messages.not-success/>
        @endif
    </div>


    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Таблиця Цілей</h3>

        <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
            <li class="w-full">
                <button id="active_goals" data-tabs-target="#active" type="button" role="tab" aria-controls="active" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Активні цілі</button>
            </li>
            <li class="w-full">
                <button id="completed_goals" data-tabs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Виконані цілі</button>
            </li>
            <li class="w-full">
                <button id="archived_goals" data-tabs-target="#archived" type="button" role="tab" aria-controls="archived" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Архів цілей</button>
            </li>
        </ul>
        <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
            <div class="hidden pt-4" id="active" role="tabpanel" aria-labelledby="active_goals">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                                <img class="flex-shrink-0 w-10 h-10" src="/images/products/iphone.png" alt="imac image">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900 truncate dark:text-white">
                                        iPhone 14 Pro
                                    </p>
                                    <div class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                        </svg>
                                        2.5%
                                        <span class="ml-2 text-gray-500">vs last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $445,467
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                                <img class="flex-shrink-0 w-10 h-10" src="/images/products/imac.png" alt="imac image">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900 truncate dark:text-white">
                                        Apple iMac 27"
                                    </p>
                                    <div class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                        </svg>
                                        12.5%
                                        <span class="ml-2 text-gray-500">vs last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $256,982
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                                <img class="flex-shrink-0 w-10 h-10" src="/images/products/watch.png" alt="watch image">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900 truncate dark:text-white">
                                        Apple Watch SE
                                    </p>
                                    <div class="flex items-center justify-end flex-1 text-sm text-red-600 dark:text-red-500">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                        </svg>
                                        1.35%
                                        <span class="ml-2 text-gray-500">vs last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $201,869
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                                <img class="flex-shrink-0 w-10 h-10" src="/images/products/ipad.png" alt="ipad image">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900 truncate dark:text-white">
                                        Apple iPad Air
                                    </p>
                                    <div class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                        </svg>
                                        12.5%
                                        <span class="ml-2 text-gray-500">vs last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $103,967
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                                <img class="flex-shrink-0 w-10 h-10" src="/images/products/imac.png" alt="imac image">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900 truncate dark:text-white">
                                        Apple iMac 24"
                                    </p>
                                    <div class="flex items-center justify-end flex-1 text-sm text-red-600 dark:text-red-500">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                                        </svg>
                                        2%
                                        <span class="ml-2 text-gray-500">vs last month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $98,543
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="hidden pt-4" id="completed" role="tabpanel" aria-labelledby="completed_goals">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/neil-sims.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $3320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/bonnie-green.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Bonnie Green
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $2467
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/michael-gough.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Michael Gough
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $2235
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/thomas-lean.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Thomes Lean
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $1842
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/lana-byrd.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Lana Byrd
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $1044
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="hidden pt-4" id="archived" role="tabpanel" aria-labelledby="archived_goals">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/neil-sims.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Poras
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Sashik0@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $9999999999999999999
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/bonnie-green.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Bonnie Green
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $2467
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/michael-gough.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Michael Gough
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $2235
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/thomas-lean.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Thomes Lean
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $1842
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/images/users/lana-byrd.png" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                    Lana Byrd
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $1044
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <!-- Card Footer -->
        <div class="flex items-center justify-between pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
            <div>
                <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="stats-dropdown">Last 7 days <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="stats-dropdown">
                    <div class="px-4 py-3" role="none">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                            Sep 16, 2021 - Sep 22, 2021
                        </p>
                    </div>
                    <ul class="py-1" role="none">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Yesterday</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Today</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 7 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 30 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 90 days</a>
                        </li>
                    </ul>
                    <div class="py-1" role="none">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Custom...</a>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0">
                <a href="#" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                    Full Report
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>


</x-layouts.app>
