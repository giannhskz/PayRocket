<div class="h-screen p-3 mt-6">
        <div class="h-1/2 border-2 border-indigo-400 rounded overflow-y-auto">
            <div class="border-b-2 border-indigo-400 p-1">
                <div class="grid grid-cols-4 justify-items-center">
                    <div wire:click="switchTab(1)">
                        <div class="cursor-pointer">Bill Payment</div>
                    </div>
                    <div wire:click="switchTab(2)" >
                        <div class="cursor-pointer">Manage Credits</div>
                    </div>
                    <div wire:click="switchTab(3)" >
                        <div class="cursor-pointer">Providers</div>
                    </div>
                    <div wire:click="switchTab(4)" >
                        <div class="cursor-pointer">Bill History</div>
                    </div>

                </div>

            </div>
            @if($activeTab===1)
                <livewire:bill-payment :user="auth()->user()"/>
            @elseif($activeTab===2)
                <livewire:manage-credits :user="auth()->user()" />
            @elseif($activeTab===3)
                <livewire:provider-info :user="auth()->user()"/>
            @elseif($activeTab===4)
                <livewire:user-history :user="auth()->user()"/>
            @endif
        </div>
    <div class="relative h-6 w-12 pl-2 ">
        <div class="absolute left-0 top-0 h-16 w-16 whitespace-nowrap font-semibold pl-2 ">Current
            Balance: {{ $user->balance }} €
        </div>
    </div>
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


</div>

