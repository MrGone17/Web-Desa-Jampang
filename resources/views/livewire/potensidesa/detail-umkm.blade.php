<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('storage/' . $umkm->image) }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">UMKM Desa Jampang</h2>
            </div>
        </div>
    </section>
    <div class=" bg-white">
        <!-- Content Section -->
        <section class="relative p-5 md:p-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-16">
                <!-- Main Content -->
                <div class="col-span-1 md:col-span-9 grid">
                    <!-- Title -->
                    <h1 class="text-left w-full break-words md:mb-5 font-bold text-lg md:text-3xl order-2 md:order-1">
                        {{ $umkm->title }}
                    </h1>
    
                    <div class="py-2 text-sm md:text-lg text-gray-500 order-2">
                        {{ \Carbon\Carbon::parse($umkm->publish_date)->format('d F Y') }}
                    </div>
    
                    <div class="rounded-xl overflow-hidden order-1 my-5 md:order-3 cursor-pointer"
                        onclick="openImageModal('{{ asset('storage/' . $umkm->image) }}','{{ $umkm->title }}')">
                        <img src="{{ asset('storage/' . $umkm->image) }}" alt="{{ $umkm->title }}"
                            class="w-full max-h-80 md:max-h-[400px] m-auto rounded-xl min-h-20 md:min-h-80 object-contain">
                    </div>
    
                    <!-- Description -->
                    <div class="text-justify leading-tight py-2 order-4">
                        {!! $umkm->description !!}
                    </div>
                </div>
    
                <!-- Sidebar (Other News) -->
                <div class="col-span-1 md:col-span-3">
                    <div class="bg-white shadow-xl p-4 rounded-md">
                        <div class="mb-5 font-bold">UMKM Lainnya</div>
    
                        @foreach ($umkmLain as $item)
                            <a href="{{ route('detail-umkm', ['slug' => $item->slug]) }}" class="block w-full mb-4 rounded-xl">
                                <div class="grid grid-cols-12 gap-4 h-auto">
                                    <div class="col-span-5 overflow-hidden w-full rounded-xl">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="rounded-xl w-full h-16 object-contain">
                                    </div>
                                    <div class="col-span-7">
                                        <p class="text-xs/3">
                                            {{ \Carbon\Carbon::parse($item->publish_date)->format('d F Y') }}
                                        </p>
                                        <p class="font-bold text-sm line-clamp-3 w-full break-words">
                                            {{ $item->title }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>       
</div>
