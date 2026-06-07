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

    <div class="items-center justify-between mb-5 block sm:flex">
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
            Нова ціль
        </button>
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
                <x-tables.goals-table :goals="$goals->where('status', 'active')"
                                      :accounts="$accounts"
                                      :currencies="$currencies"
                                      :sources="$sources"
                                      :categories="$categories"/>
            </div>

            <div class="hidden" id="completed" role="tabpanel" aria-labelledby="completed_goals">
                <x-goals-mobile :goals="$goals->where('status', 'completed')"/>
                <x-tables.goals-table :goals="$goals->where('status', 'completed')"
                                      :accounts="$accounts"
                                      :currencies="$currencies"
                                      :sources="$sources"
                                      :categories="$categories"/>
            </div>

            <div class="hidden" id="archived" role="tabpanel" aria-labelledby="archived_goals">
                <x-goals-mobile :goals="$goals->where('status', 'archived')"/>
                <x-tables.goals-table :goals="$goals->where('status', 'archived')"
                                      :accounts="$accounts"
                                      :currencies="$currencies"
                                      :sources="$sources"
                                      :categories="$categories"/>
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
                action="{{route('goal.create')}}"
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
                        for="is_recurring">
                        <input type="hidden" name="is_recurring" value="0">
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


</x-layouts.app>
