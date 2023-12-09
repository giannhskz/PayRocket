<?php

namespace App\Livewire;

use Livewire\Component;

class UserDashboardTab extends Component
{
    public $activeTab = 1;
    public $user;

    public function render()
    {
        return view('livewire.user-dashboard-tab');
    }

    public function switchTab($tabNumber)
    {
        $this->activeTab = $tabNumber;
    }
}
