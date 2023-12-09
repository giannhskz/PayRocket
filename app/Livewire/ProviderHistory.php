<?php

namespace App\Livewire;

use App\Models\Bill;
use Carbon\Carbon;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ProviderHistory extends Component
{
    #[Reactive]
    public $user;
    public $provider;
    public $paidBills;
    public $pendingBills;
    public $expiredBills;

    public function render()
    {
        return view('livewire.provider-history');
    }

    public function mount()
    {
        $this->paidBills = Bill::where('user_id', $this->user['id'])
            ->where('provider_id', $this->provider->id)
            ->whereNotNull('payment_date')
            ->get();

        $this->pendingBills = Bill::where('user_id', $this->user['id'])
            ->where('provider_id', $this->provider->id)
            ->whereNull('payment_date')
            ->where('expiration_date', '>', Carbon::now())
            ->get();

        $this->expiredBills = Bill::where('user_id', $this->user['id'])
            ->where('provider_id', $this->provider->id)
            ->whereNull('payment_date')
            ->where('expiration_date', '<=', Carbon::now())
            ->get();
    }
}
