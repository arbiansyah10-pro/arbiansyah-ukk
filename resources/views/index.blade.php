<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                📈 Laporan Penjualan
            </h2>
            <a href="{{ route('report.print') }}" target="_blank" class="bg-gray-900 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-gray-800 transition shadow-lg flex items-center gap-2">
                <span>🖨️</span> Cetak Laporan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
                
                <h3 class="text-lg font-bold text-gray-800 mb-6 border-b border-gray-100 pb-4">Riwayat Pesanan Pelanggan</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-sm uppercase tracking-wider rounded-xl">
                                <th class="px-6 py-4 font-semibold rounded-l-xl">Tanggal & Waktu</th>
                                <th class="px-6 py-4 font-semibold">Pelanggan</th>
                                <th class="px-6 py-4 font-semibold">Pesanan</th>
                                <th class="px-6 py-4 font-semibold">Status/Bayar</th>
                                <th class="px-6 py-4 font-semibold rounded-r-xl">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($orders as $order)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-5 text-sm font-medium text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-6 py-5 font-bold text-gray-800">{{ $order->customer_name }}</td>
                                    <td class="px-6 py-5 text-sm text-gray-600">
                                        <ul class="list-disc pl-4 space-y-1">
                                            @foreach($order->details as $detail)
                                                <li>{{ $detail->menu_name }} <span class="font-bold">({{ $detail->quantity }}x)</span></li>
                                            @endforeach
                                        </ul>
                                        @if($order->notes)
                                            <p class="text-xs text-red-500 mt-2 bg-red-50 p-2 rounded-lg border border-red-100">Request: {{ $order->notes }}</p>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 text-sm">
                                        <span class="inline-block bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-bold mb-1">{{ $order->delivery_method }}</span><br>
                                        <span class="inline-block bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-bold">{{ $order->payment_method }}</span>
                                    </td>
                                    <td class="px-6 py-5 font-extrabold text-lg text-red-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 text-lg">Belum ada pesanan masuk hari ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>