@extends('layouts.frontend')

@section('content')

<!-- Back Button -->
<a href="{{ route('home') }}" class="mt-6 text-sm text-primary hover:text-black transition duration-300 ease-in-out inline-block">
    < Kembali
</a>


<!-- Breadcrumb -->
<nav class="flex mt-10" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Main Content -->
<div class="flex flex-col md:flex-row items-center mt-6">
    <img class="h-80 w-full md:w-auto object-contain rounded-md mb-4 md:mb-0 md:mr-4" src="{{ asset('storage/' . $karya->cover_image) }}" alt="">
    <div class="ml-0 md:ml-4 w-full mt-4 md:mt-0 ">
        <!-- Title -->
        <div class="flex items-center justify-between">
            <h1 class="text-primary font-semibold text-xl">{{ $karya->title }}</h1>
        </div>
        <!-- Creator Info -->
        <div class="flex items-center justify-between">
            <p class="text-primary text-lg">Created By {{ $karya->user->name }}</p>
        </div>
        <!-- Description -->
        <div class="mt-3 text-gray-600 text-justify">
            <p>{{ $karya->description }}</p>
        </div>
        <!-- Actions -->
        <div class="flex flex-col md:flex-row items-center justify-between mt-6">
            <p class="text-lg font-medium text-primary"></p>
            <a href="{{ route('karya.checkout', $karya->id) }}" class="mt-3 md:mt-0 border-2 border-primary text-primary px-4 py-2 rounded-md text-sm hover:bg-black hover:text-white transition duration-300 ease-in-out">
                Donate
            </a>
        </div>
    </div>
</div>
@endsection
