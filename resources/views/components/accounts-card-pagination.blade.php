@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex list-none items-center justify-center text-sm text-slate-700 md:gap-1">

            {{-- Стрілка "First page" (На першу сторінку) --}}
            <li>
                @if ($paginator->onFirstPage())
                    <span
                        class="pointer-events-none inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-300 px-4 text-sm font-medium text-slate-300">
                    @else
                        <a href="{{ $paginator->url(1) }}" aria-label="Goto Page 1"
                            class="inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-700 px-4 text-sm font-medium text-slate-700 transition duration-300 hover:bg-emerald-50 hover:stroke-gray-500 hover:text-gray-500 focus:bg-emerald-50 focus:stroke-gray-600 focus:text-gray-600">
                @endif
                <span class="sr-only">First</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="-mx-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" role="graphics-symbol">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
                @if ($paginator->onFirstPage())
                    </span>
                @else
                    </a>
                @endif
            </li>

            {{-- Стрілка "Previous page" (Назад) --}}
            <li>
                @if ($paginator->onFirstPage())
                    <span
                        class="pointer-events-none inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-300 px-4 text-sm font-medium text-slate-300">
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous Page"
                            class="inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-700 px-4 text-sm font-medium text-slate-700 transition duration-300 hover:bg-emerald-50 hover:stroke-gray-500 hover:text-gray-500 focus:bg-emerald-50 focus:stroke-gray-600 focus:text-gray-600">
                @endif
                <span class="sr-only">Previous</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="-mx-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" role="graphics-symbol">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                @if ($paginator->onFirstPage())
                    </span>
                @else
                    </a>
                @endif
            </li>

            {{-- Елементи сторінок (Номери та Три крапки) --}}
            @foreach ($elements as $element)
                {{-- Строка "Три крапки" (Разділювач) --}}
                @if (is_string($element))
                    <li>
                        <span
                            class="pointer-events-none hidden h-10 items-center justify-center rounded px-4 text-sm font-medium text-slate-400 md:inline-flex">{{ $element }}</span>
                    </li>
                @endif

                {{-- Масив посилань на сторінки --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                {{-- Поточна активна сторінка (Зелена) --}}
                                <a href="#" aria-label="Current Page, Page {{ $page }}"
                                    aria-current="true"
                                    class="hidden h-10 items-center justify-center whitespace-nowrap rounded bg-gray-500 px-4 text-sm font-medium text-white ring-offset-2 transition duration-300 hover:bg-gray-600 hover:stroke-gray-500 focus:bg-gray-700 md:inline-flex">{{ $page }}</a>
                            @else
                                {{-- Звичайні сторінки --}}
                                <a href="{{ $url }}" aria-label="Goto Page {{ $page }}"
                                    class="hidden h-10 items-center justify-center rounded stroke-slate-700 px-4 text-sm font-medium text-slate-700 transition duration-300 hover:bg-emerald-50 hover:gray-emerald-500 hover:text-gray-500 focus:bg-emerald-50 focus:stroke-gray-600 focus:text-gray-600 md:inline-flex">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Стрілка "Next page" (Вперед) --}}
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next Page"
                        class="inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-700 px-4 text-sm font-medium text-slate-700 transition duration-300 hover:bg-emerald-50 hover:stroke-gray-500 hover:text-gray-500 focus:bg-emerald-50 focus:stroke-gray-600 focus:text-gray-600">
                    @else
                        <span
                            class="pointer-events-none inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-300 px-4 text-sm font-medium text-slate-300">
                @endif
                <span class="sr-only">Next</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="-mx-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" role="graphics-symbol">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
                @if ($paginator->hasMorePages())
                    </a>
                @else
                    </span>
                @endif
            </li>

            {{-- Стрілка "Last page" (На останню сторінку) --}}
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->url($paginator->lastPage()) }}"
                        aria-label="Goto Page {{ $paginator->lastPage() }}"
                        class="inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-700 px-4 text-sm font-medium text-slate-700 transition duration-300 hover:bg-emerald-50 hover:stroke-gray-500 hover:text-gray-500 focus:bg-emerald-50 focus:stroke-gray-600 focus:text-gray-600">
                    @else
                        <span
                            class="pointer-events-none inline-flex h-10 items-center justify-center gap-4 rounded stroke-slate-300 px-4 text-sm font-medium text-slate-300">
                @endif
                <span class="sr-only">Last</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="-mx-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" role="graphics-symbol">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
                @if ($paginator->hasMorePages())
                    </a>
                @else
                    </span>
                @endif
            </li>

        </ul>
    </nav>
@endif
