@extends('layouts.app')

@section('title', 'Produk - PT. Maju Jaya Konstruksi')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Produk Kami</h1>
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                + Tambah Produk
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <!-- Search and Filter -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                @if($product->images->first())
                <img src="{{ Storage::url($product->images->first()->image_path) }}" alt="{{ $product->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
                @endif
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $product->title }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($product->short_description, 80) }}</p>
                    @if($product->price)
                    <p class="text-blue-600 font-bold mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    @endif
                    <div class="flex gap-2 mt-4 items-center">
                        <a href="{{ route('products.show', $product->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                            Detail
                        </a>
                        <span class="text-gray-300">|</span>
                        <a href="{{ route('products.edit', $product->slug) }}" class="text-green-600 hover:text-green-800 font-semibold text-sm">
                            Edit
                        </a>
                        <span class="text-gray-300">|</span>
                        <form action="{{ route('products.destroy', $product->slug) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg">Tidak ada produk ditemukan.</p>
        </div>
        @endif
    </div>
</section>
@endsection

