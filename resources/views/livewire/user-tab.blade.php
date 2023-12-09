<div class="h-screen">
    @if($selectedUser)
        <div class="h-1/2 border-2 border-indigo-400 rounded overflow-y-auto">
            <div class="border-b-2 border-indigo-400 p-1">
                <div class="grid grid-cols-3 justify-items-center">
                    <div wire:click="switchTab(1)">
                        <div class="cursor-pointer">Manage Users </div>
                    </div>
                    <div wire:click="switchTab(2)" >
                        <div class="cursor-pointer">Add Bill </div>
                    </div>
                    <div wire:click="switchTab(3)" >
                        <div class="cursor-pointer">History </div>
                    </div>

                </div>

            </div>
            @if($activeTab===1)
                <livewire:provider-manage-users :user="$selectedUser" :provider="$provider"/>
            @elseif($activeTab===2)
                <livewire:provider-add-bill :user="$selectedUser" :provider="$provider"/>
            @elseif($activeTab===3)
                <livewire:provider-history :user="$selectedUser" :provider="$provider"/>
            @endif
        </div>
    @endif
</div>

