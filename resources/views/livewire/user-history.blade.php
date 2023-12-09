<div class="h-full w-full flex flex-col  place-items-center">
    <h1 class="text-lg font-semibold mt-4" >Paid Bills</h1>
    <div class=" h-4/5 overflow-auto w-1/2 p-2">
        @foreach($paidBills as $bill)
            <div class="border border-2 border-green-300 flex flex-col p-2 rounded mb-2">
                <span>Provider: {{ $bill->provider()->first()->name }}</span>
                <span>Billing Date: {{ $bill->billing_date }}</span>
                <span>Expiration Date: {{ $bill->expiration_date }}</span>
                <span>Paid Price: {{ $bill->final_cost }} €</span>
                <span>Payment Date: {{ $bill->payment_date }}</span>
            </div>
        @endforeach
    </div>
</div>
