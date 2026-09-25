<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Penyetan Pwedespoll</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-white flex min-h-screen">

    <div class="hidden lg:flex lg:w-1/2 bg-red-700 items-center justify-center p-12 relative">
        <div class="relative z-10 text-white max-w-lg">
            <h1 class="text-4xl font-bold mb-4">Penyetan Pwedespoll</h1>
            <p class="text-lg text-red-100 leading-relaxed">
                Sistem manajemen pesanan dan kasir untuk memudahkan operasional warung harian Anda. Kelola menu dan pantau penjualan dalam satu tempat.
            </p>
        </div>
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:20px_20px]"></div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-md">
            
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali</h2>
                <p class="text-gray-500">Silakan masuk menggunakan kredensial admin Anda.</p>
            </div>

            @if (session('status'))
                <div class="mb-6 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-lg border border-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all" 
                        placeholder="admin@email.com">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-red-600 hover:underline">Lupa password?</a>
                        @endif
                    </div>
                    <input type="password" name="password" required 
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all" 
                        placeholder="••••••••">
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-600">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">Ingat Saya</label>
                </div>

                <button type="submit" class="w-full bg-gray-900 text-white font-medium py-3.5 rounded-lg hover:bg-gray-800 transition-colors mt-2">
                    Masuk ke Dashboard
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="text-red-600 hover:underline font-semibold">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
</html>