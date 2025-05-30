<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex gap-4 overflow-x-auto justify-center">
            @foreach ($stats as $stat)
                <div class="w-48 flex-none p-3 rounded-lg shadow-sm border {{ $stat['color'] }}">
                    <h3 class="text-sm font-semibold {{ $stat['color'] }}">{{ $stat['label'] }}</h3>
                    <p class="text-lg font-bold">{{ $stat['value'] }}</p>
                    <p class="text-xs text-gray-600">{{ $stat['description'] }}</p>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
