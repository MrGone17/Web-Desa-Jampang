<div>
    <div>
        <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
            <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
            <div class="relative container mx-auto px-6 md:px-20 py-16">
                <div class="text-center md:text-start text-white">
                    <h2 class="text-3xl md:text-5xl font-bold">Pemerintah Desa</h2>
                </div>
            </div>
        </section>
        <!-- Struktur Organisasi -->
        <section class="mx-auto py-16 px-5 md:px-16 bg-white">
            <div class="px-4 py-2 flex items-center justify-center mb-6">
                <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-right" data-aos-duration="1000">
                    Struktur Desa
                </h1>
            </div>  
            <img src="{{ asset('image/struktur.png') }}" alt="Struktur Organisasi" class="w-full max-h-[700px] object-contain mx-auto rounded-lg ">
        </section>
    
        <!-- Daftar Stuktur Utama -->
        @foreach ($divisi as $alpha)
            <section class="py-6 px-5 md:px-16 bg-white">
                <h1 class="uppercase text-lg md:text-3xl font-bold text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                    {{ $alpha->title }}
                </h1>
                <div class="flex flex-wrap justify-center gap-2 md:gap-5">
                    @foreach ($alpha->aparatur as $item)
                    <div class="group relative bg-slate-100 rounded-lg md:rounded-3xl w-[100px] h-40 md:h-96 md:w-80 overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                        <img class="object-cover w-full h-full transition-transform duration-300 ease-in-out group-hover:scale-110" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama }}">
                        
                        <div class="bg-green-300 rounded-lg md:rounded-3xl z-10 absolute right-0 left-0 bottom-0">
                            <div class="text-center px-4 py-1">
                                <p class="font-bold text-[8px] md:text-lg">{{ $item->nama }}</p>
                                <p class="text-[7px] md:text-sm font-semibold">{{ $item->jabatan }}</p>
                            </div>
                        </div>
                    </div>                    
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>    
</div>
