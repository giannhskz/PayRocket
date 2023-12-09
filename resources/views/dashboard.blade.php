<x-app-layout>
    @if(auth()->user())
        @include('layouts.navigation')
    @endif
    <livewire:user-dashboard-tab :user="auth()->user()"/>
</x-app-layout>
