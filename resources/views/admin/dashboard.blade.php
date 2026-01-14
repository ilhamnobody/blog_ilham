@extends('layouts.admin')

@section('title', 'Dashboard - Blog Ilham')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600">Selamat datang di admin panel Blog Ilham</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Artikel</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalArticles }}</p>
            </div>
            <div class="text-5xl">📝</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Artikel Published</p>
                <p class="text-3xl font-bold text-green-600">{{ $publishedArticles }}</p>
            </div>
            <div class="text-5xl">✅</div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Kategori</p>
                <p class="text-3xl font-bold text-purple-600">{{ $totalCategories }}</p>
            </div>
            <div class="text-5xl">📂</div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-6 mb-8">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Quick Actions</h2>
    <div class="flex gap-4">
        <a href="{{ route('admin.articles.create') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-6 py-3 rounded-lg hover:from-purple-700 hover:to-indigo-700 font-semibold">Buat Artikel Baru</a>
        <a href="{{ route('admin.articles.index') }}" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300 font-semibold">Lihat Semua Artikel</a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Artikel Terbaru</h2>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-700">Judul</th>
                    <th class="px-4 py-3 text-left text-gray-700">Kategori</th>
                    <th class="px-4 py-3 text-left text-gray-700">Tanggal</th>
                    <th class="px-4 py-3 text-left text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentArticles as $article)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ Str::limit($article->title, 40) }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs text-white rounded" style="background-color: {{ $article->category->color }}">
                            {{ $article->category->name }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $article->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-3">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection