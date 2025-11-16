@extends('layouts.app')

@section('title', 'Kategori - PT. Maju Jaya Konstruksi')

@section('content')
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Kategori</h1>
            <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                + Tambah Kategori
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
        @endif

        @if($categories->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($categories as $category)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $category->name }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($category->description ?? 'Tidak ada deskripsi', 100) }}</p>
                
                <div class="flex gap-4 text-sm text-gray-500 mb-4">
                    <span>{{ $category->products_count }} Produk</span>
                    <span>•</span>
                    <span>{{ $category->articles_count }} Artikel</span>
                </div>

                <div class="flex gap-2 items-center">
                    <a href="{{ route('categories.show', $category->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                        Detail
                    </a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('categories.edit', $category->slug) }}" class="text-green-600 hover:text-green-800 font-semibold text-sm">
                        Edit
                    </a>
                    <span class="text-gray-300">|</span>
                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Kategori yang memiliki produk atau artikel tidak dapat dihapus.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $categories->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg">Tidak ada kategori ditemukan.</p>
            <a href="{{ route('categories.create') }}" class="text-blue-600 hover:text-blue-800 font-semibold mt-4 inline-block">
                Buat Kategori Pertama
            </a>
        </div>
        @endif
    </div>
</section>
@endsection

