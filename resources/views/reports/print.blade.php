<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-10 text-gray-800" onload="window.print()">

    <div class="text-center mb-8 border-b-2 border-gray-800 pb-4">
        <h1 class="text-3xl font-bold">Penyetan Pwedespoll</h1>
        <p class="text-lg">Laporan Penjualan Keseluruhan</p>
        <p class="text-sm text-gray-500">Dicetak pada: {{ now()->format('d M Y, H:i') }}</p>
    </div>

    <table class="w-full border-collapse border border-gray-800 text-sm">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-800 px-2 py-2">No</th>
                <th class="border border-gray-800 px-2 py-2">Tanggal</th>
                <th class="border border-gray-800 px-2 py-2">Nama</th>
                <th class="border border-gray-800 px-2 py-2">Pesanan & Qty</th>
                <th class="border border-gray-800 px-2 py-2">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($orders as $index => $order)
                @php $grandTotal += $order->total_price; @endphp
                <tr>
                    <td class="border border-gray-800 px-2 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-800 px-2 py-2">{{ $order->created_at->format('d/m/Y') }}</td>
                    <td class="border border-gray-800 px-2 py-2">{{ $order->customer_name }}</td>
                    <td class="border border-gray-800 px-2 py-2">
                        @foreach($order->details as $detail)
                            {{ $detail->menu_name }} ({{ $detail->quantity }}x)<br>
                        @endforeach
                    </td>
                    <td class="border border-gray-800 px-2 py-2 text-right">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-gray-200 font-bold">
                <td colspan="4" class="border border-gray-800 px-2 py-2 text-right">TOTAL PENDAPATAN :</td>
                <td class="border border-gray-800 px-2 py-2 text-right">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>