<div class="p-4 mt-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <div class="flex flex-col mt-1">
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
                                    Назва рахунку
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Баланс
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Валюта
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Вид рахунку
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Дата створення
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Останні зміни
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($accounts as $account)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">

                                    <td
                                        class="p-2 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </td>
                                    {{-- Назва рахунку --}}
                                    <td
                                        class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $account->name }}
                                    </td>

                                    <td class="p-4 text-sm font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ number_format($account->balance, 2, '.', ' ') }}
                                    </td>

                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-900">
                                        <span style="background-color: {{ $account->currency->code->getCodeColor() }}"
                                            class="text-xs font-medium px-2.5 py-0.5 rounded">
                                            {{ $account->currency->code->value }}
                                        </span>
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        @switch($account->type)
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
                                                {{ $account->type }}
                                        @endswitch
                                    </td>

                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $account->created_at->format('d.m.Y') }}
                                    </td>

                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $account->updated_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
