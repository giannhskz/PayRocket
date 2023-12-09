<?php

namespace App\Livewire;

use App\Models\Bill;
use Livewire\Component;

class UserHistory extends Component
{
    public $paidBills;
    public $user;

    public function mount()
    {
        $this->paidBills = Bill::where('user_id', $this->user->id)
            ->whereNotNull('payment_date')
            ->orderBy('payment_date')
            ->get();
    }

    public function render()
    {
        return view('livewire.user-history');
    }
}
