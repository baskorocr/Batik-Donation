<div class="flex items-center justify-between p-4">
    <a href="{{ route('home') }}">
        <img src="{{ asset('storage/cover_image/ico.png') }}" style="width: 8rem;" alt="">
    </a>
    <div class="flex space-x-3">
        @guest
            <div class="flex space-x-3">

                <a href="{{ route('login') }}"
                    class="rounded-md bg-primary hover:bg-black transition duration-300 ease-in-out text-white px-4 py-2 text-sm">Sign
                    in, participant</a>
            </div>
        @endguest

    </div>
</div>
