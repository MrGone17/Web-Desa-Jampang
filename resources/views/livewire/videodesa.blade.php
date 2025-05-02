<div>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Galeri Video Desa</h2>
            </div>
        </div>
    </section>

    <!-- Video Gallery Section -->
    <div class="p-5 md:p-20 bg-white">
        <section class="relative">
            <div class="mb-20">
                <div class="text-center text-4xl font-bold mb-5">Video Kegiatan Desa</div>
                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <!-- Video Item 1 -->
                    @foreach ($video as $item)
                    <div class="shadow-xl rounded-xl overflow-hidden bg-white">
                        {!! $item->link !!}
                        <div class="text-center text-lg font-semibold p-4">{{ $item->title }}</div>
                    </div> 
                    @endforeach                   

                    <!-- Tambahkan item video lainnya di sini -->
                </div>
            </div>
        </section>
    </div>
</div>
