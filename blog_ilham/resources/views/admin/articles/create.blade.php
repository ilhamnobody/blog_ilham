@extends('layouts.admin')

@section('title', 'Buat Artikel Baru - Blog Ilham')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Buat Artikel Baru</h1>
    <p class="text-gray-600">Tulis artikel baru untuk blog</p>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <form method="POST" action="{{ route('admin.articles.store') }}">
        @csrf

        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-bold mb-2">Judul Artikel <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('title') border-red-500 @enderror" placeholder="Masukkan judul artikel">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-gray-500 text-sm mt-1">Slug akan dibuat otomatis dari judul</p>
        </div>

        <div class="mb-6">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Kategori <span class="text-red-500">*</span></label>
            <select name="category_id" id="category_id" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('category_id') border-red-500 @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="content" class="block text-gray-700 font-bold mb-2">Konten Artikel <span class="text-red-500">*</span></label>
            <textarea name="content" id="content" rows="15" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('content') border-red-500 @enderror" placeholder="Tulis konten artikel di sini...">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-gray-500 text-sm mt-1">Excerpt akan dibuat otomatis dari 150 karakter pertama</p>
        </div>

        <div class="mb-6">
            <label for="published_at" class="block text-gray-700 font-bold mb-2">Tanggal Publikasi</label>
            <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <p class="text-gray-500 text-sm mt-1">Kosongkan untuk publish sekarang</p>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-8 py-3 rounded-lg hover:from-purple-700 hover:to-indigo-700 font-bold">Simpan Artikel</button>
            <a href="{{ route('admin.articles.index') }}" class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 font-bold">Batal</a>
        </div>
    </form>
</div>
@endsection