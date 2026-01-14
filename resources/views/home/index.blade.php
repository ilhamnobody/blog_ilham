@extends('layouts.app')

@section('title', 'Home - Blog Ilham')

@section('content')
<div class="gradient-bg text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Selamat Datang di Blog Ilham</h1>
        <p class="text-xl text-gray-200">Berbagi pengetahuan seputar teknologi dan programming</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <div class="lg:w-2/3">
            <div class="mb-8">
                <form method="GET" action="/" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..." class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700">Cari</button>
                </form>
            </div>

            @if($articles->count() > 0)
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($articles as $article)
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                    <div class="p-6">
                        <span class="inline-block px-3 py-1 text-sm font-semibold text-white rounded-full mb-3" style="background-color: {{ $article->category->color }}">
                            {{ $article->category->name }}
                        </span>
                        
                        <h2 class="text-2xl font-bold mb-3 text-gray-800">
                            <a href="{{ route('article.show', $article->slug) }}" class="hover:text-purple-600">
                                {{ $article->title }}
                            </a>
                        </h2>
                        
                        <p class="text-gray-600 mb-4">{{ $article->excerpt }}</p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span>{{ $article->user->name }}</span>
                            <span>{{ $article->readingTime() }} min baca</span>
                        </div>
                        <div class="text-sm text-gray-400 mt-2">
                            {{ $article->published_at->format('d M Y') }}
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $articles->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Tidak ada artikel ditemukan</p>
            </div>
            @endif
        </div>

        <div class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Kategori</h3>
                <div class="space-y-2">
                    <a href="/" class="block px-4 py-2 rounded hover:bg-gray-100 {{ !request('category') ? 'bg-gray-100' : '' }}">
                        Semua Artikel ({{ $articles->total() }})
                    </a>
                    @foreach($categories as $cat)
                    <a href="/?category={{ $cat->id }}" class="block px-4 py-2 rounded hover:bg-gray-100 {{ request('category') == $cat->id ? 'bg-gray-100' : '' }}">
                        <span class="inline-block w-3 h-3 rounded-full mr-2" style="background-color: {{ $cat->color }}"></span>
                        {{ $cat->name }} ({{ $cat->articles_count }})
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg shadow-lg p-6 text-white">
                <h3 class="text-xl font-bold mb-3">Tentang Blog</h3>
                <p class="text-gray-100">Blog Ilham adalah platform berbagi pengetahuan seputar teknologi, programming, dan tips untuk developer.</p>
            </div>
        </div>
    </div>
</div>
@endsection