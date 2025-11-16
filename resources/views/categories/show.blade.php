@extends('layouts.app')

@section('title', $category->name . ' - PT. Maju Jaya Konstruksi')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('categories.index') }}" class="text-blue-600 hover:text-blue-800">← Kembali ke Daftar Kategori</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $category->name }}</h1>
                    <p class="text-gray-500 text-sm">Slug: {{ $category->slug }}</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('categories.edit', $category->slug) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                        Edit Kategori
                    </a>
                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Kategori yang memiliki produk atau artikel tidak dapat dihapus.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                            Hapus Kategori
                        </button>
                    </form>
                </div>
            </div>

            @if($category->description)
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Deskripsi</h2>
                <p class="text-gray-600">{{ $category->description }}</p>
            </div>
            @endif

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-blue-50 p-4 rounded-lg">
                    <p class="text-blue-600 font-semibold text-2xl">{{ $category->products->count() }}</p>
                    <p class="text-gray-600">Produk</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg">
                    <p class="text-green-600 font-semibold text-2xl">{{ $category->articles->count() }}</p>
                    <p class="text-gray-600">Artikel</p>
                </div>
            </div>
        </div>

        @if($category->products->count() > 0)
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Produk dalam Kategori Ini</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($category->products as $product)
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
                        <a href="{{ route('products.show', $product->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($category->articles->count() > 0)
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Artikel dalam Kategori Ini</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($category->articles as $article)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    @if($article->featured_image)
                    <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $article->title }}</h3>
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

