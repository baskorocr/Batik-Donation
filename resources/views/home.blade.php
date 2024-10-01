@extends('layouts.frontend')

@section('content')
    <div class="mt-6">
        <!-- Photo Wrapper -->
        <div class="relative w-full">
            <div class="relative overflow-hidden rounded-lg" style="padding-top: 56.25%; /* 16:9 Aspect Ratio */">
                <!-- Photo -->
                <img src="{{ asset('storage/cover_image/z.png') }}"
                    class="absolute top-0 left-0 w-full h-full object-cover"
                    alt="Your Image Alt Text">
            </div>
            <!-- h2 or p tag under the Photo -->
            <div class="text-center mt-4">
                <h2 class="text-2xl font-sans font-bold text-gray-800">Saldo Terkumpul</h2>
                <p class="mt-2 text-lg text-gray-600 font-sans">Rp. {{ number_format($totalAmountSum)}}</p>
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
                    <p class="font-semibold font-sans text-primary">{{ \Str::limit($karya->title, 25) }}</p>
                    <p class="text-xs font-sans text-gray-400 uppercase">{{ \Str::limit($karya->description, 16) }}</p>
                    <p class="text-xs font-sans text-gray-400 uppercase">total donasi: 
                    @if($karya->transactions_sum_total_amount != 0)
                    <span class="font-semibold">Rp. {{number_format(($karya->transactions_sum_total_amount))}}</span> </p>
                    @else
                    <span class="font-semibold">Rp. {{number_format($karya->transactions_sum_total_amount)}}</span> </p>
                    @endif

            
                </div>
            </a>
        @endforeach
    </div>
@endsection
