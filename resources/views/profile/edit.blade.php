@extends('layouts.main')
@section('Title','Profile')
@section("content")


<div class="py-12">
    <div class="container m-auto grid grid-cols-1 lg:grid-cols-2 gap-3 p-5 lg:p-0">
        <div class="p-4 bg-[{{$dark_color}}] rounded-xl place-content-center">
            <div class=" place-content-center">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 bg-[{{$dark_color}}] rounded-xl place-content-center">
            <div class="">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 bg-[{{$dark_color}}] rounded-xl place-content-center lg:col-span-2">
            <div class="">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
