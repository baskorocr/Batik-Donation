<div class="flex items-center justify-between p-4">
    <h1 class="text-primary font-bold text-2xl">Dharma Batik Competition</h1>
    <div class="flex space-x-3">
        @guest
        <div class="flex space-x-3">
            <a href="{{ route('login') }}" class="rounded-md px-4 py-2 text-sm hover:bg-gray-100 transition duration-300 ease-in-out">Sign in</a>
            <a href="{{ route('register') }}" class="rounded-md bg-primary hover:bg-black transition duration-300 ease-in-out text-white px-4 py-2 text-sm">Sign up</a>
        </div>
        @endguest
       
    </div>
</div>
