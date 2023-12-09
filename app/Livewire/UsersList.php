<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersList extends Component
{
    public $selectedUser;
    public $provider;
    public $users;

    public function render()
    {
        return view('livewire.users-list');
    }
    public function loadUser($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->dispatch('user-selected', user: $this->selectedUser);
    }

    public function mount(){
        $this->users = $this->provider->users()->get();
    }
}
