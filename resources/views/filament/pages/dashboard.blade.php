<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @foreach ($stats as $stat)
            <div class="p-4 bg-white rounded-xl shadow flex items-center space-x-4">
                <x-dynamic-component :component="$stat['icon']" class="w-6 h-6 text-primary-600" />
                <div>
                    <div class="text-sm text-gray-500">{{ $stat['label'] }}</div>
                    <div class="text-lg font-bold">{{ $stat['value'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>


<!-- <div class="container mx-auto p-4">
    {{-- Baris Pertama: Stats Overview (4 kolom) + Location Stats (1 kolom) --}}
    <div class="grid grid-cols-5 gap-4 mb-4">
        {{-- Stats Overview (4 kolom) --}}
        <div class="col-span-4">
            @livewire('app.filament.widgets.stats-overview')
        </div>
        {{-- Location Stats (1 kolom) --}}
        <div class="col-span-1">
            @livewire('app.filament.widgets.location-stats')
        </div>
    </div>

    {{-- Baris Kedua: Weekly & Monthly Attendance (masing-masing 1/2 lebar) --}}
    <div class="grid grid-cols-2 gap-4 mb-4">
        {{-- Weekly Attendance Stats --}}
        <div>
            @livewire('app.filament.widgets.weekly-attendance-chart')
        </div>
        {{-- Monthly Attendance Stats --}}
        <div>
            @livewire('app.filament.widgets.monthly-attendance-chart')
        </div>
    </div>

    {{-- Baris Ketiga: Employee Stats (full lebar) --}}
    <div>
        @livewire('app.filament.widgets.employee-stats')
    </div>
</div> -->


<x-filament::widget>
    <x-filament::card>
        {{-- Stats Overview --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            @foreach ($stats as $stat)
                <div class="p-4 bg-white rounded-xl shadow flex items-center space-x-4">
                    <x-dynamic-component
                        :component="$stat['icon']"
                        class="w-6 h-6 text-primary-600"
                    />
                    <div>
                        <div class="text-sm text-gray-500">{{ $stat['label'] }}</div>
                        <div class="text-lg font-bold">{{ $stat['value'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Charts Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Monthly Attendance Chart --}}
            <div>
                <h3 class="text-lg font-semibold mb-2">Monthly Attendance</h3>
                <canvas id="monthlyChart" class="w-full h-64"></canvas>
            </div>

            {{-- Weekly Attendance Chart --}}
            <div>
                <h3 class="text-lg font-semibold mb-2">Weekly Attendance</h3>
                <canvas id="weeklyChart" class="w-full h-64"></canvas>
            </div>
        </div>
    </x-filament::card>

    {{-- Chart JS Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Monthly Chart
            new Chart(document.getElementById('monthlyChart'), {
                type: 'line',
                data: {!! json_encode($monthlyChart) !!},
                options: { responsive: true }
            });

            // Weekly Chart
            new Chart(document.getElementById('weeklyChart'), {
                type: 'bar',
                data: {!! json_encode($weeklyChart) !!},
                options: { responsive: true }
            });
        });
    </script>
</x-filament::widget>
