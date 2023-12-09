<x-guest-layout>
    <div class="shrink-0 flex justify-center">
        <img src="{{ asset('logoPay.png') }}" alt="logo" class="block h-56 w-68">
    </div>
    <h2 class="flex justify-center pb-3 font-semibold text-2xl">Admin Login</h2>
    <div class="flex justify-center">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div>
                <label class="mr-7" for="email">Email:</label>
                <input class="" type="email" name="email" id="email" required>
            </div>
            <div class=" mt-4">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="flex justify-center ">
                <button  type="submit" class="border rounded border-b-2 bg-gray-100 p-2 m-3">Login</button>
            </div>
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
