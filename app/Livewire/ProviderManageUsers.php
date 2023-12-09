<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ProviderManageUsers extends Component
{
    #[Reactive]
    public $user;
    public $provider;

    public function render()
    {
        return view('livewire.provider-manage-users');
    }

    public function deleteUser($user){

        $userModel = User::find($this->user['id']);
        $userModel->providers()->detach($this->provider->id);

        session()->flash('success', 'User deleted successfully.');
        return redirect()->to('/provider/dashboard');
    }

}
