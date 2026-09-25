<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                🥘 Daftar Menu Makanan
            </h2>
            <a href="{{ route('menus.create') }}" class="bg-red-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-red-700 transition shadow-lg shadow-red-200 flex items-center gap-2">
                <span>+</span> Tambah Menu Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                
                @if(session('success'))
                    <div class="bg-green-50 text-green-600 p-4 font-semibold border-b border-green-100 flex items-center gap-2">
                        <span>✅</span> {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-sm uppercase tracking-wider border-b border-gray-100">
                                <th class="px-6 py-4 font-semibold">Foto</th>
                                <th class="px-6 py-4 font-semibold">Nama Menu</th>
                                <th class="px-6 py-4 font-semibold">Kategori</th>
                                <th class="px-6 py-4 font-semibold">Harga</th>
                                <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($menus as $menu)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        @if($menu->image)
                                            <img src="{{ asset('storage/' . $menu->image) }}" class="w-16 h-16 rounded-2xl object-cover shadow-sm" alt="Foto">
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center text-xs text-gray-400">No Pic</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-800">{{ $menu->name }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $menu->category->name ?? '-' }}</td>
                                    <td class="px-6 py-4 font-extrabold text-red-600">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="{{ route('menus.edit', $menu->id) }}" class="text-blue-500 bg-blue-50 px-3 py-1.5 rounded-lg hover:bg-blue-500 hover:text-white transition font-medium text-sm">Edit</a>
                                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500 bg-red-50 px-3 py-1.5 rounded-lg hover:bg-red-500 hover:text-white transition font-medium text-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada menu yang ditambahkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>