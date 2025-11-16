@extends('layouts.app')

@section('title', 'Tentang Kami - PT. Maju Jaya Konstruksi')

@section('content')
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Tentang Kami</h1>
        </div>

        <!-- Company Profile -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Profil Perusahaan</h2>
            <p class="text-gray-600 mb-4">
                PT. Maju Jaya Konstruksi didirikan dengan visi untuk menjadi perusahaan konstruksi terdepan di Indonesia. 
                Dengan pengalaman lebih dari 10 tahun dalam industri konstruksi, kami telah menyelesaikan berbagai proyek 
                mulai dari konstruksi perumahan, gedung komersial, hingga infrastruktur publik.
            </p>
            <p class="text-gray-600 mb-4">
                Kami mengutamakan kualitas, keamanan, dan kepuasan klien dalam setiap proyek yang kami kerjakan. 
                Tim profesional kami terdiri dari arsitek, insinyur, dan tenaga ahli konstruksi yang berpengalaman 
                dan berdedikasi tinggi.
            </p>
            <p class="text-gray-600">
                Dengan komitmen untuk terus berinovasi dan mengikuti perkembangan teknologi konstruksi terbaru, 
                kami siap membantu mewujudkan impian konstruksi Anda.
            </p>
        </div>

        <!-- Vision & Mission -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Visi</h2>
                <p class="text-gray-600">
                    Menjadi perusahaan konstruksi terdepan di Indonesia yang dikenal dengan kualitas, inovasi, 
                    dan komitmen terhadap kepuasan klien serta pembangunan berkelanjutan.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Misi</h2>
                <ul class="text-gray-600 space-y-2">
                    <li>• Menyediakan layanan konstruksi berkualitas tinggi dengan standar internasional</li>
                    <li>• Mengutamakan keselamatan kerja dan kepuasan klien</li>
                    <li>• Mengembangkan sumber daya manusia yang profesional dan kompeten</li>
                    <li>• Berinovasi dalam teknologi dan metode konstruksi</li>
                    <li>• Berkontribusi pada pembangunan infrastruktur yang berkelanjutan</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

