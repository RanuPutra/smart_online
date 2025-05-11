<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Workspace</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen py-15 px-25">
        {{-- CENTER TEXT  --}}
        <div class="text-center py-8">
            <h2 class="text-3xl font-bold">
                <span class="text-gray-800">Pick a Plan</span>
                <span class="bg-indigo-500 px-2 text-white">that Works</span>
                <span class="text-gray-800">for Your Business</span>
            </h2>
            <p class="text-gray-600 mt-2">Temukan pilihan layanan yang tepat untuk kebutuhan komunikasi perusahaan Anda</p>
        </div>
        
        <div class="flex justify-center items-center px-6 mb-7">
            <div class="flex flex-col md:flex-row items-center w-full max-w-4xl">
                <!-- Left Section: Title -->
                <div class="md:w-1/2 text-center md:text-left mb-6 md:mb-0">
                    <h2 class="text-3xl font-bold text-indigo-800 leading-tight">
                        Daftar Sekarang,<br>untuk Menggunakan<br>
                        <span class="inline-block bg-green-200 text-green-800 px-4 py-2 rounded-full mt-2">Workspace</span>
                    </h2>
                </div>
                <!-- Right Section: Form -->
                <div class="md:w-1/2 bg-neutral-50 p-6 rounded-lg shadow-lg">
                    <form>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_lengkap">Nama Lengkap</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama_lengkap" type="text" >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="perusahaan">Perusahaan/Instansi</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="perusahaan" type="text" >
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" >
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Phone</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" >
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlaKaryawan">Jumlah Karyawan</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3  text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" id="jumlaKaryawan" type="text"  disabled>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="posisi_pekerjaan">Posisi Pekerjaan</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-white text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="posisi_pekerjaan" type="text" >
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="plan">Plan</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" id="plan" type="text"  disabled>
                        </div>
                        <div class="mt-6">
                            <button class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="button">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>