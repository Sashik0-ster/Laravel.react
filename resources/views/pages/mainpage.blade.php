<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'CRM' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-[#0A0C10] text-white/90 font-sans antialiased overflow-x-hidden dark:bg-gray-900">

{{-- NAV --}}
<nav class="flex items-center justify-between px-10 py-5 border-b border-white/[0.07]">
    <a href="{{route('pages.mainpage')}}" class="flex ml-2 md:mr-24">
        <img src="{{asset('assets/logo.svg')}}" class="h-8 mr-3 rounded rounded-3" alt="Logo"/>
        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Sashik0</span>
    </a>
    <div class="hidden md:flex items-center gap-7">
        <a href="#features" class="text-[13px] text-white/40 hover:text-white transition-colors tracking-wide">Можливості</a>
        <a href="#how" class="text-[13px] text-white/40 hover:text-white transition-colors tracking-wide">Як це
            працює</a>
        <a href="#pricing" class="text-[13px] text-white/40 hover:text-white transition-colors tracking-wide">Тарифи</a>
        <a href="#blog" class="text-[13px] text-white/40 hover:text-white transition-colors tracking-wide">Блог</a>
    </div>

    <div
        class="flex items-center justify-between text-[13px] px-5 py-2 rounded-full border border-[#4FFFA4] text-[#4FFFA4] hover:bg-[#4FFFA4]/10 transition-colors tracking-wide">
        <svg class="w-5 h-5 mr-1 ml-3 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
        </svg>
        <a href="{{route('login')}}"
           class="dark:text-white hover:text-[#4FF555] transition-colors tracking-wide">Вхід</a>
        <svg class="w-5 h-5 mr-1 ml-3 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
        </svg>
        <a href="{{route('sign-up')}}"
           class="dark:text-white hover:text-[#4FF555] transition-colors tracking-wide">Реєстрація</a>
    </div>

</nav>


{{-- HERO --}}
<section class="px-5 pt-10 pb-18 text-center relative">

    <h1 class="text-[36px] lg:text-[64px] leading-[1.1] tracking-[-1.5px] max-w-1xl mx-auto mb-5 font-normal">
        Ваші гроші, нарешті <em class="italic text-[#4FFFA4]">працюють</em><br>
        на вас
    </h1>

    <p class="text-[15px] text-white/40 leading-relaxed max-w-md mx-auto mb-9">
        Відстежуйте витрати, накопичуйте заощадження та досягайте фінансових цілей.
    </p>

    <div class="flex items-center justify-center gap-3 flex-wrap">
        <a href="{{ route('registration') }}"
           class="px-7 py-3.5 bg-[#4FFFA4] text-[#0A0C10] rounded-full text-sm font-bold hover:opacity-90 transition-opacity tracking-wide">
            Спробувати безкоштовно →
        </a>
    </div>

    <p class="mt-4.5 text-[12px] text-white/[0.22]">Без кредитної картки · Безкоштовно 14 днів</p>
</section>

{{-- STATS --}}
<div class="grid grid-cols-3 border-t border-b border-white/[0.07]">
    <div class="px-8 py-7 text-center border-r border-white/[0.07]">
        <div class="font-serif-display text-2xl lg:text-4xl font-normal tracking-[-1px] mb-1">48<span
                class="text-[#4FFFA4]">тис+</span></div>
        <div class="text-[12px] text-white/40 tracking-wide">Активних користувачів</div>
    </div>
    <div class="px-8 py-7 text-center border-r border-white/[0.07]">
        <div class="font-serif-display text-2xl lg:text-4xl font-normal tracking-[-1px] mb-1">₴2<span
                class="text-[#4FFFA4]">млрд+</span></div>
        <div class="text-[12px] text-white/40 tracking-wide">Відстежується щомісяця</div>
    </div>
    <div class="px-8 py-7 text-center">
        <div class="font-serif-display text-2xl lg:text-4xl font-normal tracking-[-1px] mb-1">4.9<span
                class="text-[#4FFFA4]">★</span></div>
        <div class="text-[12px] text-white/40 tracking-wide">Рейтинг у App Store</div>
    </div>
</div>

{{-- FEATURES --}}
<section id="features" class="px-2 lg:px-10 py-18">
    <p class="text-[11px] text-[#4FFFA4] tracking-[1px] uppercase mb-3">Що ми пропонуємо</p>
    <h2 class="font-serif-display text-3xl lg:text-4xl font-normal tracking-[-1px] leading-snug mb-5">
        Все, що потрібно для контролю над фінансами
    </h2>

    <div class="grid grid-cols-2 gap-px bg-white/[0.07]">
        {{-- Feature 1 --}}
        <div class="bg-[#0A0C10] hover:bg-[#111318] transition-colors p-8">
            <div class="flex items-center justify-start gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-[#4FFFA4]/10 border border-[#4FFFA4]/20 flex items-center justify-center mb-4 text-[#4FFFA4]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-[15px] font-medium mb-2 tracking-[-0.2px]">AI-аналіз витрат</h3>
            </div>
            <p class="text-[13px] text-white/40 leading-relaxed">Модель вивчає ваші звички і знаходить саме ті моменти,
                де ваші гроші витікають.</p>
        </div>

        {{-- Feature 2 --}}
        <div class="bg-[#0A0C10] hover:bg-[#111318] transition-colors p-8">
            <div class="flex items-center justify-start gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-[#7B8CFF]/10 border border-[#7B8CFF]/20 flex items-center justify-center mb-4 text-[#7B8CFF]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        <polyline points="16 7 22 7 22 13" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="text-[15px] font-medium mb-2 tracking-[-0.2px]">Прогнозування балансу</h3>
            </div>
            <p class="text-[13px] text-white/40 leading-relaxed">Дізнайтеся, яким буде ваш баланс через 30, 60 і 90 днів
                на основі реальних доходів і звичок.</p>
        </div>

        {{-- Feature 3 --}}
        <div class="bg-[#0A0C10] hover:bg-[#111318] transition-colors p-8">
            <div class="flex items-center justify-start gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-[#FFB347]/10 border border-[#FFB347]/20 flex items-center justify-center mb-4 text-[#FFB347]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke-width="1.5"/>
                        <circle cx="12" cy="12" r="3" stroke-width="1.5"/>
                    </svg>
                </div>
                <h3 class="text-[15px] font-medium mb-2 tracking-[-0.2px]">Розумні цілі</h3>
            </div>
            <p class="text-[13px] text-white/40 leading-relaxed">Задайте мету накопичення — AI автоматично скоригує
                тижневий план, щоб її досягти.</p>
        </div>

        {{-- Feature 4 --}}
        <div class="bg-[#0A0C10] hover:bg-[#111318] transition-colors p-8">
            <div class="flex items-center justify-start gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-[#4FFFA4]/10 border border-[#4FFFA4]/20 flex items-center justify-center mb-4 text-[#4FFFA4]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="2" y="5" width="20" height="14" rx="2" stroke-width="1.5"/>
                        <line x1="2" y1="10" x2="22" y2="10" stroke-width="1.5"/>
                    </svg>
                </div>
                <h3 class="text-[15px] font-medium mb-2 tracking-[-0.2px]">Синхронізація з банками</h3>
            </div>
            <p class="text-[13px] text-white/40 leading-relaxed">Усі рахунки в одному місці. Підтримуємо 300+
                українських та європейських банків.</p>
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section id="how" class="px-2 lg:px-10 py-18 bg-[#111318]">
    <p class="text-[11px] text-[#4FFFA4] tracking-[1px] uppercase mb-3">Як це працює</p>
    <h2 class="font-serif-display text-3xl lg:text-4xl font-normal tracking-[-1px] leading-snug mb-5">
        Почати роботу за <span class="text-[#4FFFA4]"> 3 </span>кроки
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <x-card>
            <div class="relative">
                <div class="font-serif-display text-5xl text-white/[0.22] font-normal leading-none mb-3">01</div>
                <h3 class="text-sm font-medium mb-1.5">Підключіть рахунки</h3>
                <p class="text-[13px] text-white/40 leading-relaxed">Прив'яжіть картки та рахунки безпечно. Лише читання
                    даних, завжди зашифровано.</p>
            </div>
        </x-card>
        <x-card>
            <div class="relative">
                <div class="font-serif-display text-5xl text-white/[0.22] font-normal leading-none mb-3">02</div>
                <h3 class="text-sm font-medium mb-1.5">AI вивчає ваші звички</h3>
                <p class="text-[13px] text-white/40 leading-relaxed">Протягом 24 годин модель аналізує доходи, регулярні
                    платежі та патерни витрат.</p>
            </div>
        </x-card>
        <x-card>
            <div class="relative">
                <div class="font-serif-display text-5xl text-white/[0.22] font-normal leading-none mb-3">03</div>
                <h3 class="text-sm font-medium mb-1.5">Отримуйте персональні поради</h3>
                <p class="text-[13px] text-white/40 leading-relaxed">Щоденні інсайти, нагадування про заощадження та
                    досягнення цілей прямо в додатку.</p>
            </div>
        </x-card>
    </div>
</section>

{{-- PRICING --}}
<section id="pricing" class="px-2 lg:px-10 py-10">
    <p class="text-[11px] text-[#4FFFA4] tracking-[1px] uppercase mb-3">Тарифи</p>
    <h2 class="font-serif-display text-4xl font-normal tracking-[-1px] leading-snug max-w-sm mb-5">
        Прості та чесні плани
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Starter --}}
        <div class="bg-[#161A22] border border-white/[0.07] rounded-2xl p-7">
            <div class="text-sm font-medium mb-1 tracking-wide">Старт</div>
            <div class="font-serif-display text-[38px] font-normal tracking-[-1.5px] my-3">
                <sup class="font-sans text-base align-super">₴</sup>0<sub
                    class="font-sans text-sm text-white/40 align-baseline">/міс</sub>
            </div>
            <p class="text-[12px] text-white/40 mb-5 leading-relaxed">Ідеально, щоб познайомитися зі своїми
                фінансами.</p>
            <a href="{{ route('registration') }}"
               class="block w-full py-2.5 text-center rounded-full text-sm font-medium tracking-wide border border-white/[0.07] text-white/40 hover:text-white hover:border-white/20 transition-colors">
                Почати
            </a>
            <hr class="border-white/[0.07] my-5"/>
            <ul class="space-y-2.5">
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    1 банківський рахунок
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Історія за 30 днів
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Базові категорії витрат
                </li>
            </ul>
        </div>

        {{-- Pro (featured) --}}
        <div class="bg-[#12181F] border-2 border-[#4FFFA4]/35 rounded-2xl p-7">
            <span
                class="inline-block bg-[#4FFFA4]/12 text-[#4FFFA4] text-[10px] tracking-[0.8px] uppercase px-2.5 py-0.5 rounded-full mb-3.5">Найпопулярніший</span>
            <div class="text-sm font-medium mb-1 tracking-wide">Про</div>
            <div class="font-serif-display text-[38px] font-normal tracking-[-1.5px] my-3">
                <sup class="font-sans text-base align-super">₴</sup>149<sub
                    class="font-sans text-sm text-white/40 align-baseline">/міс</sub>
            </div>
            <p class="text-[12px] text-white/40 mb-5 leading-relaxed">Для тих, хто серйозно ставиться до фінансових
                цілей.</p>
            <a href="{{ route('registration') }}"
               class="block w-full py-2.5 text-center rounded-full text-sm font-bold tracking-wide bg-[#4FFFA4] text-[#0A0C10] hover:opacity-90 transition-opacity">
                Спробувати безкоштовно
            </a>
            <hr class="border-white/[0.07] my-5"/>
            <ul class="space-y-2.5">
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Необмежена кількість рахунків
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    AI-прогнозування та інсайти
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Відстеження цілей і сповіщення
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Повна історія транзакцій
                </li>
            </ul>
        </div>

        {{-- Business --}}
        <div class="bg-[#161A22] border border-white/[0.07] rounded-2xl p-7">
            <div class="text-sm font-medium mb-1 tracking-wide">Бізнес</div>
            <div class="font-serif-display text-[38px] font-normal tracking-[-1.5px] my-3">
                <sup class="font-sans text-base align-super">₴</sup>499<sub
                    class="font-sans text-sm text-white/40 align-baseline">/міс</sub>
            </div>
            <p class="text-[12px] text-white/40 mb-5 leading-relaxed">Для команд, які керують фінансами компанії.</p>
            <a href="#"
               class="block w-full py-2.5 text-center rounded-full text-sm font-medium tracking-wide border border-white/[0.07] text-white/40 hover:text-white hover:border-white/20 transition-colors">
                Зв'язатися з нами
            </a>
            <hr class="border-white/[0.07] my-5"/>
            <ul class="space-y-2.5">
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Усе з тарифу Про
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    До 10 учасників команди
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Власні звіти та експорт
                </li>
                <li class="flex items-start gap-2 text-[12px] text-white/40">
                    <svg class="w-3.5 h-3.5 text-[#4FFFA4] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                    </svg>
                    Пріоритетна підтримка
                </li>
            </ul>
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="px-2 lg:px-10 py-10 bg-[#111318]">
    <p class="text-[11px] text-[#4FFFA4] tracking-[1px] uppercase mb-3">Відгуки</p>
    <h2 class="font-serif-display text-3xl lg:text-4xl font-normal tracking-[-1px] leading-snug mb-5">
        Тисячі задоволених користувачів
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-[#161A22] border border-white/[0.07] rounded-2xl p-6">
            <div class="flex gap-0.5 mb-3.5 text-[#FFB347] text-sm">
                @for ($i = 0; $i < 5; $i++)
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            <p class="text-[13px] text-white/40 leading-relaxed mb-4 italic">«Я заощадила ₴24 000 за три місяці, просто
                дотримуючись тижневих порад. Цей додаток змінив моє мислення про гроші.»</p>
            <div class="flex items-center gap-2.5">
                <div
                    class="w-8 h-8 rounded-full bg-[#4FFFA4] flex items-center justify-center text-[11px] font-bold text-[#0A0C10]">
                    МК
                </div>
                <div>
                    <div class="text-[13px] font-medium">Марія Коваль</div>
                    <div class="text-[11px] text-white/[0.22]">Фриланс-дизайнер</div>
                </div>
            </div>
        </div>

        <div class="bg-[#161A22] border border-white/[0.07] rounded-2xl p-6">
            <div class="flex gap-0.5 mb-3.5 text-[#FFB347] text-sm">
                @for ($i = 0; $i < 5; $i++)
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            <p class="text-[13px] text-white/40 leading-relaxed mb-4 italic">«Функція прогнозування коштує кожної
                гривні. Нарешті знаю, яким буде мій баланс через два місяці.»</p>
            <div class="flex items-center gap-2.5">
                <div
                    class="w-8 h-8 rounded-full bg-[#7B8CFF] flex items-center justify-center text-[11px] font-bold text-[#0A0C10]">
                    АП
                </div>
                <div>
                    <div class="text-[13px] font-medium">Андрій Петренко</div>
                    <div class="text-[11px] text-white/[0.22]">Розробник програмного забезпечення</div>
                </div>
            </div>
        </div>

        <div class="bg-[#161A22] border border-white/[0.07] rounded-2xl p-6">
            <div class="flex gap-0.5 mb-3.5 text-[#FFB347] text-sm">
                @for ($i = 0; $i < 5; $i++)
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            <p class="text-[13px] text-white/40 leading-relaxed mb-4 italic">«Підключити всі три мої рахунки зайняло 2
                хвилини. AI миттєво все категоризував. Щиро вражена.»</p>
            <div class="flex items-center gap-2.5">
                <div
                    class="w-8 h-8 rounded-full bg-[#FFB347] flex items-center justify-center text-[11px] font-bold text-[#0A0C10]">
                    ОС
                </div>
                <div>
                    <div class="text-[13px] font-medium">Олена Савченко</div>
                    <div class="text-[11px] text-white/[0.22]">Власниця малого бізнесу</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA BANNER --}}
<section class="px-5 py-5 text-center">
    <h2 class="text-[32px] lg:text-[48px] leading-[1.1] tracking-[-1.5px] mx-auto mb-5 font-normal">
        Готові змусити гроші працювати <em class="italic text-[#4FFFA4]">розумніше?</em>
    </h2>
    <p class="text-sm text-white/40 mb-8">Приєднайтеся до 48 000+ користувачів на шляху до фінансової свободи.</p>
    <form class="flex gap-2 max-w-sm mx-auto" action="{{ route('registration') }}" method="GET">
        <input
            type="email"
            placeholder="ваш@email.com"
            class="flex-1 px-4 py-3 bg-[#161A22] border border-white/[0.07] rounded-full text-sm text-white placeholder-white/[0.22] outline-none focus:border-[#4FFFA4]/40 transition-colors font-sans"
        />
        <button type="submit"
                class="px-5 py-3 bg-[#4FFFA4] text-[#0A0C10] rounded-full text-sm font-bold whitespace-nowrap hover:opacity-90 transition-opacity">
            Отримати доступ
        </button>
    </form>
</section>

{{-- FOOTER --}}
<footer class="border-t border-white/[0.07] px-10 py-8 flex items-center justify-between flex-wrap gap-4">
    <a href="{{route('pages.mainpage')}}" class="flex ml-2 md:mr-24">
        <img src="{{asset('assets/logo.svg')}}" class="h-8 mr-3 rounded rounded-3" alt="Logo"/>
        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Sashik0</span>
    </a>
    <div class="flex gap-5">
        <a href="#" class="text-[12px] text-white/[0.22] hover:text-white/40 transition-colors">Конфіденційність</a>
        <a href="#" class="text-[12px] text-white/[0.22] hover:text-white/40 transition-colors">Умови</a>
        <a href="#" class="text-[12px] text-white/[0.22] hover:text-white/40 transition-colors">Підтримка</a>
        <a href="#" class="text-[12px] text-white/[0.22] hover:text-white/40 transition-colors">Блог</a>
    </div>
    <div class="text-[11px] text-white/[0.22]">© 2026 Sashik0 · Всі права захищені</div>
</footer>

</body>
</html>
