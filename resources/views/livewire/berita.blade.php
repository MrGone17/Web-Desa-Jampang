<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Berita Desa Jampang</h2>
            </div>
        </div>
    </section>
    <div class="py-10 md:px-20 px-5 bg-white">
        <section class="relative">
            <p class="mb-5 text-3xl font-bold">Berita Terbaru</p>
            <div class="bg">
                @foreach ($beritas as $berita)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-5 h-[390px] md:h-60 overflow-hidden mb-5 bg-white md:bg-transparent shadow-lg md:shadow-none rounded-lg">
                        <div class="md:col-span-5 h-32 md:h-56 w-full rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}"
                                class="w-full h-full object-cover ">
                        </div>
                        <div class="md:col-span-7 py-2 px-2 flex flex-col h-full">
                            <p class="text-xs md:text-base break-words">{{ \Carbon\Carbon::parse($berita->publish_date)->format('d F Y') }}</p>
                            <h2 class="text-base md:text-xl font-bold break-words w-full line-clamp-3 text-gray-800 mt-2 text-left">
                                {{ $berita->title }}
                            </h2>
                            <p class="text-gray-600 mt-2 text-sm news-description line-clamp-4">
                                {{ strip_tags($berita->description) }}
                            </p>                            

                            <a href="{{ route('detail-berita', ['slug' => $berita->slug]) }}"
                                class="bg-primary hover:bg-white hover:border-primary text-base py-1 mt-2 px-4 text-white border border-transparent hover:text-primary rounded-lg flex items-center gap-2 w-40">
                                Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>    
</div>
