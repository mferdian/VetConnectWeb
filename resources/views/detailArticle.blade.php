    @extends('layouts.app')

    @push('meta')
        <!-- Meta tags untuk SEO -->
        <meta name="description" content="{{ Str::limit(strip_tags($article->isi), 160) }}">
        <meta name="author" content="{{ $article->vet->nama ?? 'VetConnect' }}">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="{{ $article->judul }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($article->isi), 160) }}">
        <meta property="og:image" content="{{ asset('storage/' . $article->gambar) }}">
        <meta property="og:type" content="article">
    @endpush

    @section('content')
        <section class="container px-6 mx-auto mt-6 mb-12">
            <div class="max-w-4xl mx-auto">

                {{-- Tombol Kembali --}}
                <div class="mb-6">
                    <button onclick="window.history.back()"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:text-gray-900">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali
                    </button>
                </div>

                {{-- Artikel --}}
                <article class="overflow-hidden bg-white shadow-lg rounded-xl">

                    <div class="p-8 pb-6">
                        {{-- Kategori --}}
                        <div class="mb-4">
                            <span class="inline-block px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                                Artikel Kesehatan Hewan
                            </span>
                        </div>

                        {{-- Judul --}}
                        <h1 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                            {{ $article->judul }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-6 mb-6 text-sm text-gray-600">

                            {{-- Penulis --}}
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-10 h-10 mr-3 rounded-full bg-gradient-to-r from-blue-500 to-purple-600">
                                    <span class="text-sm font-semibold text-white">
                                        {{ $article->vet ? strtoupper(substr($article->vet->nama, 0, 1)) : 'V' }}
                                    </span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">
                                        {{ $article->vet->nama ?? 'Tim VetConnect' }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        {{ $article->vet->spesialisasi ?? 'Dokter Hewan' }}
                                    </p>
                                </div>
                            </div>

                            {{-- Tanggal --}}
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $article->created_at->format('d M Y') }}</span>
                            </div>

                            {{-- Waktu baca --}}
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ ceil(str_word_count(strip_tags($article->isi)) / 200) }} menit baca</span>
                            </div>
                        </div>
                    </div>

                    {{-- Gambar Artikel --}}
                    @if ($article->gambar)
                        <div class="px-8">
                            <div class="relative overflow-hidden rounded-xl">
                                <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}"
                                    class="object-cover w-full h-64 md:h-96">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                        </div>
                    @endif

                    {{-- Isi Artikel --}}
                    <div class="p-8 pt-8">
                        <div
                            class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-relaxed prose-img:rounded-xl prose-img:shadow-md prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700">
                            {!! $article->isi !!}
                        </div>
                    </div>

                    {{-- Footer Artikel --}}
                    <div class="px-8 pb-8">
                        <div class="pt-6 border-t border-gray-200">

                            {{-- Tentang Penulis --}}
                            @if ($article->vet)
                                <div class="p-6 mb-6 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl">
                                    <h3 class="mb-3 text-lg font-semibold text-gray-900">Tentang Penulis</h3>
                                    <div class="flex items-start space-x-4">
                                        <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-r from-blue-500 to-purple-600">
                                            <span class="text-xl font-bold text-white">
                                                {{ strtoupper(substr($article->vet->nama, 0, 1)) }}
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-lg font-semibold text-gray-900">{{ $article->vet->nama }}</h4>
                                            <p class="mb-2 font-medium text-blue-600">
                                                {{ $article->vet->spesialisasi ?? 'Dokter Hewan' }}
                                            </p>
                                            @if ($article->vet->bio)
                                                <p class="text-sm leading-relaxed text-gray-600">{{ $article->vet->bio }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Share --}}
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div class="flex items-center space-x-4">
                                    <span class="text-sm font-medium text-gray-700">Bagikan artikel:</span>

                                    {{-- WhatsApp --}}
                                    <a href="https://wa.me/?text={{ urlencode($article->judul . ' - ' . request()->url()) }}"
                                        target="_blank"
                                        class="inline-flex items-center justify-center w-10 h-10 text-white transition-colors bg-green-500 rounded-full hover:bg-green-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    @endsection
