@extends('layouts.app')
@section('title', 'Artikel - VetConnect')
@section('content')
<body class="bg-gray-100">

    <!-- Navbar -->
    <!-- Artikel Section -->
    <section class="container px-6 mx-auto mt-12">
        <div class="space-y-8">

            @foreach ($articles as $article)
                <div class="flex flex-col items-center overflow-hidden bg-white rounded-lg shadow-md md:flex-row">
                    <div class="md:w-2/5">
                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}"
                            class="object-cover w-full h-48 md:h-full">
                    </div>
                    <div class="p-6 md:w-3/5">
                        <h2 class="text-lg font-bold text-gray-800">{{ $article->judul }}</h2>
                        <p class="mt-2 text-gray-600">{{ Str::limit(strip_tags($article->isi), 100) }}</p>
                        <a href="{{ route('articles.show', $article->id) }}"
                            class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    @endsection

</body>

</html>
