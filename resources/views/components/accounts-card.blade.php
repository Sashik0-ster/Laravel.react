@props(['class' => '', 'title', 'account_type', 'balance', 'currency'])


<div class="bg-gradient-to-tl from-gray-900 to-gray-800 text-white h-56 w-96 p-6 rounded-xl shadow-md">
    <div class="h-full flex flex-col justify-between">
        <div class="flex items-start justify-between space-x-4">
            <div class=" text-xl font-semibold tracking-tigh">
                {{ $title }}
            </div>

            <div class="inline-flex flex-col items-center justify-center">
                @switch($account_type)
                    @case('card')
                        💳
                    @break

                    @case('cash')
                        💵
                    @break

                    @case('crypto')
                        🪙
                    @break

                    @default
                        {{ $account_type }}
                @endswitch

                <div class="font-semibold text-white">
                    {{ $account_type }}
                </div>
            </div>
        </div>

        <div
            class="inline-block w-12 h-8 bg-gradient-to-tl from-yellow-200 to-yellow-100 rounded-md shadow-inner overflow-hidden">
            <div class="relative w-full h-full grid grid-cols-2 gap-1">
                <div class="absolute border border-gray-900 rounded w-4 h-6 left-4 top-1"></div>
                <div class="border-b border-r border-gray-900 rounded-br"></div>
                <div class="border-b border-l border-gray-900 rounded-bl"></div>
                <div class=""></div>
                <div class=""></div>
                <div class="border-t border-r border-gray-900 rounded-tr"></div>
                <div class="border-t border-l border-gray-900 rounded-tl"></div>
            </div>
        </div>

        <div class="flex items-start justify-between space-x-4">
            <div>
                <div class="text-xs font-semibold tracking-tight">
                    Баланс
                </div>

                <div class="text-2xl font-semibold">
                    {{ $balance }} {{ $currency }}
                </div>
            </div>

            <div class="flex items-center mt-6 sm:justify-end">
                <div class="flex pl-2 space-x-1">
                    <a href="#" id="updateButton"
                        class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" id="deleteButton"
                        class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>
