@extends("layouts.main")

@section("Title","login")

@section("content")
<x-auth-session-status class="mb-4" :status="session('status')" />

@csrf
<div class="p-10">
    <div class="w-full md:w-[90%] lg:w-3/4 m-auto md:grid md:grid-cols-2 bg-slate-300 rounded-3xl">
        <div class=" hidden lg:block place-content-center p-10">
            <img class="w-[90%] m-auto" src="{{asset('images/design/login/Asset 4.png')}}" alt="">
        </div>
        <div class="bg-[{{$dark_color}}] rounded-3xl p-5 place-content-center">
            <form method="POST" action="{{ route('login') }}">
                <div class="text-center p-5">
                    <x-application-logo class="text-white text-center text-4xl" />
                </div>
                <div class="">
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="p-5 rounded-xl border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm" name="remember">
                            <span class="ms-2 text-sm text-gray-200">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex flex-col mt-5 gap-1">
                        <x-primary-button class="ms-3">
                            {{ __('Sign in') }}
                        </x-primary-button>

                        @if (Route::has('password.request'))
                        <a class="me-5 underline text-sm text-gray-200 rounded-md focus:outline-none hover:text-gray-400" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <a class="me-5 underline text-sm text-gray-200 rounded-md focus:outline-none hover:text-gray-400" href="{{ route('register') }}">
                            {{ __("Doesn't have an account?") }}
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Email Address -->

@endsection
<!-- Session Status -->
