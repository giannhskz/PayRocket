@php
@endphp
<div>
<div class="border-2 border-indigo-400 rounded">
    @foreach($users as $user)
        <div class="flex flex-col items-center p-1">
            <button wire:click="loadUser({{ $user->id }})" style="cursor: pointer;">{{ $user->name }}</button>
        </div>
    @endforeach
</div>
</div>

