<?php

namespace App\Livewire;
use Livewire\Attributes\On;

use Livewire\Component;



class UserTab extends Component
{
    public $selectedUser;
    public $provider;
    public $activeTab = 1;

    public function switchTab($tabNumber)
    {
        $this->activeTab = $tabNumber;
    }

    public function render()
    {
        return view('livewire.user-tab');
    }

    #[On('user-selected')]
    public function initializeUser($user){
        $this->selectedUser = $user;

    }
}
