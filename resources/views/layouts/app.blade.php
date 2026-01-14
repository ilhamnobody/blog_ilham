<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Ilham')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .hover-scale { transition: transform 0.3s ease; }
        .hover-scale:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="gradient-bg shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-white text-2xl font-bold">Blog Ilham</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-white hover:text-gray-200 px-3 py-2">Home</a>
                    <a href="/login" class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-gray-100 font-semibold">Admin Login</a>
                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 mt-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-8 text-center">
            <p>&copy; 2026 Blog Ilham - Universitas Muhammadiyah Tasikmalaya</p>
        </div>
    </footer>
</body>
</html>