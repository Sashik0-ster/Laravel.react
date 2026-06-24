@props(['incomes', 'accounts', 'currencies', 'sources', 'categories'])


{{-- Мобільні картки --}}
<div class="block md:hidden space-y-4">
    @foreach ($incomes as $income)
        @php $color = $income->currency->getCodeColor($income->currency->code); @endphp

        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 space-y-2">

            <div class="flex justify-between items-center">
                <span class="text-xs text-gray-500 dark:text-gray-400">#{{ $loop->iteration }}</span>
                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $income->income_date->format('d.m.Y') }}</span>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-sm font-bold text-gray-900 dark:text-white">
                    {{ number_format($income->amount, 2, '.', ' ') }}
                    <span
                        class="bg-[{{ $color }}] text-blue-800 text-xs px-1.5 py-0.5 rounded dark:text-[#312C3A]">
                        {{ $income->currency->code }}
                    </span>
                </span>
                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $income->account->name }}</span>
            </div>
            <div class="flex gap-2 text-xs">
                <span class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded">
                    {{ $income->source->name }}
                </span>
                <span class="bg-gray-   200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded">
                    {{ $income->recurring_status }}
                </span>
            </div>

            @if ($income->description)
                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $income->description }}</div>
            @endif

            <div class="flex gap-2 pt-1" id="rowSetting">
                <button type="button"
                    class="btn-edit-trigger inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    data-type="income" data-drawer-target="drawer-update-product-default"
                    data-drawer-show="drawer-update-product-default" aria-controls="drawer-update-product-default"
                    data-drawer-placement="right" data-action="{{ route('income.update', $income->income_id) }}"
                    data-amount="{{ $income->amount }}" data-account="{{ $income->account_id }}"
                    data-currency="{{ $income->currency_id }}"
                    data-source="{{ $income->income_sources->name ?? $income->income_source_id }}"
                    data-date="{{ $income->income_date }}" data-recurring="{{ $income->is_recurring }}"
                    data-description="{{ $income->description }}">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Редагувати
                </button>
                <div id="rowSetting">
                    <button type="button" id="delete-{{ $income->income_id }}"
                        data-action="/income/{{ $income->income_id }}" data-type="income"
                        data-drawer-target="drawer-delete-product-default"
                        data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default"
                        data-drawer-placement="right"
                        class="btn-delete-trigger flex-1 inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 row-actions-cell-delete hidden">
                        Видалити
                    </button>
                </div>
            </div>

        </div>
    @endforeach
</div>

<x-forms.product-forms.del-item action="{{ route('income.destroy', $income->income_id) }}" />
<x-forms.product-forms.update-item :incomes="$incomes" :accounts="$accounts" :currencies="$currencies" :sources="$sources"
    :categories="$categories" />

<div class="hidden md:block overflow-x-auto rounded-lg">
    <div class="inline-block min-w-full align-middle">
        <div class="overflow-hidden shadow sm:rounded-lg">
            <table class="min-w-full  divide-gray-200 dark:divide-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            №
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Рахунок
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Сумма доходу
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Валюта
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Джерело доходу
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Статус
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Опис
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Дата отримання
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Дата створення
                        </th>
                        <th scope="col" class="w-[10px]">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @foreach ($incomes as $income)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">

                            <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $income->account->name }}
                            </td>

                            <td class="p-4 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                {{ number_format($income->amount, 2, '.', ' ') }}
                            </td>

                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                @php

                                    $color = $income->currency->getCodeColor($income->currency->code);
                                @endphp

                                <span
                                    class="bg-[{{ $color }}] text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-{{ $color }} dark:text-[#312C3A]">
                                    {{ $income->currency->code }}
                                </span>
                            </td>

                            <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $income->source->name }}
                            </td>

                            <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $income->recurring_status }}
                            </td>

                            <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $income->description }}
                            </td>

                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $income->income_date->format('d.m.Y') }}
                            </td>

                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $income->created_at->format('d.m.Y') }}
                            </td>
                            <td
                                class="inline-flex p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <x-assets.button-update-delete data-type="income" data-id="{{ $income->income_id }}"
                                    data-drawer-target="drawer-update-product-default"
                                    data-drawer-show="drawer-update-product-default"
                                    aria-controls="drawer-update-product-default" data-drawer-placement="right"
                                    data-amount="{{ $income->amount }}" data-account="{{ $income->account_id }}"
                                    data-currency="{{ $income->currency_id }}"
                                    data-source="{{ $income->income_sources->name ?? $income->income_source_id }}"
                                    data-date="{{ $income->income_date }}"
                                    data-recurring="{{ $income->is_recurring }}"
                                    data-description="{{ $income->description }}"></x-assets.button-update-delete>
                            </td>

                        </tr>
                    @endforeach

                    {{-- Drawer-menu --}}
                    <x-forms.product-forms.del-item action="" />

                    <x-forms.product-forms.update-item :incomes="$incomes" :accounts="$accounts" :currencies="$currencies"
                        :sources="$sources" :categories="$categories" />
                </tbody>
            </table>



        </div>
    </div>
</div>
