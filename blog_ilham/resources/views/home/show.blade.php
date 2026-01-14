@extends('layouts.app')

@section('title', $article->title . ' - Blog Ilham')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <a href="/" class="inline-flex items-center text-purple-600 hover:text-purple-700 mb-6">← Kembali ke Home</a>

    <article class="bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="p-8">
            <span class="inline-block px-4 py-2 text-sm font-semibold text-white rounded-full mb-4" style="background-color: {{ $article->category->color }}">
                {{ $article->category->name }}
            </span>

            <h1 class="text-4xl font-bold mb-4 text-gray-900">{{ $article->title }}</h1>

            <div class="flex items-center gap-6 text-gray-600 mb-6 pb-6 border-b">
                <div class="flex items-center gap-2">
                    <span>{{ $article->user->name }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span>{{ $article->published_at->format('d F Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span>{{ $article->readingTime() }} menit baca</span>
                </div>
            </div>

            <div class="prose prose-lg max-w-none">
                <div class="text-gray-700 leading-relaxed text-lg">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>
    </article>

    @if($relatedArticles->count() > 0)
    <div class="mt-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Artikel Terkait</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($relatedArticles as $related)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-scale">
                <div class="p-6">
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-white rounded-full mb-3" style="background-color: {{ $related->category->color }}">
                        {{ $related->category->name }}
                    </span>
                    <h3 class="text-lg font-bold mb-2">
                        <a href="{{ route('article.show', $related->slug) }}" class="hover:text-purple-600">
                            {{ $related->title }}
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm">{{ Str::limit($related->excerpt, 80) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection