@extends("layouts.main")

@section("Title","login")

@section("content")
<x-auth-session-status class="mb-4" :status="session('status')" />



<div class="bg-[{{$dark_color}}] p-10">
    <div class="w-full md:w-[90%] lg:w-3/4 m-auto md:grid md:grid-cols-2 rounded-3xl shadow-2xl border border-white">
        <div class=" hidden lg:block place-content-center p-10">
            <img class="w-[90%] m-auto" src="{{asset('images/design/login/Asset 4.png')}}" alt="">
        </div>
        <div class="bg-white rounded-tr-3xl rounded-br-3xl p-5 place-content-center">
            <div class="w-[90%] m-auto">
                <div class="flex items-center align-middle justify-center p-3 mb-3">
                    <h1 class="text-xl font-bold">Welcome</h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="">
                        <div>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="my-2">
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        @if (Route::has('password.request'))
                        <a class="me-5 underline text-sm text-gray-400 rounded-md focus:outline-none hover:text-gray-600" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                        <a class="block me-5 underline text-sm text-gray-400 rounded-md focus:outline-none hover:text-gray-600" href="{{ route('register') }}">
                            {{ __("Doesn't have an account?") }}
                        </a>
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="p-5 rounded-xl border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm" name="remember">
                                <span class="ms-2 text-sm text-gray-500">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex flex-col mt-5 gap-1">

                            <x-primary-button class="ms-3">
                                {{ __('Sign in') }}
                            </x-primary-button>



                        </div>
                    </div>
                </form>
                <div>
                    <div class="text-center text-gray-400 my-2">
                        <span>Or</span>
                    </div>
                    <div class="flex gap-2">
                        <x-outline-btn href="{{route('auth_google')}}" class="block border border-[{{$dark_color}}] hover:scale-110 w-1/2 text-center">
                            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 48 48">
                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            </svg>
                            {{__("Google")}}
                        </x-outline-btn>
                        <x-outline-btn href="/auth/facebook" class="block border border-[{{$dark_color}}] hover:scale-110 w-1/2 text-center">
                            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 48 48">
                                <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                                <path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"></path>
                            </svg>
                            {{__("Facebook")}}
                        </x-outline-btn>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>


<!-- Email Address -->

@endsection
<!-- Session Status -->
