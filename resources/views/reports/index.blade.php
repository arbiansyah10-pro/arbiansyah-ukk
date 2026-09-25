<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Laporan Penjualan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-700">Riwayat Pesanan Pelanggan</h3>
                    <a href="{{ route('report.print') }}" target="_blank" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 font-bold flex items-center">
                        🖨️ Cetak Laporan
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">Tanggal</th>
                                <th class="border px-4 py-2">Nama Pelanggan</th>
                                <th class="border px-4 py-2">Detail Pesanan</th>
                                <th class="border px-4 py-2">Pengiriman & Pembayaran</th>
                                <th class="border px-4 py-2">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="border px-4 py-2 text-sm">{{ $order->created_at->format('d M Y, H:i') }}</td>
                                    <td class="border px-4 py-2 font-semibold">{{ $order->customer_name }}</td>
                                    <td class="border px-4 py-2 text-sm">
                                        <ul class="list-disc pl-4">
                                            @foreach($order->details as $detail)
                                                <li>{{ $detail->menu_name }} ({{ $detail->quantity }}x)</li>
                                            @endforeach
                                        </ul>
                                        @if($order->notes)
                                            <p class="text-xs text-gray-500 mt-1">Catatan: {{ $order->notes }}</p>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 text-sm">
                                        Kirim: {{ $order->delivery_method }} <br>
                                        Bayar: {{ $order->payment_method }}
                                    </td>
                                    <td class="border px-4 py-2 font-bold text-red-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-4 text-center text-gray-500">Belum ada pesanan masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>