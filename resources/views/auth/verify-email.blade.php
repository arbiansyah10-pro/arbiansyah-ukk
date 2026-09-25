<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Penyetan Pwedespoll</title>
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
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Verifikasi Email Anda</h2>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Terima kasih telah mendaftar! Sebelum memulai, pastikan untuk memverifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-lg border border-green-200">
                    Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
                </div>
            @endif

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                    @csrf
                    <button type="submit" class="w-full bg-gray-900 text-white font-medium px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors">
                        Kirim Ulang Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-semibold text-gray-600 hover:text-red-600 underline transition-colors">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>