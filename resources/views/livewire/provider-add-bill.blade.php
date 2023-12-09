<div class="flex flex-col place-items-center">
    <h2 class="pt-4 text-xl text-center font-semibold">Add Bill</h2>

    <form wire:submit="addBill()" class="">
        <div class="flex flex-col justify-center">
            <label>Billing Date: </label>
            <input type="date" wire:model="billing_date">
        </div>
        <div class="flex justify-center flex-col">
            <label>Expiration Date:</label>
            <input type="date" wire:model="expiration_date">
        </div>
        <div class="flex justify-center flex-col">
            <label>Bonus Date:</label>
            <input type="date" wire:model="bonus_date">
        </div>
        <div class="flex justify-center flex-col">
            <label>Cost:</label>
            <input type="float" wire:model="cost">
        </div>
        <div class="flex justify-center flex-col">
            <label>Bonus Amount:</label>
            <input type="integer" wire:model="bonus_amount">
        </div>
        <div class="flex justify-center flex-col">
            <label>Foul Amount:</label>
            <input type="integer" wire:model="foul_amount">
        </div>
        <input hidden wire:model="{{ $user['id'] }}">
        <input hidden wire:model="{{ $provider['id'] }}">
        <div class="flex justify-center gap-2 pt-4">
            <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    type="submit">Add Bill
            </button>
        </div>

    </form>

</div>
