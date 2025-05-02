<div class="overflow-hidden">
  <!-- Slider -->
  <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
    "isAutoPlay": true,
    "autoPlayInterval": 5000,
    "isInfiniteLoop": true,
    "slidesQty": 1}' 
    class="relative h-[230px] md:h-[460px]">
    <div class="hs-carousel relative overflow-hidden w-full min-h-full">
      <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">

        <!-- Slide 1 -->
        @foreach ($slider as $item )
          @if ($item->is_active)
            <div class="hs-carousel-slide">
              <div class="flex justify-start h-full w-full bg-no-repeat bg-center bg-cover" style="background-image: url('{{ asset('storage/' . $item->image_cover) }}');">
                <div class="flex items-center px-14 md:px-24 mt-4 md:mt-16 w-full md:w-1/2">
                  <div class="slider-content md:text-left">
                    <div class="flex flex-col items-start gap-4 md:gap-6">
                      <div class="w-64 md:w-96 mt-6 md:mt-0">
                        <h1 class="text-sm md:text-4xl font-bold text-blue-950 lg:leading-tight">
                          {{ $item->title }}
                        </h1>
                      </div>
                      <div class="w-64 md:w-full mt-0 md:mt-7">
                        <span class="text-xs md:text-2xl text-gray-500">
                          {{ $item->description }}
                        </span>
                      </div>
                    </div>                
                    <div class="mt-3 md:mt-7 flex gap-2 flex-wrap">
                      @if (!empty($item->button_text1))
                        <a class="py-1 px-1 sm:py-3 sm:px-4 inline-flex justify-center items-center gap-x-2 text-[8px] sm:text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-transparent hover:border-green-600 hover:text-green-600"
                            href="{{ $item->button_link1 }}">
                            {{ $item->button_text1 }}
                        </a>
                      @endif
                      @if (!empty($item->button_text2))
                        <a class="py-1 px-1 sm:py-3 sm:px-4 inline-flex justify-center items-center gap-x-2 text-[8px] sm:text-sm font-medium rounded-lg border border-green-600 bg-transparent text-green-600 hover:bg-green-600 hover:text-white"
                            href="{{ $item->button_link2 }}">
                            {{ $item->button_text2 }}
                        </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <!-- Prev Button -->
    <button type="button"
      class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-6 md:inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-blue-600 hover:text-blue-700 rounded-s-lg">
      <span class="text-2xl" aria-hidden="true">
        <svg class="shrink-0 size-5 md:size-10" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="m15 18-6-6 6-6"></path>
        </svg>
      </span>
      <span class="sr-only">Previous</span>
    </button>

    <!-- Next Button -->
    <button type="button"
      class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-6 md:inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-blue-600 hover:text-blue-700 rounded-e-lg">
      <span class="sr-only">Next</span>
      <span class="text-2xl" aria-hidden="true">
        <svg class="shrink-0 size-5 md:size-10" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="m9 18 6-6-6-6"></path>
        </svg>
      </span>
    </button>
  </div>

  <!-- End Slider -->
  <!-- start sambutanr -->
  <div class="px-10 md:px-20 bg-white">
    <section class="relative py-10">
      @foreach ($sambutan as $item )
        @if ($item->is_active)
          <div class="grid grid-cols-1 md:grid-cols-12 items-center md:gap-14">
            <!-- Text Section -->
            <div class="w-full col-span-8 text-center px-5 mb-5 order-2 md:order-1"
                 data-aos="fade-right" data-aos-duration="1000">
              <div class="text-center md:text-left">
                <hr class="bg-green-500 h-1 mb-5 m-auto md:ml-0 w-20">
                <h1 class="text-2xl sm:text-4xl font-bold text-slate-800 mb-5">
                  {{ $item->title }}
                </h1>
                <div class="whitespace-pre-line text-left text-gray-700 line-clamp-[15] [&_ol]:list-decimal [&_ol]:pl-10 [&_ul]:pl-10 [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5 break-words"
                     id="speech-description">
                  {{ $item->description }}            
                </div>
                <a href="#" id="readMore"
                  class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700 mt-4">
                  <span>Selengkapnya</span>
                  <svg class="ml-1 w-5 h-5 transition-transform duration-300 arrow-icon" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"></path>
                  </svg>
                </a>
              </div>
            </div>
      
            <!-- Static Image Section -->
            <div class="w-full h-[300px] md:h-[450px] col-span-4 rounded-3xl overflow-hidden order-1 md:order-2 relative flex flex-col my-5 justify-center bg-blue-400"
                 data-aos="fade-left" data-aos-duration="1000">
              <img alt="Kepala Desa" class="object-cover w-full h-full"
                src="{{ asset('storage/' . $item->image_kades) }}" />
              <p class="bg-green-300 py-2 text-center font-medium w-full z-10 absolute bottom-0 rounded-full text-lg">
                {{ $item->nama_kades }}
              </p>
            </div>
          </div>
        @endif
      @endforeach
    </section>
    <style>
      .rotate-180 {
        transform: rotate(180deg);
      }
  
      .line-clamp-none {
        -webkit-line-clamp: unset !important;
        max-height: none !important;
        overflow: visible !important;
      }
    </style>
  </div>
  <!-- End Sambutan -->
  <!-- Start Berita -->
  <div class="px-10 md:px-20 bg-green-50">
    <section data-hs-carousel='{"isDraggable": true,"isAutoPlay": true,"isInfiniteLoop": true,"loadingClasses": "opacity-0","dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500","slidesQty": {"xs": 1,"sm": 2,"lg": 3}}'class="relative"> 
      <div class="container mx-auto py-5 ">
        <h1 class="text-2xl md:text-4xl px-5 md:ml-10 text-slate-800 font-bold text-left mb-3 md:mb-6 mt-5"  data-aos="fade-right" data-aos-duration="1000">
            Berita & Event Terbaru
        </h1>
        <div class="hs-carousel overflow-hidden m-auto w-full md:w-11/12 h-[525px] ">
          <div class="relative min-h-72 h-full">
            <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 cursor-grab hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing transition-transform duration-700">
              <!-- Card Berita -->
              @foreach ($berita as $index => $item )
                @if ($item->is_active)
                  <div class="hs-carousel-slide flex justify-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $index * 500 }}">
                    <div class="bg-white relative rounded-lg overflow-hidden md:mx-5 h-[590px] md:h-[500px] shadow-lg flex w-full flex-col">
                      <img alt="{{ $item->title }}" class="w-full h-[220px] object-cover" src="{{ asset('storage/' . $item->image) }}" loading="lazy" width="325" height="544" />
                      <div class="py-6 px-3 news-card">
                        <p class="text-xs">{{ \Carbon\Carbon::parse($item->publish_date)->format('d F Y') }}</p>
                        <h2 class="text-base font-bold text-gray-800 mt-2 text-left news-title line-clamp-3"> {{ $item->title }}</h2>
                        <p class="text-gray-600 mt-2 text-sm news-description line-clamp-4">
                          {{ strip_tags($item->description) }}
                        </p>
                        <a href="{{ route('detail-berita', ['slug' => $item->slug]) }}" class="px-2 py-1 bg-white text-base text-primary border border-primary rounded-full hover:bg-green-200 flex items-center w-fit mt-4">
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

        <div class="text-center">
            <a href="#"
                class="bg-green-700 hover:bg-green-600 text-white  font-bold py-2 sm:py-3 px-4 sm:px-8 rounded-full inline-block text-xs md:text-base">Berita
                Selengkapnya</a>
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
  </div>
  <!-- End Berita -->
  <!--Start Jumlah Penduduk-->
  <section class="bg-white py-16 px-6 md:px-20">
    <div class="max-w-7xl mx-auto">
      <h1 class="text-2xl md:text-4xl px-5 md:ml-10 text-slate-800 font-bold text-left mb-3 md:mb-6 mt-5" data-aos="fade-right" data-aos-duration="1000">
        Data Penduduk Desa Jampang
      </h1>
      <!-- Carousel Wrapper -->
      <div data-hs-carousel='{
        "slidesQty": { "xs": 1, "sm": 2, "md": 2, "lg": 3 },
        "isAutoPlay": true,
        "autoPlayInterval": 4000, 
        "isDraggable": true,
        "isInfiniteLoop": true
      }' class="relative">
        <div class="hs-carousel overflow-hidden">
          <div class="hs-carousel-body flex transition-transform duration-700">
            <!-- Start Rw Card-->
            @foreach($datapenduduk as $rw)
              <div class="hs-carousel-slide flex justify-center p-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="bg-green-50 rounded-2xl shadow-md p-6 w-full max-w-md">
                  <h3 class="text-xl font-semibold text-green-800 mb-4">RW {{ str_pad($rw->nomor_rw, 2, '0', STR_PAD_LEFT) }}</h3>
                  <div class="space-y-2">
                    @foreach($rw->rts as $rt)
                      <div class="flex justify-between bg-white p-3 rounded shadow-sm">
                        <span>RT {{ str_pad($rt->nomor_rt, 2, '0', STR_PAD_LEFT) }}</span>
                        <span>{{ $rt->jumlah_penduduk ?? '-' }} orang</span>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            @endforeach
            <!-- End RW cards -->
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-center items-center mt-2" data-aos="fade-up" data-aos-duration="1000">
      <div class="bg-white shadow-lg rounded-2xl p-6 md:p-10 w-full max-w-md border border-green-100">
        <div class="text-center">
          <h2 class="text-sm md:text-lg text-gray-500 font-medium mb-2">Total Penduduk</h2>
          <p class="text-2xl md:text-3xl font-bold text-green-700">{{ number_format($totalPenduduk) }} orang</p>
        </div>
        <div class="mt-4 flex justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0V4m0 3a4 4 0 01-4 4m-4 0a4 4 0 014-4m6 7h.01M4 15h.01M12 15h.01M20 15h.01M8 19h.01M16 19h.01" />
          </svg>
        </div>
      </div>
    </div>
  </section>  
  <!--End Jumlah Penduduk-->
  <!-- Start UMKM -->
  <div class="px-10 md:px-20 bg-green-50">
    <section data-hs-carousel='{"isDraggable": true,"isAutoPlay": true,"isInfiniteLoop": true,"loadingClasses": "opacity-0","dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500","slidesQty": {"xs": 1,"sm": 2,"lg": 3}}'class="relative"> 
      <div class="container mx-auto py-5 ">
        <h1 class="text-2xl md:text-4xl px-5 md:ml-10 text-slate-800 font-bold text-left mb-3 md:mb-6 mt-5" data-aos="fade-right" data-aos-duration="1000">
            UMKM Desa Jampang
        </h1>
        <div class="hs-carousel overflow-hidden m-auto w-full md:w-11/12 h-[525px] ">
          <div class="relative min-h-72 h-full">
            <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 cursor-grab hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing transition-transform duration-700">
              <!-- Card UMKM -->
              @foreach ($umkm as $item )
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
              @endforeach  
            </div>            
          </div>
        </div>

        <div class="text-center mt-2 md:mt-0">
          <a href="#" class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 sm:py-3 px-4 sm:px-8 rounded-full inline-block text-xs md:text-base">
            UMKM Selengkapnya
          </a>
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
  </div>
  <!-- End UMKM -->
  <!-- Start Galeri -->
  <section class="relative py-5 bg-white">
    <div class="m-auto px-5 md:px-12">
      <h2 class="text-2xl md:text-4xl font-bold md:mx-28 text-left text-gray-800 mb-12" data-aos="fade-right" data-aos-duration="1000">Galeri</h2>
      <div class="grid grid-cols-7 gap-2 md:gap-5 h-60 md:h-96 md:mx-10" data-aos="fade-up" data-aos-duration="1000">
        <div class="overflow-hidden col-span-2 row-span-2">
            <img src="{{ asset('image/pns.jpg') }}" alt="Foto Kegiatan 1"
                class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="overflow-hidden col-span-2">
            <img src="{{ asset('image/pns.jpg') }}" alt="Foto Kegiatan 2"
                class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="overflow-hidden col-span-1">
            <img src="{{ asset('image/pns.jpg') }}" alt="Foto Kegiatan 3"
                class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="overflow-hidden col-span-2 row-span-2">
            <img src="{{ asset('image/pns.jpg') }}" alt="Foto Kegiatan 4"
                class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="overflow-hidden col-span-3">
            <img src="{{ asset('image/pns.jpg') }}" alt="Foto Kegiatan 5"
                class="w-full h-full object-cover rounded-lg">
        </div>
      </div> <!-- Tutup grid -->
    </div>
    <div class="text-center mt-8 md:mt-10">
      <div class="text-center">
        <a href="#" class="bg-green-700 hover:bg-green-600 text-white  font-bold py-2 sm:py-3 px-4 sm:px-8 rounded-full inline-block text-xs md:text-base">
          Galeri Selengkapnya
        </a>
      </div>
    </div>
  </section>
  <!-- End Galeri -->
  <!-- Start Kontak -->
  <div class="px-4 lg:px-20 py-5 mx-auto bg-green-50">
    <div class="mb-6 sm:mb-10 max-w-2xl text-start">
        <h1 class="text-2xl md:text-4xl text-slate-800 font-bold text-left" data-aos="fade-right" data-aos-duration="1000">Kontak</h1>
    </div>
    @foreach ($kontakdesa as $item)
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 lg:gap-12">
        <!-- MAP -->
        <div class="w-full h-60 order-2 md:order-1 md:h-full overflow-hidden rounded-2xl dark:bg-neutral-800"  data-aos="fade-up" data-aos-duration="1000">
            {!! $item->google_maps_embed !!}
        </div>

        <!-- INFO Desa -->
        <div class="order-1 md:order-2">
          <div class="mr-72 ml-0 space-y-2 p-6 bg-white rounded-xl shadow-lg w-full mb-5 " data-aos="fade-left" data-aos-duration="1000">
            <h1 class="text-lg font-semibold mb-2">Informasi Desa</h1>
        
            <div class="flex items-start text-gray-700">
              <!-- Clock Icon -->
              <svg class="w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="w-full">{{ $item->jam_operasional }}</p>
            </div>
        
            <div class="flex items-start text-gray-700">
              <!-- Phone Icon -->
              <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75C3.5 5 5.25 4.5 6.75 5.25L9 6.75a1.5 1.5 0 010 2.625l-.75.75a11.25 11.25 0 005.625 5.625l.75-.75a1.5 1.5 0 012.625 0l1.5 2.25c.75 1.5.25 3.25-1.5 4.5-.75.5-2 .25-3.25-.5-3.5-2-6.5-5-8.5-8.5-.75-1.25-1-2.5-.5-3.25z"/>
              </svg>
              <p class="w-full">{{ $item->telepon }}</p>
            </div>
        
            <div class="flex items-start text-gray-700">
              <!-- Map Pin Icon -->
              <svg class="w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.25-7.5 11.25-7.5 11.25S4.5 17.75 4.5 10.5a7.5 7.5 0 1115 0z" />
              </svg>
              <p class="w-full">{{ $item->alamat }}</p>
            </div>
        
            <div class="flex items-start text-gray-700">
              <!-- Envelope Icon -->
              <svg class="w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75M21.75 6.75l-9.75 6.75L2.25 6.75M21.75 6.75H2.25" />
              </svg>
              <p class="w-full">{{ $item->email }}</p>
            </div>
          </div>
        
          <!-- SOSIAL MEDIA -->
          <div class="mr-72 ml-0 space-y-2 p-6 bg-white rounded-xl shadow-lg w-full"  data-aos="fade-left" data-aos-duration="1000">
            <h1 class="text-lg font-semibold mb-2">Sosial Media</h1>
            <div class="flex flex-col gap-1">
                @foreach ($sosmed as $item)
                    <a href="{{ $item->link }}" class="flex items-center gap-2 hover:text-green-500 text-blue-500">
                        <i data-lucide="{{ $item->icon }}" class="w-6 h-6"></i>
                        <span>{{ $item->username }}</span>
                    </a>
                @endforeach
            </div>
          </div>
        </div>      
      </div>
    @endforeach
  </div>
  <!-- End Kontak -->

  
  <script>
    document.getElementById('readMore').addEventListener('click', function (e) {
      e.preventDefault();
  
      const des = document.getElementById('speech-description');
      const icon = this.querySelector('.arrow-icon');
      const label = this.querySelector('span');
  
      des.classList.toggle('line-clamp-none');
      icon.classList.toggle('rotate-180');
  
      if (des.classList.contains('line-clamp-none')) {
        label.textContent = 'Lebih Sedikit';
      } else {
        label.textContent = 'Selengkapnya';
      }
    });
  </script>
  
</div> 