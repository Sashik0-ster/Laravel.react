@props(['expenses', 'accounts', 'currencies', 'sources', 'categories'])

<div class="p-4 mt-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">

    {{-- Мобільні картки --}}
    <div class="block md:hidden space-y-4">
        @foreach($expenses as $expense)
            @php $color = $expense->currency->getCodeColor($expense->currency->code); @endphp
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 space-y-2">

                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500 dark:text-gray-400">#{{ $loop->iteration }}</span>
                    <span
                        class="text-xs text-gray-500 dark:text-gray-400">{{ $expense->expense_date->format('d.m.Y') }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ number_format($expense->amount, 2, '.', ' ') }}
                        <span class="bg-[{{ $color }}] text-blue-800 text-xs px-1.5 py-0.5 rounded dark:text-[#312C3A]">
                            {{ $expense->currency->code }}
                        </span>
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $expense->account->name }}</span>
                </div>

                <div class="flex gap-2 text-xs">
                    <span class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded">
                        {{ $expense->category->name_category }}
                    </span>
                    <span class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded">
                        {{ $expense->recurring_status }}
                    </span>
                </div>

                @if($expense->description)
                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ $expense->description }}</div>
                @endif

                <div class="flex gap-2 pt-1" id="rowSetting">
                    <button type="button"
                            class="btn-edit-trigger inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            data-type="expense"
                            data-drawer-target="drawer-update-product-default"
                            data-drawer-show="drawer-update-product-default"
                            aria-controls="drawer-update-product-default"
                            data-drawer-placement="right"
                            data-action="{{ route('expense.update', $expense->expense_id) }}"
                            data-amount="{{ $expense->amount }}"
                            data-account="{{ $expense->account_id }}"
                            data-currency="{{ $expense->currency_id }}"
                            data-category="{{ $expense->category->category_id ?? $expense->category->name_category }}"
                            data-date="{{ $expense->expense_date }}"
                            data-recurring="{{ $expense->is_recurring }}"
                            data-description="{{ $expense->description }}">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                            <path fill-rule="evenodd"
                                  d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Редагувати
                    </button>
                    <div id="rowSetting">
                        <button type="button"
                                id="delete-{{ $expense->expense_id }}"
                                data-action="/expense/{{ $expense->expense_id }}"
                                data-type="expense"
                                data-drawer-target="drawer-delete-product-default"
                                data-drawer-show="drawer-delete-product-default"
                                aria-controls="drawer-delete-product-default"
                                data-drawer-placement="right"
                                class="btn-delete-trigger flex-1 inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 row-actions-cell-delete hidden">
                            Видалити
                        </button>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <x-forms.product-forms.del-item action="/expense/{{ $expenses->last()?->expense_id ?? '#' }}"/>
    <x-forms.product-forms.update-item
        :expenses="$expenses"
        :accounts="$accounts"
        :currencies="$currencies"
        :sources="$sources"
        :categories="$categories"
    />

    {{-- Десктопна таблиця --}}
    <div class="hidden md:block overflow-x-auto rounded-lg">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full  divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            №
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Рахунок
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Сумма витрат
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Валюта
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Джерело витрат
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Статус
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Опис
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Дата витрат
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                            Дата створення
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white row-actions-cell-update hidden">
                            Редагувати
                        </th>
                        <th class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white row-actions-cell-delete hidden">
                            Видалити
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                    @foreach($expenses as $expense)
                        @php $color = $expense->currency->getCodeColor($expense->currency->code); @endphp
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">

                            <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</td>

                            <td class="p-4 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ $expense->account->name }}</td>

                            <td class="p-4 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white">{{ number_format($expense->amount, 2, '.', ' ') }}</td>

                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <span
                                    class="bg-[{{ $color }}] text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-{{ $color }} dark:text-[#312C3A]">
                                    {{ $expense->currency->code }}
                                </span>
                            </td>

                            <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $expense->category->name_category }}</td>

                            <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $expense->recurring_status }}</td>

                            <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $expense->description }}</td>

                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $expense->expense_date->format('d.m.Y') }}</td>

                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $expense->created_at->format('d.m.Y') }}</td>

                            <td class="p-4 space-x-2 whitespace-nowrap row-actions-cell-update hidden">
                                <button type="button"
                                        class="btn-edit-trigger inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                        data-type="expense"
                                        data-drawer-target="drawer-update-product-default"
                                        data-drawer-show="drawer-update-product-default"
                                        aria-controls="drawer-update-product-default"
                                        data-drawer-placement="right"
                                        data-action="{{ route('expense.update', $expense->expense_id) }}"
                                        data-amount="{{ $expense->amount }}"
                                        data-account="{{ $expense->account_id }}"
                                        data-currency="{{ $expense->currency_id }}"
                                        data-category="{{ $expense->category->category_id ?? $expense->category->name_category }}"
                                        data-date="{{ $expense->expense_date }}"
                                        data-recurring="{{ $expense->is_recurring }}"
                                        data-description="{{ $expense->description }}">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    Редагувати
                                </button>
                            </td>

                            <td class="p-4 space-x-2 whitespace-nowrap row-actions-cell-delete hidden">
                                <button type="button"
                                        id="delete-{{ $expense->expense_id }}"
                                        data-action="/expense/{{ $expense->expense_id }}"
                                        data-drawer-target="drawer-delete-product-default"
                                        data-drawer-show="drawer-delete-product-default"
                                        aria-controls="drawer-delete-product-default"
                                        data-drawer-placement="right"
                                        class="btn-delete-trigger inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    Видалити
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

