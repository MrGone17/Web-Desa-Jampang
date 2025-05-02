<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Galeri Foto Desa</h2>
            </div>
        </div>
    </section>
    <div class="p-5 md:p-20 bg-green-50">
        <section class="relative">
            <div class="mb-20">
                <div class="mb-6 sm:mb-10 max-w-2xl text-start">
                    <h1 class="text-2xl md:text-4xl text-slate-800 font-bold text-left" data-aos="fade-right" data-aos-duration="1000">Galeri Desa</h1>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    
                    @foreach($albums as $album)
                        <a href="{{ route('detail-fotodesa', $album->slug) }}">
                            <div class="shadow-xl relative group rounded-xl cursor-pointer bg-white">
                                <div class="p-3 w-full h-72">
                                    <div class="h-fit overflow-hidden rounded-lg relative">
                                        <div class="h-52 w-full overflow-hidden rounded-lg">
                                            <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}"
                                                 class="w-fit h-full m-auto object-contain transition-transform duration-300 ease-in-out transform rounded-lg group-hover:scale-110">
                                        </div>
                                        <div class="absolute inset-0 bg-black opacity-0 transition-opacity duration-300 group-hover:opacity-60"></div>
                                        <div class="absolute transition-opacity duration-300 transform opacity-0 inset-0 group-hover:opacity-100 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" class="size-14 text-white">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-base md:text-xl text-center w-full font-semibold pt-2 break-words line-clamp-2">
                                        {{ $album->title }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
    
                </div>
            </div>
        </section>
    </div>    
    
    <script>
        function openImage(url, title, description) {
            alert(`Gambar: ${title}\nDeskripsi: ${description}\nURL: ${url}`);
            // Bisa diganti dengan modal tampilan custom
        }
    </script>    
</div>