@extends('layouts.app')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'Beranda - PT. Maju Jaya Konstruksi')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di PT. Maju Jaya Konstruksi</h1>
        <p class="text-xl mb-8">Solusi Terpercaya untuk Proyek Konstruksi Anda</p>
        <a href="{{ route('products.index') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Lihat Produk Kami
        </a>
    </div>
</section>

<!-- Company Description -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Perusahaan</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                PT. Maju Jaya Konstruksi adalah perusahaan konstruksi terkemuka yang telah melayani berbagai proyek konstruksi 
                dengan kualitas terbaik. Dengan pengalaman bertahun-tahun, kami berkomitmen untuk memberikan solusi konstruksi 
                yang inovatif, berkualitas tinggi, dan tepat waktu untuk setiap klien kami.
            </p>
        </div>
    </div>
</section>

<!-- Featured Products -->
@if($featuredProducts->count() > 0)
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Produk Unggulan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                @if($product->images->first())
                <img src="{{ Storage::url($product->images->first()->image_path) }}" alt="{{ $product->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $product->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($product->short_description, 100) }}</p>
                    @if($product->price)
                    <p class="text-blue-600 font-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    @endif
                    <a href="{{ route('products.show', $product->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('products.index') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Articles -->
@if($latestArticles->count() > 0)
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Artikel Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestArticles as $article)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                @if($article->featured_image)
                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
                @endif
                <div class="p-6">
                    <span class="text-sm text-gray-500">{{ $article->published_at->format('d M Y') }}</span>
                    <h3 class="text-xl font-semibold mb-2 mt-2">{{ $article->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($article->excerpt, 100) }}</p>
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('articles.index') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Lihat Semua Artikel
            </a>
        </div>
    </div>
</section>
@endif
@endsection

