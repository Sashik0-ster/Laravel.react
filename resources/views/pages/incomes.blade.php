<x-layouts.app>
    <div class="flex flex-col mb-4">
        <span
            class="self-center text-xl font-semibold my-2 sm:text-2xl whitespace-nowrap dark:text-white">Доходи</span>
    </div>
    <div class="items-center justify-between block sm:flex">
        <div class="flex items-center mb-4 sm:mb-0">
            <form class="sm:pr-3" action="#" method="GET">
                <label for="products-search" class="sr-only">Search</label>
                <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                    <input type="text" name="email" id="products-search"
                           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Search for products">
                </div>
            </form>
            <div class="flex items-center w-full sm:justify-end">
                <div class="flex pl-2 space-x-1">
                    <a href="#" id="updateButton"
                       class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" id="deleteButton"
                       class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <button id="createProductButton"
                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                type="button" data-drawer-target="drawer-create-product-default"
                data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default"
                data-drawer-placement="right">
            Новий дохід
        </button>
    </div>

    <div id="drawer-create-product-default"
         class="fixed top-0 right-0 z-50 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform
     {{ $errors->any() ? 'translate-x-0' : 'translate-x-full' }}
     bg-white dark:bg-gray-800"
         tabindex="-1">
        <h5 id="drawer-label"
            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
            Додати дохід</h5>
        <button type="button" data-drawer-dismiss="drawer-create-product-default"
                aria-controls="drawer-create-product-default"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>

        <div class="relative bg-white rounded-lg dark:bg-gray-800 min-h-screen md:min-h-0">

            <x-forms.auth.form
                action="{{route('income.create')}}"
                method="POST"
            >
                <div class="relative max-h-screen pb-25">

                    <x-forms.auth.input-label
                        for="amount"
                    >
                        Сума
                    </x-forms.auth.input-label>
                    <x-forms.auth.input-text
                        type="number"
                        name="amount"
                        id="amount"
                    />
                    <x-forms.auth.error-message :messages="$errors->get('amount')" class="mt-2"/>

                    <div>
                        <x-forms.auth.input-label for="accounts">Рахунок</x-forms.auth.input-label>
                        <select name="accounts" id="accounts"
                                class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" selected disabled>Оберіть рахунок</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->account_id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-forms.auth.error-message :messages="$errors->get('accounts')" class="mt-2"/>

                    <div>
                        <x-forms.auth.input-label for="currency">Валюта</x-forms.auth.input-label>
                        <select name="currency" id="currency"
                                class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" selected disabled>виберіть валюту</option>
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->currency_id }}">
                                    {{ $currency->code }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <x-forms.auth.error-message :messages="$errors->get('currency')" class="mt-2"/>

                    <div>
                        <x-forms.auth.input-label for="income_sources">Джерело доходу</x-forms.auth.input-label>
                        <select name="income_sources" id="income_sources"
                                class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" selected disabled>Оберіть джерело доходу</option>
                            @foreach($income_sources as $income_source)
                                <option value="{{$income_source->source_id}}">{{$income_source->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-forms.auth.error-message :messages="$errors->get('income_sources')" class="mt-2"/>

                    <x-forms.auth.input-label
                        for="income_date"
                    >
                        Дата доходу
                    </x-forms.auth.input-label>
                    <x-forms.auth.input-text
                        type="date"
                        name="income_date"
                        id="income_date"
                    />

                    <x-forms.auth.input-label
                        for="is_recurring"
                    >
                        <input type="hidden" name="is_recurring" value="2">
                        <x-forms.auth.input-checkbox
                            type="checkbox"
                            name="is_recurring"
                            id="is_recurring"
                            value="1"
                        />
                        Регулярний платіж
                    </x-forms.auth.input-label>

                    <x-forms.auth.input-label
                        for="description"
                    >
                        Опис
                    </x-forms.auth.input-label>
                    <textarea name="description" id="description" cols="30" rows="3"
                              class="bg-gray-50 border border-gray-300 text-gray-900
                            sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    ></textarea>
                </div>

                <div
                    class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 px-4 md:absolute bg-white dark:bg-gray-800">
                    <div class="flex space-x-4">
                        <x-forms.auth.submit-button
                            type="submit"
                            class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Додати
                        </x-forms.auth.submit-button>

                        <button type="button"
                                data-drawer-dismiss="drawer-create-product-default"
                                class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-2 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg aria-hidden="true" class="w-5 h-5 -ml-1 mr-1" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Закрити
                        </button>
                    </div>
                </div>

            </x-forms.auth.form>

        </div>
    </div>


    <div
        class="p-4 mt-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
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
                            @foreach($incomes as $income)
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

                                            $color = $account->currency->getCodeColor($income->currency->code);
                                        @endphp

                                        <span
                                            class="bg-[{{ $color }}] text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-{{ $color }} dark:text-[#312C3A]">
                                                  {{ $income->currency->code }}
                                                </span>
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$income->source->name}}
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $income->recurring_status }}
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$income->description}}
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $income->income_date->format('d.m.Y') }}
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $income->created_at->format('d.m.Y') }}
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap row-actions-cell-update hidden"
                                        id="rowSetting">
                                        <button type="button" id="update-{{ $income->id }}"
                                                data-drawer-target="drawer-update-product-default"
                                                data-drawer-show="drawer-update-product-default"
                                                aria-controls="drawer-update-product-default"
                                                data-drawer-placement="right"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                <path fill-rule="evenodd"
                                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            Update
                                        </button>
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap row-actions-cell-delete hidden"
                                        id="rowSetting">
                                        <button type="button" id="delete-{{ $income->id }}"
                                                data-drawer-target="drawer-delete-product-default"
                                                data-drawer-show="drawer-delete-product-default"
                                                aria-controls="drawer-delete-product-default"
                                                data-drawer-placement="right"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            Delete item
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                            {{-- Drawer-menu --}}
                            <x-forms.product-forms.del-item/>
                            <x-forms.product-forms.update-item/>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-layouts.app>
