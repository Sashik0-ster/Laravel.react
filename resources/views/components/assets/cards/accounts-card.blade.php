@props(['class' => '', 'title', 'account_type', 'balance', 'currency'])


<div class="bg-gradient-to-tl from-gray-900 to-gray-800 text-white h-56 w-96 mb-2 p-6 rounded-xl shadow-md">
    <div class="h-full flex flex-col justify-between">
        <div class="flex items-start justify-between space-x-4">
            <div class=" text-xl font-semibold tracking-titgh">
                {{ $title }}
            </div>

            <div class="inline-flex flex-col items-center justify-center">
                @switch($account_type)
                    @case('card')
                        💳 Картка
                    @break

                    @case('cash')
                        💵 Готівка
                    @break

                    @case('crypto')
                        🪙 Крипта
                    @break

                    @default
                        {{ $account_type }}
                @endswitch


            </div>
        </div>


        <div class="flex items-start justify-between space-x-4">
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

            <x-assets.button-update-delete />
        </div>


    </div>
</div>
