<x-app-layout>
    <!-- Suntik Font Poppins Khusus Dashboard -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        body, .font-sans { font-family: 'Poppins', sans-serif !important; }
    </style>

    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">
            🔥 {{ __('Pusat Kendali Pwedespoll') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Banner Selamat Datang Premium -->
            <div class="relative bg-gradient-to-r from-red-600 to-orange-500 rounded-3xl shadow-xl overflow-hidden mb-10">
                <!-- Dekorasi Banner -->
                <div class="absolute inset-0 bg-white opacity-10 blur-2xl rounded-full transform translate-x-1/2 -translate-y-1/2 w-96 h-96"></div>
                <div class="relative p-8 sm:p-10 flex flex-col sm:flex-row items-center justify-between z-10">
                    <div class="text-white mb-4 sm:mb-0">
                        <h3 class="text-3xl font-extrabold mb-2">Halo, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-red-50 text-lg font-light">Selamat datang di dashboard admin Penyetan Pwedespoll. Siap pantau pesanan hari ini?</p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/30 text-white font-bold shadow-lg">
                        {{ now()->format('d F Y') }}
                    </div>
                </div>
            </div>

            <!-- Grid Kartu Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Card 1: Total Kategori -->
                <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_8px_30px_rgb(220,38,38,0.12)] transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-red-50 rounded-full group-hover:scale-150 transition-transform duration-700 ease-in-out"></div>
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 font-semibold text-sm uppercase tracking-wider mb-1">Total Kategori</p>
                            <h4 class="text-5xl font-extrabold text-gray-900">{{ $totalKategori ?? 0 }}</h4>
                        </div>
                        <div class="bg-red-100 text-red-600 w-16 h-16 rounded-2xl flex items-center justify-center text-3xl shadow-inner">
                            📂
                        </div>
                    </div>
                </div>

                <!-- Card 2: Total Menu -->
                <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_8px_30px_rgb(249,115,22,0.12)] transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-orange-50 rounded-full group-hover:scale-150 transition-transform duration-700 ease-in-out"></div>
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 font-semibold text-sm uppercase tracking-wider mb-1">Menu Aktif</p>
                            <h4 class="text-5xl font-extrabold text-gray-900">{{ $totalMenu ?? 0 }}</h4>
                        </div>
                        <div class="bg-orange-100 text-orange-600 w-16 h-16 rounded-2xl flex items-center justify-center text-3xl shadow-inner">
                            🍗
                        </div>
                    </div>
                </div>

                <!-- Card 3: Pintasan Cepat ke Laporan -->
                <a href="{{ route('report.index') }}" class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 shadow-xl hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 relative overflow-hidden group flex flex-col justify-center">
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-white/5 rounded-full group-hover:scale-150 transition-transform duration-700 ease-in-out"></div>
                    <div class="relative z-10 flex items-center justify-between">
                        <div class="text-white">
                            <h4 class="text-2xl font-bold mb-1">Laporan Penjualan</h4>
                            <p class="text-gray-400 text-sm">Cetak & pantau riwayat</p>
                        </div>
                        <div class="bg-white/20 w-12 h-12 rounded-full flex items-center justify-center text-white backdrop-blur-sm group-hover:translate-x-2 transition-transform">
                            ➔
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
    </div>
</x-app-layout>