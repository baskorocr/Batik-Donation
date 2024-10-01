@extends('layouts.frontend')

@section('content')
    <div class="container mx-auto mt-6">
        {{-- Transaction Details --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Left Side: Transaction Info --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold font-sans text-gray-700 uppercase">Transaction Detail</h2>
                <p class="text-primary mt-3 text-xl font-sans">Transaction ID: #{{ $detailTransaction->reference }}</p>

                <div class="mt-4">
                    <p class="text-4xl font-semibold text-primary font-sans">Rp {{ number_format($detailTransaction->amount) }}</p>

                    {{-- Payment Status --}}
                    @if ($detailTransaction->status === 'PAID')
                        <div class="mt-4 bg-green-100 text-green-700 px-3 py-1 inline-block rounded-full font-sans">
                            Paid
                        </div>
                    @else
                        <div class="mt-4 bg-red-100 text-red-700 px-3 py-1 inline-block rounded-full font-sans">
                            Unpaid
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right Side: Instructions --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-gray-700 uppercase font-sans">Instructions</h2>

                @if ($detailTransaction->payment_method === 'QRIS2')
                    <div class="flex flex-col items-center justify-center">
                        <img src="{{ $detailTransaction->qr_url }}" style="margin-top:20px" alt="Qris Code" width="220rem">
                        <h3 class="text-lg text-gray-700 mt-5  mb-5 font-sans">Scan or Screenshoot Qris Code</h3>
                    </div>
                @endif

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
                                            <h3 class="text-lg font-sans">•> {{ $instruction->title }}</h3>
                                        </button>

                                        {{-- Steps (conditionally shown) --}}
                                        <div x-show="open" class="mt-2" x-cloak>
                                            <ul class="list-decimal list-inside text-gray-600">
                                                @foreach ($instruction->steps as $step)
                                                    <li class="py-1 font-sans">{!! $step !!}</li>
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

    {{-- Add AJAX Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Define the transaction ID


            var transactionId = '{{ $detailTransaction->reference }}';
            console.log(transactionId);
            // Set interval to check payment status every 5 seconds
            setInterval(function() {
                $.ajax({
                    url: '/batik/cek/' + transactionId,
                    method: 'GET',
                    success: function(response) {
                        // Check if the payment status is 'paid'
                        if (response.status === 'paid') {
                            // Redirect to the success page
                            window.location.href = '/batik/redirect/success';
                        } else {
                            console.log(response);
                        }
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            }, 5000); // 5 seconds interval
        });
    </script>
@endsection
