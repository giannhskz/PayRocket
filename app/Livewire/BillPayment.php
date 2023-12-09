<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class BillPayment extends Component
{
    public $user;
    public $pending;
    public $expired;

    public function render()
    {
        return view('livewire.bill-payment');
    }

    public function mount()
    {
        $bills = $this->user->bills()->get();

        $this->pending = $bills->whereNull('payment_date')->where('expiration_date', '>=', Carbon::now());

        $this->expired = $bills->whereNull('payment_date')->where('expiration_date', '<', Carbon::now());
        foreach ($this->expired as $expired) {
            $expired->cost_with_foul = $expired->cost + $expired->cost * ($expired->foul_amount / 100);
        }

        foreach ($this->pending as $pending) {
            if (!is_null($pending->bonus_date) && !is_null($pending->bonus_amount) && $pending->bonus_date >= Carbon::now()) {
                $pending->cost_with_bonus = $pending->cost - $pending->cost * ($pending->bonus_amount / 100);
            }
        }
    }

    public function payBill($bill)
    {
        $user = User::find($bill['user_id']);
        $userBalance = $user?->balance;
        $billModel = Bill::find($bill['id']);

        if (isset($bill['cost_with_bonus'])) {
            if ($bill['cost_with_bonus'] <= $userBalance) {
                $billModel->payment_date = Carbon::now();
                $billModel->final_cost = $bill['cost_with_bonus'];
                $user->balance = $userBalance - $bill['cost_with_bonus'];
                $user->save();
                $billModel->save();

                session()->flash('success', 'Successful payment.');
            } else {
                session()->flash('error', 'Not enough credits to pay bill.');
            }
        } elseif (isset($bill['cost_with_foul'])) {
            if ($bill['cost_with_foul'] <= $userBalance) {
                $billModel->payment_date = Carbon::now();
                $user->balance = $userBalance - $bill['cost_with_foul'];
                $billModel->final_cost = $bill['cost_with_foul'];
                $user->save();
                $billModel->save();

                session()->flash('success', 'Successful payment.');
            } else {
                session()->flash('error', 'Not enough credits to pay bill.');
            }
        } else {
            if ($bill['cost'] <= $userBalance) {
                $billModel->payment_date = Carbon::now();
                $billModel->final_cost = $bill['cost'];
                $user->balance = $userBalance - $bill['cost'];
                $user->save();
                $billModel->save();

                session()->flash('success', 'Successful payment.');
            } else {
                session()->flash('error', 'Not enough credits to pay bill.');
            }
        }
        $this->redirect('/dashboard');
    }
}
