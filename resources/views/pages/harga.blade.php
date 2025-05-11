<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Harga - SmartOnline</title>
</head>
<body class="bg-white text-blue-900 ">

    <!-- Main Container -->
    <div class="container mx-auto max-w-7xl mt-20">
        <!-- Blue Background Container -->
        <div class="bg-blue-900 py-4 px-8 rounded-3xl">
            <div class="container mx-auto max-w-6xl px-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-7">
                    <!-- Text + Image -->
                    <div class="text-white space-y-6 mt-7">
                        <h1 class="text-4xl md:text-[45px] font-semibold tracking-wide w-200">
                            Partner kolaborasi bersama <br> perusahaan anda
                        </h1>
                        <div class="bg-white rounded-3xl">
                            <img src="/image/imageharga.png" alt="Collaboration Illustration" class="w-full h-auto">
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="bg-white rounded-3xl mx-30 mt-10 w-110 p-10 py-10 space-y-5 ">
                        <input type="email" placeholder="Work Email*" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-blue-900">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" placeholder="First name*" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-blue-900">
                            <input type="text" placeholder="Last name*" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-blue-900">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <select class="w-full p-2 border border-gray-300 rounded-lg focus:outline-blue-900">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                            <input type="text" placeholder="+62" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-blue-900">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" placeholder="Company name*" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-blue-900">
                            <input type="number" placeholder="Number of Employees*" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-blue-900">
                        </div>
                        <button class="w-full mt-30 bg-blue-900 text-white text-sm font-semibold p-2 rounded-lg hover:bg-blue-700 transition-all">
                            REQUEST A DEMO
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Apps Section -->
        <div class="container mx-auto max-w-5xl mt-6 px-6">
            <div class="mb-1">
                <h1 class="text-3xl font-bold"> Aplikasi layanan kami</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white text-blue-900 p-6 rounded-xl shadow-xl text-center hover:shadow-xl/30">
                    <h3 class="text-xl font-semibold mb-3">Smart Accounting</h3>
                    <p>Aplikasi accounting untuk kebutuhan perusahaan anda</p>
                </div>
                <div class="bg-white text-blue-900 p-6 rounded-xl shadow-lg text-center hover:shadow-xl/30">
                    <h3 class="text-xl font-semibold mb-3">Smart HRIS</h3>
                    <p>Aplikasi HRIS untuk kebutuhan perusahaan anda</p>
                </div>
                <div class="bg-white text-blue-900 p-6 rounded-xl shadow-lg text-center hover:shadow-xl/30">
                    <h3 class="text-xl font-semibold mb-3">Smart POS</h3>
                    <p>Aplikasi POS untuk kebutuhan perusahaan anda</p>
                </div>
            </div>
        </div>
    </div>
        <!-- Pricing Section -->
    <div class="bg-gradient-to-r from-blue-400/70 to-blue-900 py-15 mt-16 ">
        <div class="container mx-auto px-9">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                <div class="text-white md:col-span-1">
                    <h2 class="text-base font-semibold">BELI SEKARANG</h2>
                    <h2 class="w-95 text-[43px] font-semibold mt-2 leading-tight">Pilih Paket dan Nikmati Layanan Aplikasi</h2>
                    <p class="mt-4 text-lg">Temukan paket smart online yang paling tepat dan sesuai dengan kebutuhan perusahaan anda.</p>
                    <a href="#" class="mt-4 inline-block text-white no-underline text-lg hover:text-blue-900 transition-all">Lihat harga selengkapnya > </a>
                </div>

                
                <div class="bg-white text-blue-900 p-8 rounded-3xl shadow-lg">
                    <h3 class="text-2xl font-semibold mb-3">Custom Development</h3>
                    <p class="text-gray-500 mb-14">Kami menawarkan solusi pengembangan sistem <span class="text-blue-900 font-medium italic">dengan harga yang fleksibel.</span> Dari sistem manajemen hingga aplikasi mobile, tim kami mendukung visi dan tujuan bisnis anda.</p>
                    <button class="w-full bg-gradient-to-r from-blue-800 to-blue-600 text-white p-2 mt-7 rounded-lg hover:opacity-90 transition-all">Hubungi Kami</button>
                </div>

                
                <div class="bg-white text-blue-900 p-8 rounded-3xl shadow-lg">
                    <h3 class="text-2xl font-semibold mb-3">Subscription</h3>
                    <p class="text-gray-500 mb-5">Berlangganan aplikasi smart online sesuai dengan kebutuhan anda</p>
                    <p class="text-3xl font-bold text-black mt-4">
                        <span class="text-blue-900 font-normal">Harga mulai</span><br> 
                        <span class="text-neutral-600">Rp 999.000</span>
                        <span class="text-base text-neutral-600"> Perbulan </span>
                    </p>
                    <div class="flex flex-row gap-3 mt-9">
                        <button class="w-full p-2 bg-gradient-to-r from-blue-800 to-blue-600 text-white rounded-lg hover:opacity-90 transition-all">Pilih Paket</button>
                        <button class="w-full p-2 border-2 border-blue-900 text-blue-900 rounded-lg hover:bg-blue-800 hover:text-white transition-all">Hubungi Kami</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>