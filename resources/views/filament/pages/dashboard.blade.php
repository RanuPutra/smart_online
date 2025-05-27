<x-filament-panels::page>
    <div class="mb-4 flex items-center justify-between">
    <div>
        <p class="text-lg font-semibold">
            Welcome, {{ auth()->user()->name }}
        </p>
        <p class="text-sm text-gray-600">
            {{ now()->format('l, jS F Y') }}
        </p>
    </div>
    <form method="POST" action="{{ filament()->getPanel()->getLogoutUrl() }}">
        @csrf
        <x-filament::button type="submit" color="danger">
            Logout
        </x-filament::button>
    </form>
</div>


{{-- Overview Section --}}
<div class="grid grid-cols-5 gap-4 mb-4">
    {{-- 4 box kecil di 4 kolom pertama --}}
    <div class="col-span-4 grid grid-cols-4 gap-4">
        @livewire('app.filament.widgets.stats-overview')
    </div>
    
    {{-- Location di kolom ke-5 --}}
    <div>
        @livewire('app.filament.widgets.location-stats')
    </div>
</div>

{{-- Chart Section --}}
<div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        @livewire('app.filament.widgets.weekly-attendance-chart')
    </div>
    <div>
        @livewire('app.filament.widgets.monthly-attendance-chart')
    </div>
</div>

{{-- Employee Section --}}
<div class="mb-4">
    @livewire('app.filament.widgets.employee-stats')
</div></x-filament-panels::page>