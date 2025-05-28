@widget('App\Filament\Widgets\CustomDashboardWidget')
<x-filament::widget>
    <x-filament::card>
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-2">Monthly Attendance</h3>
                <canvas id="monthlyChart" class="w-full h-64"></canvas>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">Weekly Attendance</h3>
                <canvas id="weeklyChart" class="w-full h-64"></canvas>
            </div>
        </div>
    </x-filament::card>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Chart(document.getElementById('monthlyChart'), {
                type: 'line',
                data: {!! json_encode($monthlyChart) !!},
                options: { responsive: true }
            });

            new Chart(document.getElementById('weeklyChart'), {
                type: 'bar',
                data: {!! json_encode($weeklyChart) !!},
                options: { responsive: true }
            });
        });
    </script>
</x-filament::widget>
