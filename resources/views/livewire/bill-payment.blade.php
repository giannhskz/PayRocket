@php
    @endphp
<div>
    <div class="p-2  w-full h-screen  flex flex-raw justify-between">
        <div class="pl-10 overflow-auto h-2/5 pr-2 pt-4">
            <h1 class="text-xl align-text-center">Pending</h1>
            <div>
                @foreach($pending as $bill)
                    @if(isset($bill->cost_with_bonus))
                        <h2 class="text-lg">With Bonus</h2>
                        <div class="border border-2 border-blue-200 flex flex-col p-2 rounded mb-2">
                            <span>Provider: {{ $bill->provider()->first()->name }}</span>
                            <span>Billing Date: {{ $bill->billing_date }}</span>
                            <span>Expiration Date: {{ $bill->expiration_date }}</span>
                            <span>Starting Price: {{ $bill->cost }} €</span>
                            <span class="font-semibold">Early Payment Cost: {{ $bill->cost_with_bonus }} € unitl: {{ $bill->bonus_date }}</span>
                            <button type="button"
                                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                    wire:click="payBill({{$bill}})">
                                Quick Payment
                            </button>
                        </div>
                    @endif
                @endforeach
            </div>

            <div>
                @foreach($pending as $bill)
                    @if(!isset($bill->cost_with_bonus))
                        <h2>Without Bonus</h2>
                        <div class="border border-2 border-blue-200 flex flex-col p-2 rounded mb-2 w-full">
                            <span>Provider: {{ $bill->provider()->first()->name }}</span>
                            <span>Billing Date: {{ $bill->billing_date }}</span>
                            <span>Expiration Date: {{ $bill->expiration_date }}</span>
                            <span>Cost: {{ $bill->cost }} €</span>
                            <button type="button"
                                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                            wire:click="payBill({{$bill}})">
                                Quick Payment
                            </button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="mr-10 pr-2 h-2/5 pt-4 overflow-y-auto">
            <h1 class="text-xl">Expired</h1>
            @foreach($expired as $bill)
                <div class="border border-2 border-red-200 flex flex-col p-2 rounded mb-2">
                    <span>Provider: {{ $bill->provider()->first()->name }}</span>
                    <span>Billing Date: {{ $bill->billing_date }}</span>
                    <span>Starting Price: {{ $bill->cost }} €</span>
                    <span class="font-semibold">Cost After Expiration: {{ $bill->cost_with_foul }} € after: {{ $bill->expiration_date }}</span>
                    <button type="button"
                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                            wire:click="payBill({{$bill}})">
                        Quick Payment
                    </button>
                </div>

            @endforeach
        </div>
    </div>
</div>
