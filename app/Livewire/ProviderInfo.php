<?php

namespace App\Livewire;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ProviderInfo extends Component
{
    public $user;
    public $availableProviders;
    public $subscribedProviders;


    public function mount(){
        $userId = $this->user->id;
        $this->subscribedProviders = $this->user->providers()->get();

        $this->availableProviders = Provider::whereDoesntHave('users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->get();
    }

    public function subscribe($providerId)
    {
        $this->user->providers()->attach($providerId);
        session()->flash('success', 'Subscribed Successful');

        $this->redirect('/dashboard');
    }

    public function unsubscribe($providerId)
    {
        $this->user->providers()->detach($providerId);

        session()->flash('success', 'Unsub Successful');

        $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.provider-info');
    }
}
