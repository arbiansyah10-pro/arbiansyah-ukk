<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyetan Pwedespoll - Sensasi Pedas Nampol!</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .glass-nav { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="antialiased text-gray-800">

    <!-- Navbar (Glassmorphism) -->
    <nav class="glass-nav fixed w-full top-0 z-50 shadow-sm border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <span class="text-3xl">🌶️</span>
                    <h1 class="text-2xl font-extrabold text-red-600 tracking-tight">PWEDESPOLL</h1>
                </div>
                <div class="flex items-center space-x-6">
                    <!-- Icon Keranjang -->
                    <a href="{{ route('cart.index') }}" class="relative text-gray-600 hover:text-red-600 transition flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        @if(count((array) session('cart')) > 0)
                            <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full border-2 border-white">
                                {{ count((array) session('cart')) }}
                            </span>
                        @endif
                    </a>
                    <!-- Tombol Login/Dashboard -->
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hidden sm:inline-flex items-center justify-center px-6 py-2.5 bg-red-50 text-red-600 font-bold rounded-full hover:bg-red-100 transition shadow-sm">Dashboard Admin</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-500 hover:text-red-600 transition">Login Admin</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section Keren -->
    <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-24 bg-gradient-to-br from-red-600 via-red-500 to-orange-500 overflow-hidden">
        <!-- Dekorasi Background -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full mix-blend-overlay filter blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 opacity-20 rounded-full mix-blend-overlay filter blur-3xl transform translate-x-1/3 translate-y-1/3"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight mb-4 drop-shadow-lg">
                Lapar? Waktunya <span class="text-yellow-300">Makan Enak!</span>
            </h1>
            <p class="text-lg sm:text-xl text-red-50 max-w-2xl mx-auto mb-10 font-light">
                Spesialis penyetan pedas dengan sambal rahasia warisan keluarga. Awas ketagihan!
            </p>
            
            <!-- Search Bar Floating -->
            <div class="max-w-2xl mx-auto bg-white p-2 rounded-full shadow-2xl flex items-center transform transition-transform hover:scale-[1.02]">
                <form action="{{ url('/') }}" method="GET" class="w-full flex items-center">
                    <div class="pl-5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari ayam, lele, es jeruk..." class="w-full bg-transparent border-none px-4 py-3 focus:outline-none focus:ring-0 text-gray-700 placeholder-gray-400 font-medium text-lg">
                    <button type="submit" class="bg-red-600 text-white font-bold py-3 px-8 rounded-full hover:bg-red-700 transition-colors shadow-md text-lg">
                        Cari
                    </button>
                </form>
            </div>
            @if(isset($search) && $search != '')
                <div class="mt-6">
                    <a href="{{ url('/') }}" class="inline-block bg-white/20 hover:bg-white/30 text-white backdrop-blur-sm px-5 py-2 rounded-full text-sm font-medium transition">
                        ✖ Hapus pencarian "{{ $search }}"
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Main Content (Daftar Menu) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        @forelse ($categories as $category)
            <div class="mb-16">
                <!-- Header Kategori -->
                <div class="flex items-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 flex items-center gap-3">
                        {{ $category->name }}
                        <span class="bg-red-100 text-red-600 text-sm font-bold px-3 py-1 rounded-full">
                            {{ $category->menus->count() }} Menu
                        </span>
                    </h2>
                </div>
                
                <!-- Grid Kartu Menu -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                    @foreach ($category->menus as $menu)
                        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden hover:shadow-[0_8px_30px_rgb(220,38,38,0.12)] hover:-translate-y-2 transition-all duration-300 group flex flex-col">
                            
                            <!-- Foto & Harga Melayang -->
                            <div class="relative w-full aspect-[4/3] bg-gray-100 overflow-hidden">
                                @if ($menu->image)
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm font-medium">Foto Menyusul</span>
                                    </div>
                                @endif
                                <!-- Badge Harga -->
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full shadow-sm font-extrabold text-red-600 tracking-wide">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </div>
                            </div>
                            
                            <!-- Detail Bawah -->
                            <div class="p-6 flex flex-col flex-grow justify-between">
                                <h3 class="text-lg font-bold text-gray-800 leading-snug mb-4 group-hover:text-red-600 transition-colors">{{ $menu->name }}</h3>
                                
                                <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-50 text-red-600 font-bold py-3 px-4 rounded-2xl hover:bg-red-600 hover:text-white transition-all duration-300 active:scale-95">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                        </svg>
                                        Pesan Sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <!-- Tampilan Jika Kosong -->
            <div class="text-center py-24 px-4 bg-white rounded-3xl shadow-sm border border-gray-100">
                <div class="bg-gray-50 w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-6xl">🥺</span>
                </div>
                <h3 class="text-3xl font-extrabold text-gray-800 mb-3">Waduh, menu tidak ditemukan</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto text-lg">Mungkin salah ketik? Atau coba cari menu pedas lainnya yang tersedia hari ini.</p>
                <a href="{{ url('/') }}" class="inline-flex bg-red-600 text-white font-bold py-3.5 px-8 rounded-full hover:bg-red-700 transition-colors shadow-lg">
                    Lihat Semua Menu
                </a>
            </div>
        @endforelse
    </div>

    <!-- Script Notifikasi Modern -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: 'Masuk Keranjang!',
                    text: '{{ session('success') }}',
                    background: '#ffffff',
                    color: '#1f2937',
                    iconColor: '#ef4444',
                    customClass: { popup: 'rounded-2xl shadow-2xl border border-gray-100' }
                });
            });
        </script>
    @endif

</body>
</html>