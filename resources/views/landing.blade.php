@extends('layouts.tailwind-layout')

@section('content')

@include('layouts.partials.header')
<section class="bg-white mx-5 sm:mx-20">
        <div class="mt-10 grid justify-items-center">
            <h1 class="text-4xl font-extrabold leading-none tracking-tight font-josefinsans text-primary"><span class="underline underline-offset-3 decoration-7 decoration-secondary">News & Updates</span></h1>
        </div>
        <div class="gap-8 items-center py-8 px-4 xl:gap-16 md:grid md:grid-cols-2 sm:py-14 lg:px-6">
            <img class="rounded-xl drop-shadow-xl" src="images/San Juan City Hall.jpg" alt="San Juan City Hall">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold font-josefinsans text-primary">Lorem ipsum dolor sit amet, consectetur.</h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </section>

<hr class="w-80 h-1 mx-auto bg-primary border-0 rounded">

    <section class="bg-white mx-5 sm:mx-20">
        <div class="gap-8 items-center py-8 px-4 xl:gap-16 md:grid md:grid-cols-2 sm:py-14 lg:px-6">
            <div class="mt-4 md:mt-0">
                <p class="mb-6 font-light text-gray-500 md:text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <img class="rounded-xl drop-shadow-xl" src="images/San Juan Road.jpg" alt="San Juan City Road">
        </div>
    </section>

    <section class="bg-white mx-5 sm:mx-40">
        <div class="grid justify-items-center">
            <h1 class="text-4xl font-extrabold leading-none tracking-tight font-josefinsans text-primary"><span class="underline underline-offset-3 decoration-7 decoration-secondary">Completed Reports</span></h1>
        </div>
        <div class="py-8 px-4 md:gap-12 md:grid md:grid-cols-2 sm:pt-14 sm:pb-2 lg:px-6">
            <img class="rounded-xl mb-2 lg:mb-0" src="images/San Juan City Hall.jpg" alt="San Juan City Hall">
            <img class="rounded-xl lg:mb-0" src="images/San Juan City Hall.jpg" alt="San Juan City Hall">
        </div>
        <h2 class="text-md tracking-tight font-extrabold font-josefinsans text-primary text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
        <p class="font-light text-gray-500 indent-10 md:text-md py-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </section>
@endsection