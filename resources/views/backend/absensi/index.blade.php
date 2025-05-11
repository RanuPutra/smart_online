@extends('backend.layouts.app')

@section('content')
    <div class="bg-white p-5 rounded-lg shadow-md">
        <!-- Header dengan Navigasi Tanggal dan Tombol -->
        <div class="flex justify-between items-center mb-5">
            <div class="flex items-center space-x-2">
                <h1 class="text-xl font-bold text-gray-900">Attendance</h1>
                <div class="flex items-center space-x-2 text-sm text-gray-700">
                    <button class="w-6 h-6 rounded-full flex items-center justify-center hover:bg-gray-200">
                        <i data-feather="chevron-left" class="w-4 h-4"></i>
                    </button>
                    <span>Monday, 15 October</span>
                    <button class="w-6 h-6 rounded-full flex items-center justify-center hover:bg-gray-200">
                        <i data-feather="chevron-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="#" class="bg-gray-200 text-gray-700 px-3 py-1.5 rounded-lg hover:bg-gray-300 transition duration-200 text-sm flex items-center">
                    <i data-feather="download" class="w-4 h-4 mr-1"></i>
                    Attendance Report
                </a>
                <a href="{{ route('absensi.create') }}" class="bg-green-600 text-white px-3 py-1.5 rounded-lg hover:bg-green-700 transition duration-200 text-sm flex items-center">
                    <i data-feather="plus" class="w-4 h-4 mr-1"></i>
                    Add Attendance
                </a>
            </div>
        </div>

        <!-- Summary Widgets -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
            <!-- Kehadiran -->
            <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm text-center">
                <h3 class="text-xs font-semibold text-gray-500 mb-2">Kehadiran</h3>
                <p class="text-[30px] font-bold text-gray-900">{{ $absensi->where('clock_in', '!=', null)->count() }}</p>
            </div>

            <!-- Tidak Hadir -->
            <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm text-center">
                <h3 class="text-xs font-semibold text-gray-500 mb-2">Tidak Hadir</h3>
                <p class="text-[30px] font-bold text-gray-900">{{ $absensi->where('clock_in', null)->count() }}</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-5 flex flex-col md:flex-row md:space-x-3 space-y-3 md:space-y-0">
            <input type="text" placeholder="Search employee" class="border border-gray-200 rounded-lg px-3 py-1.5 w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            <select class="border border-gray-200 rounded-lg px-3 py-1.5 w-full md:w-1/4 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <option>Date Range</option>
                <option>Today</option>
                <option>This Week</option>
                <option>This Month</option>
            </select>
            <select class="border border-gray-200 rounded-lg px-3 py-1.5 w-full md:w-1/4 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <option>Attendance Filter</option>
                <option>Present</option>
                <option>Not Present</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
<thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 rounded-full">
                        <i class="fas fa-user text-gray-600"></i>
                    </span>
                    Employee Name
                </th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 rounded-full">
                        <i class="fas fa-clock text-gray-600"></i>
                    </span>
                    Clock-in & Out
                </th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 rounded-full">
                        <i class="fas fa-hourglass-half text-gray-600"></i>
                    </span>
                    Overtime
                </th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 rounded-full">
                        <i class="fas fa-image text-gray-600"></i>
                    </span>
                    Picture
                </th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 rounded-full">
                        <i class="fas fa-map-marker-alt text-gray-600"></i>
                    </span>
                    Location
                </th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 rounded-full">
                        <i class="fas fa-sticky-note text-gray-600"></i>
                    </span>
                    Note
                </th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 rounded-full">
                        <i class="fas fa-cog text-gray-600"></i>
                    </span>
                    Action
                </th>
            </tr>
        </thead>                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($absensi as $data)
                        <tr>
                            <td class="px-4 py-3 flex items-center space-x-3">
                                <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-full w-10 h-10">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $data->nama_karyawan }}</p>
                                    
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">
                                @if($data->clock_in)
                                    {{ $data->clock_in->format('d/m/Y H:i') }} - {{ $data->clock_out ? $data->clock_out->format('d/m/Y H:i') : 'Belum Clock Out' }}
                                @else
                                    Tidak Hadir
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $data->overtime  }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $data->picture  }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $data->location  }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $data->notes  }}</td>
                            <td class="px-4 py-3 whitespace-nowrap space-x-2">
                                <a href="{{ route('absensi.edit', $data->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition duration-200 text-xs">Edit</a>
                                <form action="{{ route('absensi.destroy', $data->id) }}" method="POST" class="inline" onsubmit="confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200 text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-3 text-center text-gray-500 text-sm">No attendance data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(event) {
    event.preventDefault();
    const form = event.target;
    
    Swal.fire({
        title: 'Yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3B82F6',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        background: '#FFFFFF',
        customClass: {
            title: 'text-gray-900 text-lg font-bold',
            content: 'text-gray-700',
            confirmButton: 'bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
            cancelButton: 'bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script>

@endsection
@endsection