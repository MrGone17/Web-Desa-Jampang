<div class="overflow-hidden">
    <!-- About Section -->
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');" >
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-3xl md:text-5xl font-bold">Visi dan Misi</h2>
            </div>
        </div>
    </section>
    <!-- start About Us -->
    <div class="px-10 md:px-20 bg-white">
        <section class="relative py-10">
            @foreach ($tentangdesa as $item)
                @if ($item->is_active)
                    <div class="grid grid-cols-1 md:grid-cols-12 items-center md:gap-14">
                        <!-- Text Section -->
                        <div class="w-full col-span-8 text-center px-5 mb-5 order-2 md:order-1" data-aos="fade-right" data-aos-duration="1000">
                            <div class="text-center md:text-left">
                                <hr class="bg-green-500 h-1 mb-5 m-auto md:ml-0 w-20">
                                <h1 class="text-2xl sm:text-4xl font-bold text-slate-800 mb-5">
                                    {{ $item->title }}
                                </h1>
                                <div class="whitespace-pre-line text-sm md:text-xl text-center md:text-left text-gray-700 line-clamp-[15] [&_ol]:list-decimal [&_ol]:pl-10 [&_ul]:pl-10 [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5 break-words"
                                    id="about-description">
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
                            <img alt="Tentang Desa" class="object-cover w-full h-full" src="{{ asset('storage/' . $item->image) }}" />
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
    <!-- End About Us -->

    <!-- Vision and Mission Section -->
    <section class="bg-green-50 py-5 md:py-20">
        <div class="container mx-auto p-8 md:px-44">
            @foreach ($visimisi as $item)
                <div class="flex flex-col space-y-20 md:space-y-40">
                    <!-- Visi Card -->
                    <div class="relative bg-white p-10 rounded-lg shadow-lg w-[300px] md:w-full mx-auto" data-aos="fade-up" data-aos-duration="800">
                        <div
                            class="absolute sm:-top-14 -top-7 sm:left-1/2 -left-6 sm:transform sm:-translate-x-1/2 w-[60px] h-[60px] md:w-[150px] md:h-[150px] bg-blue-950 rounded-full flex items-center justify-center shadow-lg">
                            <h3 class="text-white text-[16px] md:text-[36px] font-bold">{{ $item->visi_title}}</h3>
                        </div>
                        <div class="mt-4 md:mt-20 flex justify-center items-center text-center">
                            <div class="text-left text-gray-700 break-words [&_ol]:list-decimal [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5">
                                <p>
                                    {!! $item->visi_desc !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Misi Card -->
                    <div class="relative bg-white p-10 rounded-lg shadow-lg w-[300px] md:w-full mx-auto" data-aos="fade-up" data-aos-duration="800">
                        <div
                            class="absolute sm:-top-14 -top-7 sm:left-1/2 -left-6 sm:transform sm:-translate-x-1/2 w-[60px] h-[60px] md:w-[150px] md:h-[150px] bg-blue-950 rounded-full flex items-center justify-center shadow-lg">
                            <h3 class="text-white text-[16px] md:text-[36px] font-bold">{{ $item->misi_title }}</h3>
                        </div>
                        <div class="mt-4 md:mt-20 flex justify-center items-center text-center">
                            <div class="text-left text-gray-700 break-words [&_ol]:list-decimal [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5">
                                {!! $item->misi_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Prinsip Pemerintahan Start -->
    <section class="bg-white py-20">
        @foreach ($prinsip as $item)
            <div class="container mx-auto px-8 lg:grid lg:grid-cols-2 lg:gap-16">
                <!-- Judul (Mobile) -->
                <div class="lg:hidden text-center" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-lg font-bold">{{ $item->title }}</h2>
                    <hr class="bg-green-500 h-1 mt-2 mx-auto w-full mb-6">
                </div>

                <!-- Gambar -->
                <div class="relative lg:col-span-1 flex justify-center" data-aos="fade-right" data-aos-duration="1000">
                    <div class="w-full h-full md:w-[500px] lg:h-auto">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                            class="relative z-10 w-[170px] h-[170px] md:w-[500px] md:h-[500px] rounded-xl object-cover mx-auto">
                    </div>
                </div>

                <!-- Konten Prinsip pemerintahan -->
                <div class="lg:col-span-1" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="hidden lg:block text-4xl font-bold text-center mt-16 md:mt-0 ">{{ $item->title }}</h2>
                    <hr class="bg-green-500 h-1 mt-4 mx-auto w-full mb-8 hidden lg:block ">
                    <div class="text-sm mt-2 md:text-xl break-words [&_ol]:list-decimal [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5">
                        {!! $item->description !!}
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- Prinsip Pemerintahan End -->

    <script>
        document.getElementById('readMore').addEventListener('click', function (e) {
          e.preventDefault();
      
          const des = document.getElementById('about-description');
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
