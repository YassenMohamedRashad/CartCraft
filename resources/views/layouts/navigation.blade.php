<nav class="border-gray-200 sticky top-0 bg-slate-100 shadow ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
        <a href="{{route("home")}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                <x-application-logo class="w-[40px] h-[40px]"/>
            </span>
        </a>

        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <form action="/" method="get" class="w-[300px] hidden md:block">
            <div class="relative flex items-center justify-end">
                <x-text-input class="inline w-full" placeholder="Search for products" name="search" />
                <button class="absolute me-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 256 256">
                        <path fill="currentColor" d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32M40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72" />
                    </svg>
                </button>

            </div>

        </form>

        <div class="hidden w-full md:flex md:w-auto" id="navbar-dropdown">


            <div>
                <ul class="flex flex-col md:flex-row items-center font-medium p-4 md:p-0 mt-4 md:mt-0 border border-gray-100 md:border-0 rounded-lg dark:border-gray-700 place-content-center justify-center space-y-4 md:space-y-0 md:space-x-8">
                    <li class="flex items-center text-white">
                        @if (isset(Auth()->user()->id))

                        <div class="flex items-center">
                            <x-outline-btn href="{{'/cart'}}">
                                <svg class="inline text-[{{$dark_color}}]" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M6.15 6l2.4 5h7l2.75-5zM5.2 4h14.75q.575 0 .875.513t.025 1.037l-3.55 6.4q-.275.5-.737.775T15.55 13H8.1L7 15h12v2H7q-1.125 0-1.7-.987t-.05-1.963L6.6 11.6L3 4H1V2h3.25zm3.35 7h7z" />
                                </svg>
                                {{__("Cart")}}
                            </x-outline-btn>
                            <div class="text-gray-400 me-2">|</div>



                            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                                <img src="{{asset('images/profile_images/'.Auth()->user()->image)}}" class="rounded-full w-10 h-10" alt="Profile Image">
                            </button>
                            <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                    <div>{{Auth()->user()->name}}</div>
                                    <div class="font-medium truncate">{{Auth()->user()->email}}</div>
                                </div>
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                                    <li>
                                        <a href="{{route('profile.edit')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">profile</a>
                                    </li>

                                </ul>
                                <div class="py-2">
                                    <x-logout class="w-full text-red-600 px-4 py-2 text-sm hover:bg-gray-600" />
                                </div>
                            </div>

                        </div>



                        @else
                        <div class="flex align-middle justify-center items-center">
                            <x-outline-btn href="{{route('login')}}">
                                <svg class="inline text-[{{$dark_color}}]" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8t1.175-2.825T12 4t2.825 1.175T16 8t-1.175 2.825T12 12m-8 6v-.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2v.8q0 .825-.587 1.413T18 20H6q-.825 0-1.412-.587T4 18m2 0h12v-.8q0-.275-.137-.5t-.363-.35q-1.35-.675-2.725-1.012T12 15t-2.775.338T6.5 16.35q-.225.125-.363.35T6 17.2zm6-8q.825 0 1.413-.587T14 8t-.587-1.412T12 6t-1.412.588T10 8t.588 1.413T12 10m0 8" />
                                </svg>
                                {{__("Sign Up/Sign In")}}
                            </x-outline-btn>

                        </div>

                        @endif
                    </li>
                    <li>
                        <form action="/" method="get" class="w-[300px] block md:hidden">
                            <div class="relative flex items-center justify-end">
                                <x-text-input class="inline w-full" placeholder="Search for products" />
                                <button class="absolute me-2" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 256 256">
                                        <path fill="currentColor" d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32M40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72" />
                                    </svg>
                                </button>

                            </div>

                        </form>
                    </li>
                </ul>
            </div>



        </div>

    </div>
</nav>
