<x-guest-layout>
    <div class="shrink-0 flex justify-center">
            <img src="{{ asset('logoPay.png') }}" alt="logo" class="block h-56 w-68">
    </div>
    <div class="flex flex-col place-items-center">
        <h2 class="pb-2 text-lg font-semibold">Provider Login</h2>
        <form method="POST" action="{{ route('provider.login') }}" class="flex flex-col">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" class="mt-4 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Login</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-guest-layout>
