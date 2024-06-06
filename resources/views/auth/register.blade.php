<x-guest-layout>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="lg:grid lg:grid-cols-2 lg:gap-4 gap-3">
            <div class="col-span-2">
                <x-input-label for="image" :value="__('Upload your photo')" />
                <x-text-input id="image" class="block mt-1 w-full p-1" type="file" name="image" :value="old('image')" autofocus />
                <x-input-error :messages="$errors->get('image')" class="" />
            </div>
            <!-- Name -->
            <div class="mt-3 lg:mt-0">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="" />
            </div>

            <!-- Email Address -->
            <div class="mt-3 lg:mt-0">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="" />
            </div>

            <div class="mt-3 lg:mt-0">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-3 lg:mt-0">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="" />
            </div>

            <div class="mt-3 lg:mt-0">
                <x-input-label for="" :value="__('Birth Date')" />
                <x-text-input id="BirthDate" class="block mt-1 w-full" type="date" name="BirthDate" :value="old('BirthDate')" />
                <x-input-error :messages="$errors->get('BirthDate')" class="" />
            </div>

            <div class="mt-3 lg:mt-0">
                <x-input-label for="" :value="__('phone number')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                <x-input-error :messages="$errors->get('phone')" class="" />
            </div>

            <div class="mt-3 lg:mt-0 col-span-2">
                <label class="text-white">Gender</label>
                <div class="d-flex">
                    <input id="male" class="" type="radio" value="1" name="gender" :value="old('gender')" />
                    <label class="text-white">Male</label>
                    <input id="female" class="ml-4" type="radio" value="0" name="gender" :value="old('gender')" />
                    <label class="text-white">Female</label>
                </div>
                <x-input-error :messages="$errors->get('gender')" class="" />
            </div>

            <div class="mt-3 lg:mt-0 col-span-2">
                <label class="text-white">Country</label>
                <select name="country" id="CountrySelect" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @foreach ($countries as $country )
                    <option value="{{$country['name']}}">{{$country['name']}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('country')" class="" />
            </div>

            <div class="mt-3 lg:mt-0 col-span-2">
                <x-input-label for="" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                <x-input-error :messages="$errors->get('address')" class="" />
            </div>


            <div class="flex items-center justify-end col-span-2 mt-3 lg:mt-0">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>

    </form>
</x-guest-layout>
