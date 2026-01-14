@extends('layouts.admin')

@section('title', 'Kelola Artikel - Blog Ilham')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Kelola Artikel</h1>
        <p class="text-gray-600">Daftar semua artikel</p>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-6 py-3 rounded-lg hover:from-purple-700 hover:to-indigo-700 font-semibold">Buat Artikel Baru</a>
</div>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table class="w-full">
        <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
            <tr>
                <th class="px-6 py-4 text-left">No</th>
                <th class="px-6 py-4 text-left">Judul</th>
                <th class="px-6 py-4 text-left">Kategori</th>
                <th class="px-6 py-4 text-left">Penulis</th>
                <th class="px-6 py-4 text-left">Tanggal</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $index => $article)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ $articles->firstItem() + $index }}</td>
                <td class="px-6 py-4 font-semibold">{{ Str::limit($article->title, 50) }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs text-white rounded-full" style="background-color: {{ $article->category->color }}">
                        {{ $article->category->name }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $article->user->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $article->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2 justify-center">
                        <a href="{{ route('article.show', $article->slug) }}" target="_blank" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">Lihat</a>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                    Belum ada artikel. <a href="{{ route('admin.articles.create') }}" class="text-purple-600 hover:underline">Buat artikel pertama</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="px-6 py-4 bg-gray-50">
        {{ $articles->links() }}
    </div>
</div>
@endsection