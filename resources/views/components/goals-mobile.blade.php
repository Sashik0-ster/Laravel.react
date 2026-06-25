<div class="block md:hidden space-y-5">
    <div class="bg-gray-50 dark:bg-gray-700 p-1 space-y-3">

        @foreach ($goals as $goal)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-3 space-y-1">

                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ $goal->goal_name }}
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-2 text-sm p-2">
                    <div class="text-center justify-items-center">
                        <span class="text-gray-500 dark:text-gray-400 text-xs">Ціль</span>
                        <div class="font-semibold dark:text-white">
                            {{ number_format($goal->target_amount, 2, '.', ' ') }}
                            <span class="text-blue-800 text-xs px-1.5 py-0.5 rounded dark:text-[#312C3A]"
                                style="background-color: {{ $goal->currency->code->getCodeColor() }}">
                                {{ $goal->currency->code->value }}
                            </span>
                        </div>
                    </div>
                    <div class="text-center justify-items-center">
                        <span class="text-gray-500 dark:text-gray-400 text-xs">Зібрано</span>
                        <div class="font-semibold dark:text-white">
                            {{ number_format($goal->current_amount, 2, '.', ' ') }}
                            <span style="background-color: {{ $goal->currency->code->getCodeColor() }}"
                                class="text-xs px-1.5 py-0.5 rounded dark:text-[#312C3A]">
                                {{ $goal->currency->code->value }}
                            </span>
                        </div>
                    </div>
                </div>

                @if ($goal->description)
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        {{ $goal->description }}
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-2 text-xs text-gray-500 dark:text-gray-400">
                    <div>📅 Створено: {{ $goal->created_at->format('d.m.Y') }}</div>
                    <div>⏳ Дедлайн: {{ $goal->deadline->format('d.m.Y') }}</div>
                </div>

                <div class="flex gap-2 pt-1">
                    <span
                        class="bg-[{{ $goal->priority->color() }}] text-blue-800 text-xs font-medium px-2.5 py-1 rounded dark:text-white">
                        {{ $goal->priority->label() }}
                    </span>

                    @php $progress = $goal->progress_percentage; @endphp

                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-600 mt-2">
                        <div class="bg-primary-600 h-2.5 rounded-full dark:bg-primary-500"
                            style="width: {{ $progress }}%">
                        </div>
                    </div>
                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-400">
                        {{ $progress }}%
                    </span>
                </div>

                <div class="flex gap-2 pt-1 row-actions-cell-update hidden">
                    <button type="button"
                        class="btn-edit-trigger flex-1 inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800"
                        data-drawer-target="drawer-update-product-default"
                        data-drawer-show="drawer-update-product-default" aria-controls="drawer-update-product-default"
                        data-drawer-placement="right">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Редагувати
                    </button>
                </div>
                <div class="flex gap-2 row-actions-cell-delete hidden">
                    <button type="button" id="delete-{{ $goal->goal_id }}" data-action="/goals/{{ $goal->goal_id }}"
                        data-drawer-target="drawer-delete-product-default"
                        data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default"
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
            </div>
        @endforeach
    </div>
</div>
