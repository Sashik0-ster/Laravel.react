<x-layouts.app>
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">

        <!-- Card -->
        <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                Створити акаунт
            </h2>
            <form class="mt-8 space-y-6" action="{{route('registration')}}" method="POST">
                @csrf

                <div>
                    <x-forms.auth.input-label for="name">
                        Ваше ім'я
                    </x-forms.auth.input-label>
                    <x-forms.auth.input-text
                        type="name"
                        name="name"
                        id="name"
                        placeholder="Your name"
                        required
                    />
                </div>
                <div>
                    <x-forms.auth.input-label for="email">
                        Ваш email
                    </x-forms.auth.input-label>
                    <x-forms.auth.input-text
                        type="email"
                        name="email"
                        id="email"
                        placeholder="name@company.com"
                        required
                    />
                </div>
                <div>
                    <x-forms.auth.input-label for="password">
                        Пароль
                    </x-forms.auth.input-label>
                    <x-forms.auth.input-text
                        type="password"
                        name="password"
                        id="password"
                        placeholder="••••••••"
                        required
                    />
                </div>
                <div>
                    <x-forms.auth.input-label for="password_confirmation">
                        Повторити пароль
                    </x-forms.auth.input-label>
                    <x-forms.auth.input-text
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="••••••••"
                        required
                    />
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <x-forms.auth.input-checkbox
                            id="remember"
                            aria-describedby="remember"
                            name="remember"
                            type="checkbox"
                            required
                        />
                        <div class="ml-3 text-sm">

                            <x-forms.auth.input-label
                                for="remember">
                                Я приймаю
                                <x-forms.auth.link href="#">
                                    Умови використання
                                </x-forms.auth.link>
                            </x-forms.auth.input-label>
                        </div>

                    </div>

                </div>

                <div class="flex items-center justify-center  ">
                    <x-forms.auth.submit-button class="bg-[#4FFFA4]" type="submit">
                        Створити акаунт
                    </x-forms.auth.submit-button>
                </div>

                <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    Вже маєте акаунт?
                    <x-forms.auth.link href="{{route('login')}}">
                        Вхід
                    </x-forms.auth.link>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

