@extends('layouts.app')

@section('title', $article->title . ' - PT. Maju Jaya Konstruksi')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800">← Kembali ke Daftar Artikel</a>
        </div>

        <article class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($article->featured_image)
            <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover">
            @endif
            <div class="p-8">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <span>{{ $article->published_at->format('d M Y') }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->author }}</span>
                    @if($article->category)
                    <span class="mx-2">•</span>
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $article->category->name }}</span>
                    @endif
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $article->title }}</h1>
                @if($article->tags->count() > 0)
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($article->tags as $tag)
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                    @endforeach
                </div>
                @endif
                <div class="prose max-w-none text-gray-600">
                    {!! $article->content !!}
                </div>
                <div class="flex gap-4 mt-8">
                    <a href="{{ route('articles.edit', $article->slug) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                        Edit Artikel
                    </a>
                    <form action="{{ route('articles.destroy', $article->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                            Hapus Artikel
                        </button>
                    </form>
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        @if($relatedArticles->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Artikel Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedArticles as $related)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    @if($related->featured_image)
                    <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $related->title }}</h3>
                        <a href="{{ route('articles.show', $related->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
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

