<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Password - Penyetan Pwedespoll</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-white flex min-h-screen">
    <div class="hidden lg:flex lg:w-1/2 bg-red-700 items-center justify-center p-12 relative">
        <div class="relative z-10 text-white max-w-lg">
            <h1 class="text-4xl font-bold mb-4">Penyetan Pwedespoll</h1>
            <p class="text-lg text-red-100 leading-relaxed">Sistem manajemen pesanan dan kasir untuk memudahkan operasional warung harian Anda. Kelola menu dan pantau penjualan dalam satu tempat.</p>
        </div>
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:20px_20px]"></div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Keamanan Berlapis</h2>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Ini adalah area aman aplikasi. Silakan konfirmasi password Anda sebelum melanjutkan.
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password Anda</label>
                    <input type="password" name="password" required autofocus
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all" 
                        placeholder="••••••••">
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-gray-900 text-white font-medium py-3.5 rounded-lg hover:bg-gray-800 transition-colors">
                    Konfirmasi Password
                </button>
            </form>
        </div>
    </div>
</body>
</html>