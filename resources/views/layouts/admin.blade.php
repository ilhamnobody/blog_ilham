<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Blog Ilham')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gradient-to-r from-purple-600 to-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-white text-2xl font-bold">Blog Ilham Admin</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-white">{{ auth()->user()->name }}</span>
                    <a href="/" target="_blank" class="text-white hover:text-gray-200">Lihat Blog</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <aside class="w-64 bg-white shadow-lg min-h-screen">
            <nav class="p-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg mb-2 {{ request()->routeIs('admin.dashboard') ? 'bg-purple-100 text-purple-700' : 'hover:bg-gray-100' }}">Dashboard</a>
                <a href="{{ route('admin.articles.index') }}" class="block px-4 py-3 rounded-lg mb-2 {{ request()->routeIs('admin.articles.*') ? 'bg-purple-100 text-purple-700' : 'hover:bg-gray-100' }}">Kelola Artikel</a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>