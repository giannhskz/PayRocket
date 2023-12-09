<x-app-layout>
    @if(isset($provider))
        <div class="flex justify-between p-2">
            <div class="shrink-0 flex justify-center">
                <img src="{{ asset('logoPay.png') }}" alt="logo" class="block h-28 w-38">
            </div>
            <div class="text-center text-2xl pr-24 pt-12 font-semibold">
                {{ $provider->name }}
            </div>
            <form method="POST" action="{{ route('provider.logout') }}" class="">
                @csrf
                <div class="border border-gray-400 rounded-lg hover:border-none  bg-gray-300 px-2 ">
                    <button type="submit">Log Out</button>
                </div>
            </form>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success text-green-600" id="success-message">{{ session('success') }}</div>
        <script>
            setTimeout(function () {
                document.getElementById('success-message').style.display = 'none';
            }, 5000); // Hide the message after 5 seconds (5000 milliseconds)
        </script>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-red-600" id="error-message">{{ session('error') }}</div>
        <script>
            setTimeout(function () {
                document.getElementById('error-message').style.display = 'none';
            }, 5000); // Hide the message after 5 seconds (5000 milliseconds)
        </script>
    @endif
    <div class="grid grid-cols-3 mr-28  pt-5 h-screen ">
        <div class="w-2/4 pl-6 overflow-y-auto">
            <livewire:users-list :provider="$provider"/>
        </div>

        <div class="col-span-2">
            <livewire:user-tab :provider="$provider"/>
        </div>
    </div>
</x-app-layout>

