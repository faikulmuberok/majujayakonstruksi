@extends('layouts.app')

@section('title', $product->title . ' - PT. Maju Jaya Konstruksi')

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
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800">← Kembali ke Daftar Produk</a>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Images -->
            <div>
                @if($product->images->count() > 0)
                <div class="mb-4">
                    <img id="main-image" src="{{ Storage::url($product->images->first()->image_path) }}" 
                         alt="{{ $product->title }}" class="w-full h-96 object-cover rounded-lg">
                </div>
                @if($product->images->count() > 1)
                <div class="grid grid-cols-4 gap-2">
                    @foreach($product->images as $image)
                    <img src="{{ Storage::url($image->image_path) }}" alt="{{ $product->title }}" 
                         class="w-full h-24 object-cover rounded-lg cursor-pointer hover:opacity-75 transition"
                         onclick="document.getElementById('main-image').src = this.src">
                    @endforeach
                </div>
                @endif
                @else
                <div class="w-full h-96 bg-gray-200 flex items-center justify-center rounded-lg">
                    <span class="text-gray-400">No Image</span>
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->title }}</h1>
                @if($product->category)
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm mb-4">
                    {{ $product->category->name }}
                </span>
                @endif
                @if($product->price)
                <p class="text-3xl font-bold text-blue-600 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                @endif
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Deskripsi Singkat</h2>
                    <p class="text-gray-600">{{ $product->short_description }}</p>
                </div>
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Deskripsi Lengkap</h2>
                    <div class="text-gray-600 prose max-w-none">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="flex gap-4 mt-8">
                    <a href="{{ route('products.edit', $product->slug) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                        Edit Produk
                    </a>
                    <form action="{{ route('products.destroy', $product->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                            Hapus Produk
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Produk Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    @if($related->images->first())
                    <img src="{{ Storage::url($related->images->first()->image_path) }}" alt="{{ $related->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $related->title }}</h3>
                        <a href="{{ route('products.show', $related->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                            Lihat Detail →
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

