<?php

namespace App\Livewire;

use App\Models\Bill;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ProviderAddBill extends Component
{

    #[Reactive]
    public $user;
    public $provider;
    public $billing_date;
    public $expiration_date;
    public $bonus_date;
    public $payment_date;
    public $cost;
    public $bonus_amount;
    public $foul_amount;


    public function render()
    {
        return view('livewire.provider-add-bill');
    }

    public function addBill()
    {
        $data = [
            'billing_date' => $this->billing_date,
            'expiration_date' => $this->expiration_date,
            'bonus_date' => $this->bonus_date,
            'cost' => $this->cost,
            'bonus_amount' => $this->bonus_amount,
            'foul_amount' => $this->foul_amount,
            'user_id' => $this->user['id'],
            'provider_id' => $this->provider['id'],
        ];

        Bill::create($data);
        session()->flash('success', 'Bill successfully created.');
        return redirect()->to('/provider/dashboard');
    }
}
