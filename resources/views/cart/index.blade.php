<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Penyetan Pwedespoll</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-red-600 p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Keranjang Pesanan</h1>
            <a href="{{ url('/') }}" class="text-white hover:underline font-medium">← Kembali ke Menu</a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto p-6 mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4 border-b pb-2">Menu yang Dipilih</h2>
            @php $total = 0; @endphp

            @if(session('cart') && count(session('cart')) > 0)
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <div class="flex justify-between items-center mb-4 pb-2 border-b">
                        <div>
                            <h3 class="font-semibold text-gray-800">{{ $details['name'] }}</h3>
                            <p class="text-sm text-gray-500">{{ $details['quantity'] }} x Rp {{ number_format($details['price'], 0, ',', '.') }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <p class="font-bold text-red-600">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</p>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-xl">×</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="flex justify-between items-center mt-6">
                    <h3 class="text-lg font-bold">Total Harga:</h3>
                    <h3 class="text-xl font-bold text-red-600">Rp {{ number_format($total, 0, ',', '.') }}</h3>
                </div>
            @else
                <p class="text-gray-500 text-center">Keranjang masih kosong.</p>
            @endif
        </div>

       
        <!-- Sisi Kanan: Form Checkout -->
        <form action="{{ route('cart.checkout') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h2 class="text-xl font-bold mb-4 border-b pb-2">Detail Pengiriman & Request</h2>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Nama Pemesan</label>
                <input type="text" name="customer_name" required class="w-full border-gray-300 rounded-md p-2 border focus:border-red-500" placeholder="Masukkan nama kamu">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Metode Pengiriman</label>
                <select name="delivery" class="w-full border-gray-300 rounded-md p-2 border focus:border-red-500">
                    <option value="Ambil Sendiri (Takeaway)">Ambil Sendiri (Takeaway)</option>
                    <option value="Delivery (Maksimal radius 2km)">Delivery (Maksimal radius 2km - Ongkir bayar di tempat)</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Metode Pembayaran</label>
                <select name="payment" class="w-full border-gray-300 rounded-md p-2 border focus:border-red-500">
                    <option value="QRIS">QRIS</option>
                    <option value="Cash / Tunai">Cash / Tunai</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Catatan Tambahan (Request)</label>
                <textarea name="notes" class="w-full border-gray-300 rounded-md p-2 border focus:border-red-500" rows="3" placeholder="Contoh: Tahu penyet dibikin balado pedas, es nutrisari gulanya dikit aja ya."></textarea>
            </div>

            @if(session('cart') && count(session('cart')) > 0)
                <button type="submit" class="w-full bg-green-500 text-white font-bold py-3 rounded-md hover:bg-green-600 flex justify-center items-center">
                    <span class="mr-2">📲</span> Kirim Pesanan ke WhatsApp
                </button>
            @endif
        </form>

    </div>
</body>
</html>

</body>       
</html>