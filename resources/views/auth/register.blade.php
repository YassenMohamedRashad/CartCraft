@extends("layouts.main")

@section("Title","Register")

@section("content")
<div class="bg-[{{$dark_color}}]">
    <div class="w-full md:w-[90%] lg:w-3/4 m-auto place-content-center p-10">
        <div class="grid md:grid-cols-2 bg-[{{$dark_color}}] rounded-3xl shadow-2xl border-white border">
            <div class=" hidden md:block place-content-center">
                <img class="w-[90%] m-auto" src="{{asset('images/design/register/Asset 1.png')}}" alt="">
            </div>
            <div class="bg-white p-5 rounded-tr-3xl rounded-br-3xl">
                <div class="flex items-center align-middle justify-center p-3 mb-3">
                    <h1 class="text-xl font-bold">Welcome</h1>
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
                <div class="text-center text-gray-400 my-2">
                    <span>Or</span>
                </div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="lg:grid lg:grid-cols-2 lg:gap-4 gap-3">
                        <div class="col-span-2">
                            <x-input-label class="text-gray-500" for="image" :value="__('Upload your photo (optional)')" />
                            <x-text-input id="image" class="block mt-1 w-full p-1" type="file" name="image" :value="old('image')" autofocus />
                            <x-input-error :messages="$errors->get('image')" class="" />
                        </div>
                        <!-- Name -->
                        <div class="mt-3 lg:mt-0">
                            <x-input-label class="text-gray-500" for="name" :value="__('Name')" />
                            <x-text-input placeholder="full name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-3 lg:mt-0">
                            <x-input-label class="text-gray-500" for="email" :value="__('Email')" />
                            <x-text-input placeholder="enter your email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="" />
                        </div>

                        <div class="mt-3 lg:mt-0">
                            <x-input-label class="text-gray-500" for="password" :value="__('Password')" />

                            <x-text-input placeholder="enter strong password" id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-3 lg:mt-0">
                            <x-input-label class="text-gray-500" for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="" />
                        </div>

                        <div class="mt-3 lg:mt-0">
                            <x-input-label class="text-gray-500" for="" :value="__('Birth Date')" />
                            <x-text-input id="BirthDate" class="block mt-1 w-full" type="date" name="BirthDate" :value="old('BirthDate')" />
                            <x-input-error :messages="$errors->get('BirthDate')" class="" />
                        </div>

                        <div class="mt-3 lg:mt-0">
                            <x-input-label class="text-gray-500" for="" :value="__('phone number')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                            <x-input-error :messages="$errors->get('phone')" class="" />
                        </div>

                        <div class="mt-3 lg:mt-0 col-span-2">
                            <label class="text-gray-500 font-medium text-sm">Gender</label>
                            <div class="d-flex">
                                <input id="male" class="" type="radio" value="1" name="gender" :value="old('gender')" />
                                <label class="text-gray-500">Male</label>
                                <input id="female" class="ml-4" type="radio" value="0" name="gender" :value="old('gender')" />
                                <label class="text-gray-500">Female</label>
                            </div>
                            <x-input-error :messages="$errors->get('gender')" class="" />
                        </div>

                        <div class="mt-3 lg:mt-0 col-span-2">
                            <label class="text-gray-500 font-medium text-sm">Country</label>
                            <select name="country" id="CountrySelect" class="border-2 border-sky-900 focus:scale-105 transition p-2 w-full bg-white text-gray-500 rounded-md shadow-sm">
                                @foreach ($countries as $country )
                                <option value="{{$country['name']}}" class="text-black">{{$country['name']}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country')" class="" />
                        </div>

                        <div class="mt-3 lg:mt-0 col-span-2">
                            <x-input-label class="text-gray-500" for="" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" placeholder="City - your address" :value="old('address')" />
                            <x-input-error :messages="$errors->get('address')" class="" />
                        </div>


                        <div class="col-span-2 mt-3 lg:mt-0">
                            <x-primary-button>
                                {{ __('Sign Up') }}
                            </x-primary-button>
                            <a class="underline text-sm text-gray-400 hover:text-gray-600" href="{{ route('login') }}">
                                {{ __('Already have account?') }}
                            </a>

                        </div>

                    </div>

                </form>

            </div>
        </div>


    </div>
</div>
@endsection
