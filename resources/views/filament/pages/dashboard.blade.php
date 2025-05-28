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



</x-filament-panels::page>