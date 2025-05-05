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
        <div class="px-4 py-4 flex items-center justify-center">
            <h1 class="bg-primary text-white text-xlS md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-right" data-aos-duration="1000">
                Galeri Kegiatan Desa
            </h1>
        </div>   
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($album->photos as $photo)
                <div class="overflow-hidden rounded-lg shadow-lg bg-white">
                    <div class="md:h-56 h-40 overflow-hidden relative">
                        <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-105" />
                    </div> 
                    @if($photo->caption)
                        <p class="mt-3 px-4 pb-4 text-center text-gray-500 text-xl font-light italic tracking-wide">
                            "{{ $photo->caption }}"
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="mt-6 flex justify-end">
            <a class="py-1 px-1 sm:py-3 sm:px-4 inline-flex justify-center items-center gap-x-2 text-xs md:text-base font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-transparent hover:border-green-600 hover:text-green-600"
                href="{{ route('Fotodesa') }}">
                ← Kembali Ke Halaman Awal
            </a>
        </div>        
    </div>    
</div>
