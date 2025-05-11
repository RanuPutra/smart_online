<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartOnline - Time Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Feather Icons CDN -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Header -->
    <header class="bg-blue-900 text-white py-3 shadow-md">
        <div class="container mx-auto flex items-center px-6">
            <div class="flex items-center space-x-4">
                <span class="text-xl font-bold text-shadow-sm">LOGO</span>
                <span class="text-lg text-shadow-sm">Time Management</span>
            </div>
            <nav class="flex-1 flex justify-center space-x-6 -ml-55">
                <a href="{{ route('absensi.index') }}" class="{{ request()->routeIs('absensi.index') ? 'bg-white text-blue-900 rounded-lg' : '' }} px-4 py-1 hover:bg-white hover:text-blue-900 hover:rounded-lg">Absensi</a>
                <a href="#" class="{{ request()->is('employee') ? 'bg-white text-blue-900 rounded-lg' : '' }} px-4 py-1 hover:bg-white hover:text-blue-900 hover:rounded-lg">Employee</a>
                <a href="#" class="{{ request()->is('lokasi') ? 'bg-white text-blue-900 rounded-lg' : '' }} px-4 py-1 hover:bg-white hover:text-blue-900 hover:rounded-lg">Lokasi</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-6 px-6">
        @if(session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonColor: '#3B82F6',
                confirmButtonText: 'OK'
            });
        </script>
        @endif
        @yield('content')
    </main>
    @yield('scripts')
    <!-- Inisialisasi Feather Icons -->
    <script>
        feather.replace();
    </script>
</body>
</html>