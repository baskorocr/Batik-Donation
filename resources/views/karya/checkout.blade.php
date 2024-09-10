@extends('layouts.frontend')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}"
            class="mt-6 text-sm text-primary hover:text-black transition duration-300 ease-in-out inline-block">
            &lt; Kembali
        </a>
        <h2 class="text-primary font-medium text-lg mt-3">Choose your payment method</h2>

        <!-- Responsive flex layout for payment methods and image -->
        <div class="flex flex-col md:flex-row gap-6 mt-6">
            <!-- Payment methods section -->
            <div class="flex-1">
                <!-- Responsive grid for payment channels -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($channels as $channel)
                        @if ($channel->active == true)
                            <a href="#" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                                data-channel-name="{{ $channel->code }}">
                                <div class="bg-white p-5 rounded-md shadow-soft flex items-center justify-center h-full">
                                    <div class="text-center">
                                        <img src="{{ $channel->icon_url }}" class="w-full" alt="{{ $channel->name }}">
                                        <p class="mt-3 text-xs text-gray-600">{{ $channel->name }}</p>

                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Product image and details -->
            <div class="w-full md:w-64 flex-shrink-0 bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="object-contain w-full h-48" src="{{ asset('storage/' . $karya->cover_image) }}"
                    alt="{{ $karya->title }}">

                <div class="p-4">
                    <h2 class="mt-2 text-primary text-lg font-semibold">{{ $karya->title }}</h2>
                    <p class="mt-3 text-primary">Created By: {{ $karya->user->name }}</p>
                    <!-- Ensure pemilik relationship is loaded -->
                    <p class="mt-2 text-primary text-sm">{{ $karya->description }}</p>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Open Payment Donation
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" method="POST" action="{{ route('transaction.store') }}">
                            @csrf
                            <div>
                                <label for="karya"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Karya
                                    dipilih</label>
                                <input type="text" readonly name="karya" id="karya" value="{{ $karya->title }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required />
                                <input type="hidden" name="id" id="id" value="{{ $karya->id }}" />
                            </div>
                            <div>
                                <label for="channel"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment
                                    Channel</label>
                                <input type="text" readonly name="channel" id="channel"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required />
                            </div>
                            <div>
                                <label for="donation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan
                                    Jumlah</label>
                                <input type="number" name="donation" id="donation" placeholder="10000"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required />
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentLinks = document.querySelectorAll('[data-modal-target="authentication-modal"]');
            const channelInput = document.getElementById('channel');

            paymentLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const channelName = this.getAttribute('data-channel-name');
                    channelInput.value = channelName;
                });
            });
        });
    </script>
@endsection
