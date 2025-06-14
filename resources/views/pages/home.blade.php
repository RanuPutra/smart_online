<!DOCTYPE html>
<html lang="en" class="scroll-smooth"> <!-- Tambahkan class scroll-smooth untuk efek scroll halus -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])       
    <title>SmartOnline</title>
</head>

<body>
    <div class="bg-blue-900 min-h-screen">
        <nav class="bg-white fixed top-0 left-0 right-0 mx-auto max-w-6xl rounded-full flex items-center justify-between px-5 py-2 shadow-lg mt-6 z-50">
            <!-- Logo -->
            <div class="text-xl font-bold text-blue-900">
                <a href="{{ route('absensi.index') }}">
                    <img src="{{ asset('/image/logo.png') }}" alt="" class="h-7">
                </a>
            </div>

            <!-- Menu dengan hover effect -->
            <ul class="flex items-center gap-20 font-semibold text-blue-900">
                <li> <a href="#home" class="hover:text-blue-500 transition-colors">HOME</a> </li>
                <li> <a href="#solusi" class="hover:text-blue-500 transition-colors">SOLUSI</a> </li>
                <li> <a href="#blog" class="hover:text-blue-500 transition-colors">BLOG</a> </li>
                <li> <a href="#harga" class="hover:text-blue-500 transition-colors">HARGA</a> </li>
            </ul>

            <!-- WhatsApp -->
            <a href="https://wa.me/your_number" target="_blank" class="flex items-center gap-2 bg-blue-900 hover:bg-green-600 text-white px-4 py-2 rounded-full shadow-md transition-all">
                <img src="https://img.icons8.com/color/24/000000/whatsapp--v1.png" alt="WhatsApp" />
                <span>Let's Talk</span>
            </a>
        </nav>

        <!-- buat ngasih jarak karena nav fixed -->
        <div class="h-25" id="home"></div>        

        <!-- Content sections dengan proper IDs -->
        <div class="container mx-auto max-w-6xl text-white mt-3">
            <h1 class="text-6xl font-semibold tracking-wide">Partner kolaborasi produktifitas perusahaan anda</h1>
        </div>

        <div class="container mx-auto mt-15 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Kolom laptop + button -->
            <div class="flex flex-col items-center">
                <img src="/image/laptop.png" alt="Gambar" class="w-full h-auto rounded-lg shadow-lg max-w-[450px] mb-8">
                <a href="#" class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white px-25 py-2 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300">
                    Request Demo
                </a>
            </div>

            <!-- Kolom teks -->
            <div class="flex flex-col justify-center text-white self-start">
                <h1 class="text-4xl font-semibold tracking-wide mb-2"> Pengembangan system </h1>
                <p class="text-lg"> Design dan mengembangkan system sesuai kebutuhan perusahaan </p>

                <h1 class="text-4xl font-semibold tracking-wide mb-2 mt-4"> Berlangganan per bulan </h1>
                <p class="text-lg"> Pilih fitur aplikasi sesuai kebutuhan perusahaan anda </p>

                <h1 class="text-4xl font-semibold tracking-wide mb-2 mt-4"> Design ulang aplikasi anda </h1>
                <p class="text-lg"> Improve the performance of an application by re-design your UI application system </p>
            </div>
        </div>
        </div>

    </div>
    
    <div id="solusi">
        @include('pages.solusi')
    </div>
    <div id="blog">
        @include('pages.blog')
    </div>
    <div id="harga">
        @include('pages.harga')
    </div>
    @include('pages.contact')
    @include('pages.faq')
    @include('pages.footer')
</body>
</html>
