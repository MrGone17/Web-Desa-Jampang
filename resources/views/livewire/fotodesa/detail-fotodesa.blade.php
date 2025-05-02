<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('storage/' . $album->cover_image) }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">{{ $album->title }}</h2>
            </div>
        </div>
    </section>
    <div class="p-4 max-w-6xl mx-auto">
        <div class="px-4 py-2 flex items-center justify-center">
            <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-right" data-aos-duration="1000">
                Galeri Kegiatan Desa
            </h1>
        </div>   
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($album->photos as $photo)
                <div class="overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-56 object-cover hover:scale-105 transition-transform duration-300">
                    @if($photo->caption)
                        <p class="text-sm mt-2 px-2 pb-2 text-center text-gray-700">{{ $photo->caption }}</p>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            <a class="py-1 px-1 sm:py-3 sm:px-4 inline-flex justify-center items-center gap-x-2 text-[8px] sm:text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-transparent hover:border-green-600 hover:text-green-600"
                href="{{ route('Fotodesa') }}">
                ← Kembali
            </a>
        </div>        
    </div>    
</div>
