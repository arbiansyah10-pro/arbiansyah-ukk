<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - Penyetan Pwedespoll</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white flex min-h-screen">

    <!-- Sisi Kiri: Branding (Hanya muncul di layar besar) -->
    <div class="hidden lg:flex lg:w-1/2 bg-red-700 items-center justify-center p-12 relative">
        <div class="relative z-10 text-white max-w-lg">
            <h1 class="text-4xl font-bold mb-4">Penyetan Pwedespoll</h1>
            <p class="text-lg text-red-100 leading-relaxed">
                Sistem manajemen pesanan dan kasir untuk memudahkan operasional warung harian Anda. Kelola menu dan pantau penjualan dalam satu tempat.
            </p>
        </div>
        <!-- Pola background simpel -->
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:20px_20px]"></div>
    </div>

    <!-- Sisi Kanan: Form Pendaftaran -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-md">
            
            <!-- Judul Form -->
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Akun Admin</h2>
                <p class="text-gray-500">Lengkapi data di bawah ini untuk mendapatkan akses sistem.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all" 
                        placeholder="Nama Anda">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all" 
                        placeholder="admin@email.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required 
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all" 
                        placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required 
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all" 
                        placeholder="Ketik ulang password">
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="w-full bg-gray-900 text-white font-medium py-3.5 rounded-lg hover:bg-gray-800 transition-colors mt-2">
                    Buat Akun
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-red-600 hover:underline font-semibold">Masuk di sini</a>
            </p>
        </div>
    </div>

</body>
</html>