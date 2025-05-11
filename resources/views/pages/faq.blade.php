<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       @vite(['resources/css/app.css'])
       <title> SmartOnline </title>
</head>
<body>
        <div class=" min-h-screen py-15 px-45">
                <div>
                    <h1 class="text-4xl font-bold"> Aplikasi Akuntansi </h1>
                </div>
                <div class="flex items-center justify-between gap-10 mt-15">
                        <div class="w-200 rounded-2xl bg-transparent">
                                <img src="/image/laptop2.png" alt="" class="w-full h-auto">
                        </div>
                        <div class="w-200">
                                <div class="max-w-md ml-20">
                                    <h1 class="text-[37px] font-semibold mb-10"> Aplikasi akunting untuk membuat laporan laba rugi secara hemat dan cepat</h1>
                                    <a href="#" class="font-semibold  px-40 py-3 bg-white text-blue-500 border-2 border-sky-800 rounded-full hover:bg-blue-500 hover:text-white hover:border-0 transition-all duration-300">
                                        Request Demo
                                    </a>

                                </div>
                        </div>
                </div>
                
                <div class="grid grid-cols-2 gap-10 mt-25">
                    <div class="bg-gray-100 p-4 rounded-4xl shadow-sm relative flex flex-col items-center text-center pt-8 hover:shadow-lg/10">
                            <!-- <div class="outline-3 outline-offset-2 outline-solid mt-7 py-3 px-16 w-150 rounded-4xl"> -->
                            <img src="/image/logo1.png" alt="" class="w-10 h-10 bg-sky-700  rounded-full flex items-center justify-center text-white text-2xl absolute -top-5">
                            <h1 class="text-2xl font-semibold">Laporan Keuangan Otomatis</h1>
                            <p>Laporan neraca, laba rugi, arus kas, hutang, piutang, jurnal, hingga buku besar dibuat secara otomatis dan real-time.</p>   
                     </div>
                     <div class="bg-gray-100 p-4 rounded-4xl shadow-sm relative flex flex-col items-center text-center pt-8 hover:shadow-lg/10">
                        <img src="/image/logo3.png" alt="" class="w-10 h-10 bg-sky-700  rounded-full flex items-center justify-center text-white text-2xl absolute -top-5">
                            <!-- <div class="outline-3 outline-offset-2 outline-solid mt-7 py-3 px-16 w-150 rounded-4xl"> -->
                            <h1 class="text-2xl font-semibold">Catat Pengeluaran & Biaya Belanja</h1>
                            <p>Catat semua biaya pengeluaran dan biaya belanja selama periode yang tertentu dari dashboard majoo.</p>   
                     </div>
                     <div class="bg-gray-100 p-4 rounded-4xl shadow-sm relative flex flex-col items-center text-center pt-8 hover:shadow-lg/10">
                            <!-- <div class="outline-3 outline-offset-2 outline-solid mt-7 py-3 px-16 w-150 rounded-4xl"> -->
                            <img src="/image/logo2.png" alt="" class="w-10 h-10 bg-sky-700  rounded-full flex items-center justify-center text-white text-2xl absolute -top-5">
                            <h1 class="text-2xl font-semibold">Kelola Transaksi dari Satu Dashboard</h1>
                            <p>Catat tanggal jatuh tempo pembayaran, cetak faktur, hingga mengirimkan faktur melalui email bisa dilakukan dalam satu dashboard.</p>   
                     </div>
                     <div class="bg-gray-100 p-4 rounded-4xl shadow-sm relative flex flex-col items-center text-center pt-8 hover:shadow-lg/10">
                            <img src="/image/logo4.png" alt="" class="w-10 h-10 bg-sky-700  rounded-full flex items-center justify-center text-white text-2xl absolute -top-5">
                            <!-- <div class="outline-3 outline-offset-2 outline-solid mt-7 py-3 px-16 w-150 rounded-4xl"> -->
                            <h1 class="text-2xl font-semibold">Monitor Serta Kelola Kas dan Bank</h1>
                            <p>Lihat saldo dari Kas dan Bank outlet pada hari itu hingga buat transaksi, seperti transfer, terima, dan kirim uang.</p>   
                     </div>
                </div>
                    
                <div class="h-32"></div>  
                {{-- BAGIAN FAQ ACCORDION --}}
                <div>
                 <div class="space-y-2"> <!-- Container untuk semua item -->
                     <div class="border-b border-gray-200">
                         <button class="flex justify-between items-center w-full py-4 text-left text-blue-900 hover:text-blue-700" onclick="toggleAccordion(this)">
                             <span class="text-lg">Faktur Penjualan</span>
                             <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                             </svg>
                         </button>
                         <div class="hidden pb-4">
                             <p class="text-gray-600">Detail informasi tentang faktur penjualan...</p>
                         </div>
                     </div>
                 
                     <div class="border-b border-gray-200">
                         <button class="flex justify-between items-center w-full py-4 text-left text-blue-900 hover:text-blue-700" onclick="toggleAccordion(this)">
                             <span class="text-lg">Penerimaan</span>
                             <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                             </svg>
                         </button>
                         <div class="hidden pb-4">
                             <p class="text-gray-600">Detail informasi tentang penerimaan...</p>
                         </div>
                     </div>

                     <div class="border-b border-gray-200">
                        <button class="flex justify-between items-center w-full py-4 text-left text-blue-900 hover:text-blue-700" onclick="toggleAccordion(this)">
                            <span class="text-lg">Biaya</span>
                            <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="hidden pb-4">
                            <p class="text-gray-600">Detail informasi tentang penerimaan...</p>
                        </div>
                    </div>

                    <div class="border-b border-gray-200">
                        <button class="flex justify-between items-center w-full py-4 text-left text-blue-900 hover:text-blue-700" onclick="toggleAccordion(this)">
                            <span class="text-lg">Kas Dan Bank</span>
                            <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="hidden pb-4">
                            <p class="text-gray-600">Detail informasi tentang penerimaan...</p>
                        </div>
                    </div>

                    <div class="border-b border-gray-200">
                        <button class="flex justify-between items-center w-full py-4 text-left text-blue-900 hover:text-blue-700" onclick="toggleAccordion(this)">
                            <span class="text-lg">Daftar Akun dan Buku Besar</span>
                            <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="hidden pb-4">
                            <p class="text-gray-600">Detail informasi tentang penerimaan...</p>
                        </div>
                    </div>

                    <div class="border-b border-gray-200">
                        <button class="flex justify-between items-center w-full py-4 text-left text-blue-900 hover:text-blue-700" onclick="toggleAccordion(this)">
                            <span class="text-lg">Laporan Keuangan</span>
                            <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="hidden pb-4">
                            <p class="text-gray-600">Detail informasi tentang penerimaan...</p>
                        </div>
                    </div>
                 
                     <!-- Tambahkan item-item lainnya dengan struktur yang sama -->
                </div>

                 {{-- INI JS NYAAA --}}
                <script>
                     function toggleAccordion(element) {
                         const content = element.nextElementSibling;
                         const arrow = element.querySelector('svg');
                         
                         // Tutup semua accordion yang terbuka
                         document.querySelectorAll('.hidden').forEach(item => {
                             if (item !== content && !item.classList.contains('hidden')) {
                                 item.classList.add('hidden');
                                 item.previousElementSibling.querySelector('svg').classList.remove('rotate-180');
                             }
                         });
                         
                         // Toggle accordion yang diklik
                         content.classList.toggle('hidden');
                         arrow.classList.toggle('rotate-180');
                     }
                     </script> 

                </div>
        </div>

        


</body>
</html>
