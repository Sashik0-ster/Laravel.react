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

        <ul class="flex text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg dark:divide-gray-600 dark:text-gray-400"
            id="fullWidthTab"
            data-tabs-toggle="#fullWidthTabContent"
            role="tablist">

            <li class="w-full">
                <button id="active_goals"
                        data-tabs-target="#active"
                        type="button"
                        role="tab"
                        aria-controls="active"
                        aria-selected="true"
                        class="inline-flex items-center justify-center w-full p-3 sm:p-4 rounded-t-lg bg-gray-50 hover:bg-gray-600 focus:outline-1 focus:outline-offset-0 focus:outline-gray-500 active:bg-gray-500 dark:bg-gray-700 dark:hover:bg-gray-600"
                        title="Активні цілі">

                    <svg class="w-5 h-5 sm:mr-2 shrink-0 text-green-500" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                    <span class="hidden sm:inline">Активні цілі</span>
                </button>
            </li>

            <li class="w-full">
                <button id="completed_goals"
                        data-tabs-target="#completed"
                        type="button"
                        role="tab"
                        aria-controls="completed"
                        aria-selected="false"
                        class="inline-flex items-center justify-center w-full p-3 sm:p-4 rounded-t-lg bg-gray-50 hover:bg-gray-600 focus:outline-1 focus:outline-offset-0 focus:outline-gray-500 active:bg-gray-500 dark:bg-gray-700 dark:hover:bg-gray-600"
                        title="Виконані цілі">

                    <svg class="w-5 h-5 sm:mr-2 shrink-0 text-blue-500" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                    <span class="hidden sm:inline">Виконані цілі</span>
                </button>
            </li>

            <li class="w-full">
                <button id="archived_goals"
                        data-tabs-target="#archived"
                        type="button"
                        role="tab"
                        aria-controls="archived"
                        aria-selected="false"
                        class="inline-flex items-center justify-center w-full p-3 sm:p-4 rounded-t-lg bg-gray-50 hover:bg-gray-600 focus:outline-1 focus:outline-offset-0 focus:outline-gray-500 active:bg-gray-500 dark:bg-gray-700 dark:hover:bg-gray-600"
                        title="Архів цілей">

                    <svg class="w-5 h-5 sm:mr-2 shrink-0 text-gray-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>

                    <span class="hidden sm:inline">Архів цілей</span>
                </button>
            </li>
        </ul>

        <div id="fullWidthTabContent" class=" dark:border-gray-600">

            <div class="hidden" id="active" role="tabpanel" aria-labelledby="active_goals">
                <x-goals-mobile :goals="$goals->where('status', 'active')"/>
                <x-tables.goals-table :goals="$goals->where('status', 'active')"/>
            </div>

            <div class="hidden" id="completed" role="tabpanel" aria-labelledby="completed_goals">
                <x-goals-mobile :goals="$goals->where('status', 'completed')"/>
                <x-tables.goals-table :goals="$goals->where('status', 'completed')"/>
            </div>

            <div class="hidden" id="archived" role="tabpanel" aria-labelledby="archived_goals">
                <x-goals-mobile :goals="$goals->where('status', 'archived')"/>
                <x-tables.goals-table :goals="$goals->where('status', 'archived')"/>
            </div>

        </div>

        <div class="flex items-center justify-between pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
            <div>
                <button
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    type="button"
                    data-dropdown-toggle="stats-dropdown">
                    Last 7 days
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div
                    class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="stats-dropdown">
                    <div class="px-4 py-3" role="none">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">Sep 16, 2021 -
                            Sep 22, 2021</p>
                    </div>
                    <ul class="py-1" role="none">
                        <li><a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                               role="menuitem">Yesterday</a></li>
                        <li><a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                               role="menuitem">Today</a></li>
                        <li><a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                               role="menuitem">Last 7 days</a></li>
                        <li><a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                               role="menuitem">Last 30 days</a></li>
                        <li><a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                               role="menuitem">Last 90 days</a></li>
                    </ul>
                    <div class="py-1" role="none">
                        <a href="#"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                           role="menuitem">Custom...</a>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0">
                <a href="#"
                   class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                    Full Report
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>


</x-layouts.app>
