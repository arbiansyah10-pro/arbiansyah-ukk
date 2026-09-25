<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            ✏️ Edit Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-10">
                
                <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="name" class="block font-semibold text-gray-700 mb-2">Nama Kategori</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition" placeholder="Contoh: Makanan, Minuman, Es...">
                    </div>

                    <div class="pt-4 flex gap-4">
                        <button type="submit" class="bg-gray-900 text-white font-bold py-3.5 px-8 rounded-xl hover:bg-gray-800 transition shadow-lg">
                            Update Kategori
                        </button>
                        <a href="{{ route('categories.index') }}" class="bg-white border-2 border-gray-200 text-gray-700 font-bold py-3.5 px-8 rounded-xl hover:bg-gray-50 transition text-center flex items-center justify-center">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>