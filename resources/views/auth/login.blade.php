<x-guest-layout-component>


    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <x-guest.input-label
                for="email"
                :value="__('Email address')"
            />
            <div class="mt-2">
                <x-guest.text-input
                    id="email"
                    type="email"
                    name="email"
                    required
                    autofocus
                    autocomplete="email"
                    value="{{ old('email') }}"
                />
                <x-guest.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-guest.input-label
                for="password"
                :value="__('Password')"
            />

            <div class="mt-2">
                <x-guest.text-input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
            </div>
            <x-guest.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 forced-colors:appearance-auto"
                        />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <label
                    for="remember-me"
                    class="block text-sm/6 text-gray-900 dark:text-white"
                >
                    {{__('Remember me')}}
                </label>
            </div>
            @foreach($errors->all() as $error)

                <div>{{ $error }} </div>

            @endforeach
        </div>

        <div>
            <x-guest.primary-button class="w-full">
                {{ __('Sign in') }}
            </x-guest.primary-button>
        </div>
    </form>
{{--    <div class="text-sm/6 mt-6 flex items-center justify-center">--}}
{{--        <a href="{{ route('register') }}"--}}
{{--           class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300"--}}
{{--        >--}}
{{--            {{ __('I want to register') }}--}}
{{--        </a>--}}
{{--    </div>--}}

</x-guest-layout-component>
