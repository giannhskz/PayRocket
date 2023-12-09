<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;


class ManageCredits extends Component
{
    public $user;
    public $card_number;
    public $expiry_date;
    public $cvv;
    public $card_holder;
    public $credits;

    public function validateCard()
    {
        $validationResult = $this->validate([
            'card_number' => 'required|numeric|digits:16',
            'expiry_date' => 'required',
            'cvv' => 'required|numeric|digits:3',
            'card_holder' => 'required|string',
            'credits' => 'required|numeric',
        ]);

        $userToUpdate = User::find($this->user->id);
        $userToUpdate->balance += $this->credits;
        $userToUpdate->save();

        // Validation successful
        session()->flash('success', 'Card validation successful.');

        $this->redirect('/dashboard');
    }
    public function render()
    {
        return view('livewire.manage-credits');
    }
}
