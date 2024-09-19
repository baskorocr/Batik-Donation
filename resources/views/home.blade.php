@extends('layouts.frontend')

@section('content')
    <div class="mt-6">
        <!-- Photo Wrapper -->
        <div class="relative w-full">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Photo -->
                <img src="{{ asset('storage/cover_image/header.png') }}"
                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="Your Image Alt Text">
            </div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($karyas as $karya)
            <a href="{{ route('karya.checkout', $karya->id) }}"
                class="p-3 rounded-lg border bg-white border-gray-200 hover:shadow-soft transition duration-300 ease-in-out">
                <img src="{{ asset('storage/' . $karya->cover_image) }}" class="h-64 w-full object-cover rounded-lg"
                    alt="">
                <div class="mt-3">
                    <p class="font-semibold text-primary">{{ \Str::limit($karya->title, 16) }}</p>
                    <p class="text-xs text-gray-400 uppercase">{{ \Str::limit($karya->description, 16) }}</p>
                    <p class="text-xs text-gray-400 uppercase">Created By {{ $karya->user->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
