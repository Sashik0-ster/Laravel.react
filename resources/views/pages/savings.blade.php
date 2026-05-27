<x-layouts.app>
    <div class="flex flex-col mb-4">
        <span
            class="text-xl font-semibold my-2 sm:text-2xl whitespace-nowrap dark:text-white">Заощадження
            </span>
        @if(session('success'))
            <x-messages.success/>
        @elseif(session('error'))
            <x-messages.not-success/>
        @endif
    </div>
    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <ul class="text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400"
                id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <li class="w-full">
                    <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq"
                            aria-selected="true"
                            class="inline-block  justify-items-center w-full p-2 rounded-t-lg bg-gray-100  dark:bg-gray-700">
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                            Statistics this
                            month</h3>

                    </button>
                </li>
            </ul>
            <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                <div class="hidden pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($savings as $saving)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center min-w-0">
                                        <div class="ml-3">
                                            <p class="font-medium text-gray-900 truncate dark:text-white">{{$saving->saving_type}}</p>
                                            <div
                                                class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                                <span class="ml-2 text-gray-500">{{$saving->saving_date->format('d.m.Y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        {{ number_format($saving->amount, 2, '.', ' ') }}
                                        @php

                                            $color = $saving->currency->getCodeColor($saving->currency->code);
                                        @endphp

                                        <span
                                            class="bg-[{{ $color }}] text-blue-800 text-xs font-medium px-2.5 py-0.5 ml-1 rounded dark:bg-{{ $color }} dark:text-[#312C3A]">
                                                  {{ $saving->currency->code }}
                                                </span>
                                    </div>
                                </div>
                                <div class="w-full mt-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500"
                                             style="width: 18%"></div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                {{ $savings->links() }}
            </div>
            <!-- Card Footer -->
            <div
                class="flex items-center justify-between pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                <div>

                    <button
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                        type="button" data-dropdown-toggle="stats-dropdown">Last 7 days
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>



                    <!-- Dropdown menu -->
                    <div
                        class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="stats-dropdown">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                                Sep 16, 2021 - Sep 22, 2021
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Yesterday</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Today</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Last 7 days</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Last 30 days</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Last 90 days</a>
                            </li>
                        </ul>
                        <div class="py-1" role="none">
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                               role="menuitem">Custom...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-card>
            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Statistics this
                month</h3>

            <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400"
                id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <li class="w-full">
                    <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq"
                            aria-selected="true"
                            class="inline-block w-full p-4 rounded-t-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">
                        Top products
                    </button>
                </li>
            </ul>
        </x-card>

        <x-card>
            <div class="w-full">
                <h3 class="mb-2 text-base font-normal text-gray-500 dark:text-gray-400">Audience by age</h3>
                <div class="flex items-center mb-2">
                    <div class="w-16 text-sm font-medium dark:text-white">50+</div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500" style="width: 18%"></div>
                    </div>
                </div>
            </div>
        </x-card>


    </div>

</x-layouts.app>

