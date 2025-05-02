<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Kontak Desa</h2>
            </div>
        </div>
    </section>
    <div class="px-4 lg:px-20 py-5 mx-auto bg-white">
        <div class="px-4 py-2 flex items-center justify-center mb-6">
            <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-right" data-aos-duration="1000">
                Kontak Layanan Desa
            </h1>
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
</div>
