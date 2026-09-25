<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            ✏️ Edit Menu Makanan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-10">
                
                <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Nama Menu</label>
                        <input type="text" name="name" value="{{ old('name', $menu->name) }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">Kategori</label>
                            <select name="category_id" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $menu->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $menu->price) }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Foto Menu</label>
                        @if($menu->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="Foto Menu" class="w-32 h-32 object-cover rounded-xl border border-gray-200 shadow-sm">
                                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition">
                    </div>

                    <div class="pt-4 flex gap-4">
                        <button type="submit" class="bg-gray-900 text-white font-bold py-3.5 px-8 rounded-xl hover:bg-gray-800 transition shadow-lg">Update Menu</button>
                        <a href="{{ route('menus.index') }}" class="bg-white border-2 border-gray-200 text-gray-700 font-bold py-3.5 px-8 rounded-xl hover:bg-gray-50 transition text-center">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>