@extends('backend.layouts.app')

@section('content')
           <div class="bg-white p-5 rounded-lg shadow-md">
        <!-- Header dengan Judul dan Tombol -->
        <div class="flex justify-between items-center mb-5">
            <div class="flex items-center space-x-2">
                <h1 class="text-xl font-bold text-gray-900">Location</h1>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('lokasi.create') }}" class="bg-green-600 text-white px-3 py-1.5 rounded-lg hover:bg-green-700 transition duration-200 text-sm flex items-center">
                    <i data-feather="plus" class="w-4 h-4 mr-1"></i>
                    Add Location
                </a>
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-5">
            <input type="text" placeholder="Search lokasi" class="border border-gray-200 rounded-lg px-3 py-1.5 w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Nama lokasi
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Alamat
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($lokasi as $lokasi)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                                {{ $lokasi->nama_lokasi }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                                {{ $lokasi->alamat }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('lokasi.edit', $lokasi->id) }}" class="text-blue-600 hover:text-blue-800">
                                        <i data-feather="edit" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('lokasi.destroy', $lokasi->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection