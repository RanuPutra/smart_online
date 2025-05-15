@extends('backend.layouts.app')

@section('content')
    <div class="bg-white p-5 rounded-lg shadow-md">
        <div class="mb-5">
            <h1 class="text-xl font-bold text-gray-900">Add New Location</h1>
        </div>

        <form action="{{ route('lokasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">Nama Lokasi</label>
              <input type="text" name="nama_lokasi" id="nama_lokasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">
              </div>
              <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring">
              </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('absensi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
        </div>
        </form>
    </div>
@endsection