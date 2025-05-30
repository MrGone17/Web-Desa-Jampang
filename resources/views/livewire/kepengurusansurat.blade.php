<div class="overflow-hidden">
  <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
      <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
      <div class="relative container mx-auto px-6 md:px-20 py-16">
          <div class="text-center md:text-start text-white">
              <h2 class="text-3xl md:text-5xl font-bold">Kepengurusan Surat</h2>
          </div>
      </div>
  </section>
  <!-- start Kepengurusan Surat -->
  <div class="px-10 md:px-20 bg-white">  
    <section class="relative py-10">
        @foreach ($pendahuluan as $item)
            <div class="grid grid-cols-1 md:grid-cols-12 items-center md:gap-14">
                
                <!-- Static Image Section (gambar di kiri) -->
                <div class="w-full h-[300px] md:h-[450px] col-span-4 rounded-3xl overflow-hidden order-1 md:order-1 relative flex flex-col my-3 md:my-5 justify-center bg-blue-400"
                    data-aos="fade-right" data-aos-duration="1000">
                    <img alt="Kepengurusan_Surat" class="object-cover w-full h-full" src="{{ asset('storage/' . $item->image) }}" />
                </div>

                <!-- Text Section (deskripsi di kanan) -->
                <div class="w-full col-span-8 text-center px-5 mb-5 order-2 md:order-2"
                    data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-center md:text-left">
                        <hr class="bg-green-500 h-1 mb-5 m-auto md:ml-0 w-20">
                        <h1 class="text-2xl sm:text-4xl font-bold text-slate-800 mb-5">
                            {{ $item->title }}
                        </h1>
                        <div class="whitespace-pre-line text-sm md:text-xl text-center md:text-left text-gray-700 line-clamp-[15] [&_ol]:list-decimal [&_ol]:pl-10 [&_ul]:pl-10 [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5 break-words"
                            id="surat-description">
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
            </div>
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
  <!-- End Kepengurusan Surat -->
  <!--Start Pengajuan Surat-->
  <div class="px-10 md:px-20 bg-green-50">
      <section data-hs-carousel='{"isDraggable": true,"isAutoPlay": false,"isInfiniteLoop": false,"loadingClasses": "opacity-0","slidesQty": {"xs": 1}}' class="relative"> 
        <div class="container mx-auto py-5">
          <h1 class="text-2xl md:text-4xl px-5 md:ml-10 text-slate-800 font-bold text-left mb-3 md:mb-6 mt-5" data-aos="fade-right" data-aos-duration="1000">
            Persyaratan Pengajuan Surat
          </h1>
          <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
            "isAutoPlay": true,
            "autoPlayInterval": 5000,
            "isInfiniteLoop": true,
            "slidesQty": 1}' >
            <div class="relative min-h-72">
              <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 cursor-grab hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing transition-transform duration-700">
                @foreach ($pengajuan as $index => $item)
                  <div class="hs-carousel-slide flex justify-center items-center px-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $index * 300 }}">
                    <div class="relative bg-white p-8 rounded-lg shadow-lg w-full max-w-xl">
                      <div class="absolute -top-7 left-6 sm:left-1/2 sm:transform sm:-translate-x-1/2 bg-green-700 rounded-xl inline-flex items-center justify-center px-4 py-2 shadow-lg">
                        <h3 class="text-white text-center  text-base md:text-xl font-bold">{{ $item->title }}</h3>
                      </div>
                      <div class="mt-4 text-left text-gray-700 break-words whitespace-pre-line">
                        {{ $item->description }}
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>            
            </div>
          </div>
    
          <!-- Optional: navigasi panah -->
          <div class="hidden md:block">
            <div class="absolute inset-y-0 start-0 inline-flex justify-center items-center w-auto h-full">
              <button type="button" class="bg-green-700 hover:bg-green-600 rounded-full w-10 h-10 hs-carousel-prev text-white">
                <svg class="shrink-0 size-6 m-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
            </div>
            <div class="absolute inset-y-0 end-0 inline-flex justify-center items-center w-auto h-full">
              <button type="button" class="bg-green-700 hover:bg-green-600 rounded-full w-10 h-10 hs-carousel-next text-white">
                <svg class="shrink-0 size-6 m-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </section>
    </div>      
  <!--End Pengajuan SUrat-->
  <section class="relative bg-green-700 py-10">
    <div class="text-center">
      <h2 class="text-white w-3/5 m-auto font-bold text-xl md:text-2xl mb-6">
        Buat Surat Online Dapat Melalui Tombol Di Bawah Ini!
      </h2>
      @guest
        <div class="w-11/12 md:w-3/5 m-auto mb-6">
          <div class="bg-yellow-50 border border-yellow-400 text-yellow-800 px-6 py-4 rounded-xl shadow-md flex items-start gap-3">
            <svg class="w-6 h-6 text-yellow-500 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
            </svg>
            <div>
              <p class="font-semibold text-lg">Peringatan</p>
              <p class="text-sm">Jika Anda belum memiliki akun, Anda akan diarahkan ke halaman login sebelum dapat membuat surat.</p>
            </div>
          </div>
        </div>
      @endguest
      <a href="{{ route('Formlayanan') }}"
        class="inline-block px-16 py-4 bg-white text-green-700 font-bold text-2xl md:text-lg rounded-xl hover:bg-green-200 transition-all duration-300">
        BUAT SEKARANG!
      </a>
    </div>
  </section>

  <script>
      document.getElementById('readMore').addEventListener('click', function (e) {
        e.preventDefault();
    
        const des = document.getElementById('surat-description');
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
