<div class="overflow-hidden">
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Administrasi Penduduk</h2>
            </div>
        </div>
    </section>
    <!-- start Pendahuluan -->
    <div class="px-10 md:px-20 bg-white">
        <section class="relative py-10">
            @foreach ($pendahuluan as $item)
                <div class="grid grid-cols-1 md:grid-cols-12 items-center md:gap-14">
                    <!-- Text Section -->
                    <div class="w-full col-span-8 text-center px-5 mb-5 order-2 md:order-1"
                        data-aos="fade-right" data-aos-duration="1000">
                        <div class="text-center md:text-left">
                            <hr class="bg-green-500 h-1 mb-5 m-auto md:ml-0 w-20">
                            <h1 class="text-2xl sm:text-4xl font-bold text-slate-800 mb-5">
                            {{ $item->title }}
                            </h1>
                            <div class="whitespace-pre-line text-sm md:text-xl text-center md:text-left text-gray-700 line-clamp-[15] [&_ol]:list-decimal [&_ol]:pl-10 [&_ul]:pl-10 [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5 break-words"
                                id="pendahuluan-description">
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
                    <div class="w-full h-[300px] md:h-[450px] col-span-4 rounded-3xl overflow-hidden order-1 md:order-2 relative flex flex-col my-3 md:my-5 justify-center bg-blue-400"
                        data-aos="fade-left" data-aos-duration="1000">
                        <img alt="{{ $item->title }}" class="object-cover w-full h-full" src="{{ asset('storage/' . $item->image) }}" />
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
    <!-- End Pendahuluan -->
    <!--Start Layanan-->
    <div class="px-10 md:px-20 bg-green-100">
        <section data-hs-carousel='{"isDraggable": true,"isAutoPlay": true,"isInfiniteLoop": true,"loadingClasses": "opacity-0","dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500","slidesQty": {"xs": 1,"sm": 2,"lg": 3}}'class="relative"> 
            <div class="container mx-auto py-5 ">
                <div class="px-4 py-2 flex items-center justify-center mb-4">
                    <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg">
                        Layanan Yang Tersedia
                    </h1>
                </div>   
                <div class="hs-carousel overflow-hidden m-auto w-full md:w-11/12 h-[400px] ">
                    <div class="relative min-h-72 h-full">
                        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 cursor-grab hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing transition-transform duration-700">
                            <!-- Card Layanan -->
                            @foreach($layanan as $item)
                                <div class="hs-carousel-slide flex justify-center">
                                    <div class="bg-white relative rounded-lg overflow-hidden md:mx-5 h-[490px] md:h-[380px] shadow-lg flex w-full flex-col">
                                        <div class="w-20 h-20 bg-green-500 rounded-full mx-auto mt-6 shadow-md flex items-center justify-center">
                                            <i data-lucide="{{ $item->icon }}" class="text-white w-10 h-10"></i>
                                        </div>    
                                        <div class="px-3 news-card">
                                            <h2 class="text-center text-base md:text-2xl font-bold text-gray-800 mt-2">
                                                {{ $item->title }}
                                            </h2>
                                            <hr class="bg-green-500 h-1 mt-6 mb-4 mx-auto w-20">
                                            <p class="text-gray-600 mt-2 text-sm text-center">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
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
    </div>
    <!--End Layanan-->
    <!-- start Syarat -->
    <div class="px-10 md:px-20 bg-white">
        <section class="relative py-10">
            @foreach ($syarat as $item)
            <div class="grid grid-cols-1 md:grid-cols-12 items-center md:gap-14">
                <!-- Text Section -->
                <div class="w-full col-span-8 text-center px-5 mb-5 order-2 md:order-1"
                    data-aos="fade-right" data-aos-duration="1000">
                    <div class="text-center md:text-left">
                        <hr class="bg-green-500 h-1 mb-5 m-auto md:ml-0 w-20">
                        <h1 class="text-2xl sm:text-4xl font-bold text-slate-800 mb-5">
                        {{ $item->title }}
                        </h1>
                        <div class="whitespace-pre-line text-sm md:text-xl text-left text-gray-700 line-clamp-[15] [&_ol]:list-decimal [&_ol]:pl-10 [&_ul]:pl-10 [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5 break-words"
                            id="syarat-description">
                            {{ $item->description }}  
                        </div>
                        <a href="#" id="readMoreSyarat"
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
                <div class="w-full h-[300px] md:h-[450px] col-span-4 rounded-3xl overflow-hidden order-1 md:order-2 relative flex flex-col my-3 md:my-5 justify-center bg-blue-400"
                    data-aos="fade-left" data-aos-duration="1000">
                    <img alt="{{ $item->title }}" class="object-cover w-full h-full" src="{{ asset('storage/' . $item->image) }}" />
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
    <!-- End Syarat -->
    <script>
        document.getElementById('readMore').addEventListener('click', function (e) {
          e.preventDefault();
      
          const des = document.getElementById('pendahuluan-description');
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
        document.getElementById('readMoreSyarat').addEventListener('click', function (e) {
          e.preventDefault();
      
          const des = document.getElementById('syarat-description');
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
