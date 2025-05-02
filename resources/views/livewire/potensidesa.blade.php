<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Potensi Desa</h2>
            </div>
        </div>
    </section>
    <!-- Start UMKM -->
  <div class="px-10 md:px-20 bg-white">
    <section data-hs-carousel='{"isDraggable": true,"isAutoPlay": true,"isInfiniteLoop": true,"loadingClasses": "opacity-0","dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500","slidesQty": {"xs": 1,"sm": 2,"lg": 3}}'class="relative"> 
      <div class="container mx-auto py-5 ">
        <div class="px-4 py-2 flex items-center justify-center">
            <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-right" data-aos-duration="1000">
                UMKM DAN PRODUK UNGGULAN DESA JAMPANG
            </h1>
        </div>   
        <div class="hs-carousel overflow-hidden m-auto w-full md:w-11/12 h-[525px] ">
          <div class="relative min-h-72 h-full">
            <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 cursor-grab hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing transition-transform duration-700">
              <!-- Card UMKM -->
              @foreach ($umkm as $item )
                @if ($item->is_active)
                  <div class="hs-carousel-slide flex justify-center" data-aos="fade-up" data-aos-duration="1000">
                    <div class="bg-white relative rounded-lg overflow-hidden md:mx-5 h-[590px] md:h-[500px] shadow-lg flex w-full flex-col">
                      <img alt="{{ $item->title }}" class="w-full h-[220px] object-cover" src="{{ asset('storage/' . $item->image) }}" loading="lazy" width="325" height="544" />
                      <div class="py-6 px-3 news-card">
                        <p class="text-xs">{{ \Carbon\Carbon::parse($item->publish_date)->format('d F Y') }}</p>
                        <h2 class="text-base font-bold text-gray-800 mt-2 text-left news-title line-clamp-3"> {{ $item->title }}</h2>
                        <p class="text-gray-600 mt-2 text-sm news-description line-clamp-4">
                          {{ strip_tags($item->description) }}
                        </p>
                        <a href="{{ route('detail-Umkm', ['slug' => $item->slug]) }}" class="px-2 py-1 bg-white text-base text-primary border border-primary rounded-full hover:bg-green-200 flex items-center w-fit mt-4">
                          Selengkapnya
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>   
                @endif
              @endforeach    
            </div>            
          </div>
        </div>
        <div class="hidden md:block">
            <div class="absolute inset-y-0 start-0 inline-flex justify-center items-center w-auto h-full rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <button type="button"
                    class="bg-primary hover:bg-green-500 rounded-full w-10 h-10 hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none ">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="shrink-0 text-white size-9" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
            </div>
            <div class="absolute inset-y-0 end-0 inline-flex justify-center items-center w-auto h-full">
                <button type="button"
                    class="hs-carousel-next bg-primary hover:bg-green-500 rounded-full w-10 h-10 hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="shrink-0 text-white m-auto size-9" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
      </div>
    </section>
    <div class="py-10 md:px-20 px-5 bg-green-50">
        <section class="relative">
            <div class="px-4 py-2 flex items-center justify-center mb-4">
                <h1 class="bg-primary text-white text-sm lg:text-3xl text-center font-bold px-6 py-2 rounded-lg">
                    PARIWISATA DAN BUDAYA DESA JAMPANG
                </h1>
            </div>
            <div class="p-2">
                @foreach ($pariwisata as $item)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-5 h-[390px] md:h-60 overflow-hidden mb-5 bg-white md:bg-transparent shadow-lg md:shadow-none rounded-lg">
                        <div class="md:col-span-5 h-32 md:h-56 w-full rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover ">
                        </div>
                        <div class="md:col-span-7 py-2 px-2 flex flex-col h-full">
                            <p class="text-xs md:text-base break-words">{{ \Carbon\Carbon::parse($item->publish_date)->format('d F Y') }}</p>
                            <h2 class="text-base md:text-xl font-bold break-words w-full line-clamp-3 text-gray-800 mt-2 text-left">
                                {{ $item->title }}
                            </h2>
                            <p class="text-gray-600 mt-2 text-sm news-description line-clamp-4">
                                {{ strip_tags($item->description) }}
                            </p>                            

                            <a href="{{ route('detail-Pariwisata', ['slug' => $item->slug]) }}"
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

            <!-- Karena ini statis, bagian pagination tidak diperlukan -->
            <!-- <div class="mt-10"> ... </div> -->
        </section>
    </div>    
  </div>
  <!-- End UMKM -->
</div>
