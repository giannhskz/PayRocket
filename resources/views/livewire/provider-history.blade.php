<div class="w-full h-5/6 overflow-y-auto pt-3">
    <div>
        <!-- Display Paid Bills -->
        <h2 class="text-center font-bold font-serif text-lg">Paid Bills</h2>
        <div class="flex overflow-x-scroll">
            @foreach($paidBills as $bill)
                <div class="bg-green-200 p-4 m-2 rounded-lg flex flex-col">
                    <p class="w-1/2 whitespace-nowrap">Billing Date: {{ $bill->billing_date }}</p>
                    <p class="w-1/2 whitespace-nowrap">Expiration Date: {{ $bill->expiration_date }}</p>
                    <p class="w-1/2 whitespace-nowrap">Cost: {{ $bill->cost }}</p>
                    <p class="w-1/2 whitespace-nowrap">Bonus Date: {{ $bill->bonus_date }}</p>
                    <p class="w-1/2 whitespace-nowrap">Payment Date: {{ $bill->payment_date }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Display Expired Bills -->
    <div>
        <h2 class="text-center font-bold font-serif text-lg">Expired Bills</h2>
        <div class="flex overflow-x-scroll">
            @foreach($expiredBills as $bill)
                <div class="bg-red-200 p-4 m-2 rounded-lg w-1/2">
                    <p class="whitespace-nowrap">Billing Date: {{ $bill->billing_date }}</p>
                    <p class="whitespace-nowrap">Expiration Date: {{ $bill->expiration_date }}</p>
                    <p class="whitespace-nowrap">Cost: {{ $bill->cost }}</p>
                    <p class="whitespace-nowrap">Bonus Date: {{ $bill->bonus_date }}</p>
                    <p class="whitespace-nowrap">Payment Date: {{ $bill->payment_date }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <h2 class="text-center font-bold font-serif text-lg">Pending Bills</h2>
        <div class="flex overflow-x-scroll">
            <!-- Display Pending Bills -->
            @foreach($pendingBills as $bill)
                <div class="bg-yellow-200 p-4 m-2 rounded-lg w-1/2">
                    <p class="whitespace-nowrap">Billing Date: {{ $bill->billing_date }}</p>
                    <p class="whitespace-nowrap">Expiration Date: {{ $bill->expiration_date }}</p>
                    <p class="whitespace-nowrap">Cost: {{ $bill->cost }}</p>
                    <p class="whitespace-nowrap">Bonus Date: {{ $bill->bonus_date }}</p>
                    <p class="whitespace-nowrap">Payment Date: {{ $bill->payment_date }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
