@extends('layouts.frontend')

@section('content')
    <div class="container mx-auto mt-6">
        {{-- Transaction Details --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Left Side: Transaction Info --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-gray-700 uppercase">Transaction Detail</h2>
                <p class="text-primary mt-3 text-xl">Transaction ID: #{{ $detailTransaction->reference }}</p>

                <div class="mt-4">
                    <p class="text-4xl font-semibold text-primary">Rp {{ number_format($detailTransaction->amount) }}</p>

                    {{-- Payment Status --}}
                    @if ($detailTransaction->status === 'PAID')
                        <div class="mt-4 bg-green-100 text-green-700 px-3 py-1 inline-block rounded-full">
                            Paid
                        </div>
                    @else
                        <div class="mt-4 bg-red-100 text-red-700 px-3 py-1 inline-block rounded-full">
                            Unpaid
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right Side: Instructions --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-gray-700 uppercase">Instructions</h2>

                {{-- Check if instructions are available --}}
                @if (!empty($detailTransaction->instructions))
                    <div class="mt-4">
                        {{-- Loop through instructions --}}
                        <ul class="list-none">
                            @foreach ($detailTransaction->instructions as $index => $instruction)
                                {{-- Use Alpine.js to toggle visibility of steps --}}
                                <li class="mb-4">
                                    <div x-data="{ open: false }">
                                        <button @click="open = !open"
                                            class="text-left w-full font-medium text-primary hover:underline focus:outline-none">
                                            <h3 class="text-lg">•> {{ $instruction->title }}</h3>
                                        </button>

                                        {{-- Steps (conditionally shown) --}}
                                        <div x-show="open" class="mt-2" x-cloak>
                                            <ul class="list-decimal list-inside text-gray-600">
                                                @foreach ($instruction->steps as $step)
                                                    <li class="py-1">{!! $step !!}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-gray-500 mt-3">No instructions available.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
