<div class="hidden md:block overflow-x-auto border-t border-gray-500">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
        <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th scope="col"
                class="p-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                №
            </th>
            <th scope="col"
                class="p-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white w-100">
                Назва
            </th>
            <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                Сумма цілі
            </th>
            <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                Зібрано
            </th>
            <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                Приорітет
            </th>
            <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                Дата створення
            </th>
            <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                Дата закінчення
            </th>
            <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white row-actions-cell-update hidden">
                Редагувати
            </th>
            <th scope="col"
                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white row-actions-cell-delete hidden">
                Видалити
            </th>
        </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">

        @foreach($goals as $goal)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">

                <td class="p-2 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </td>

                <td class="p-2 text-sm font-bold text-gray-900 dark:text-white w-70">
                    {{ $goal->goal_name }}
                    @php $progress = $goal->progress_percentage; @endphp

                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-600 mt-2">
                        <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500"
                             style="width: {{ $progress }}%">
                        </div>
                    </div>
                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-400">
                        {{ $progress }}%
                    </span>
                </td>

                <td class="p-4 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white">
                    {{ number_format($goal->target_amount, 2, '.', ' ') }}
                    @php

                        $color = $goal->currency->getCodeColor($goal->currency->code);
                    @endphp

                    <span
                        class="bg-[{{ $color }}] text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-{{ $color }} dark:text-[#312C3A]">
                      {{ $goal->currency->code }}
                    </span>

                </td>


                <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    {{$goal->current_amount}}
                    @php

                        $color = $goal->currency->getCodeColor($goal->currency->code);
                    @endphp

                    <span
                        class="bg-[{{ $color }}] text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-{{ $color }} dark:text-[#312C3A]">
                      {{ $goal->currency->code }}
                    </span>
                </td>

                <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-black">
                    <span
                        class="bg-[{{ $goal->priority->color() }}] text-blue-800 text-xs font-medium px-2.5 py-1 rounded dark:bg-{{ $goal->priority->color() }} dark:text-white">
                        {{ $goal->priority->label() }}
                    </span>

                </td>

                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $goal->deadline->format('d.m.Y') }}
                </td>

                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ $goal->created_at->format('d.m.Y') }}
                </td>
                <td class="p-4 space-x-2 whitespace-nowrap row-actions-cell-update hidden"
                    id="rowSetting">
                    <button type="button"
                            class="btn-edit-trigger inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            data-drawer-target="drawer-update-product-default"
                            data-drawer-show="drawer-update-product-default"
                            aria-controls="drawer-update-product-default"
                            data-drawer-placement="right"

                    {{-- Передаємо всі необхідні дані в JS --}}
                    {{--data-action="{{ route('income.update', $income->income_id) }}"
                    data-amount="{{ $income->amount }}"
                    data-account="{{ $income->account_id }}"
                    data-currency="{{ $income->currency_id }}"
                    data-source="{{ $income->source_id ?? $income->income_source_id }}"
                    data-date="{{ $income->income_date }}"
                    data-recurring="{{ $income->is_recurring }}"
                    data-description="{{ $income->description }}">--}}
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd"
                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Редагувати
                    </button>
                </td>
                <td class="p-4 space-x-2 whitespace-nowrap row-actions-cell-delete hidden"
                    id="rowSetting">
                    <div class="flex gap-2 row-actions-cell-delete hidden">
                        <button type="button"
                                id="delete-{{ $goal->goal_id }}"
                                data-action="/goals/{{ $goal->goal_id }}"
                                data-drawer-target="drawer-delete-product-default"
                                data-drawer-show="drawer-delete-product-default"
                                aria-controls="drawer-delete-product-default"
                                data-drawer-placement="right"
                                class="btn-delete-trigger flex-1 inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            Видалити
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
