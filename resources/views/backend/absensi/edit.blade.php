@extends('backend.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-shadow-sm">Edit Absensi</h1>

    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_karyawan">Nama Karyawan</label>
            <select name="nama_karyawan" id="nama_karyawan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring" required>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->nama }}" {{ $absensi->nama_karyawan == $employee->nama ? 'selected' : '' }}>
                        {{ $employee->nama }}
                    </option>
                @endforeach
            </select>        
            </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="clock_in">Clock In</label>
                <input type="datetime-local" name="clock_in" id="clock_in" value="{{ $absensi->clock_in }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="clock_out">Clock Out</label>
                <input type="datetime-local" name="clock_out" id="clock_out" value="{{ $absensi->clock_out }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="overtime">Overtime</label>
                <input type="time" name="overtime" id="overtime" value="{{ $absensi->overtime }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">Picture (URL)</label>
            <input type="text" name="picture" id="picture" value="{{ $absensi->picture }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Location</label>
            <select name="location" id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($lokasis as $lokasi)
                    <option value="{{ $lokasi->nama_lokasi }}">{{ $lokasi->nama_lokasi }}</option>
                @endforeach
            </select>        

        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="notes">Notes</label>
            <textarea name="notes" id="notes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">{{ $absensi->notes }}</textarea>
        </div>
        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('absensi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
        </div>
    </form>
@endsection