<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT. Maju Jaya Konstruksi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                        PT. Maju Jaya Konstruksi
                    </a>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">Beranda</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">Tentang Kami</a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">Produk</a>
                    <a href="{{ route('articles.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">Artikel</a>
                    <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">Kategori</a>
                    <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2">Kontak</a>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('home') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2">Beranda</a>
                <a href="{{ route('about') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2">Tentang Kami</a>
                <a href="{{ route('products.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2">Produk</a>
                <a href="{{ route('articles.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2">Artikel</a>
                <a href="{{ route('categories.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2">Kategori</a>
                <a href="{{ route('contact.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">PT. Maju Jaya Konstruksi</h3>
                    <p class="text-gray-300">Perusahaan konstruksi terpercaya dengan pengalaman bertahun-tahun dalam membangun infrastruktur berkualitas.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <p class="text-gray-300 mb-2">Email: info@majujaya.com</p>
                    <p class="text-gray-300 mb-2">Telepon: +62 21 1234 5678</p>
                    <p class="text-gray-300">Alamat: Jl. Raya Konstruksi No. 123, Jakarta</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Tautan</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">Tentang Kami</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white">Produk</a></li>
                        <li><a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white">Artikel</a></li>
                        <li><a href="{{ route('categories.index') }}" class="text-gray-300 hover:text-white">Kategori</a></li>
                        <li><a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-white">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} PT. Maju Jaya Konstruksi. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });
    </script>
</body>
</html>

