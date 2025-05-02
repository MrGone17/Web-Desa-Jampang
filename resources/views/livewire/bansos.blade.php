<div class="overflow-hidden">  
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Bantuan Sosial</h2>
            </div>
        </div>
    </section>
    <div class="px-10 md:px-20 bg-white">
        <section data-hs-carousel='{"isDraggable": true,"isAutoPlay": true,"isInfiniteLoop": true,"loadingClasses": "opacity-0","dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500","slidesQty": {"xs": 1,"sm": 2,"lg": 3}}'class="relative"> 
          <div class="container mx-auto py-5 ">
            <div class="px-4 py-2 flex items-center justify-center mb-4">
                <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg">
                    Bantuan Sosial Desa Jampang
                </h1>
            </div>
            <div class="hs-carousel overflow-hidden m-auto w-full md:w-11/12 h-[525px] ">
              <div class="relative min-h-72 h-full">
                <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 cursor-grab hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing transition-transform duration-700">
                  <!-- Card Berita -->
                  @foreach ($infobansos as $index => $item )
                    @if ($item->is_active)
                      <div class="hs-carousel-slide flex justify-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $index * 500 }}">
                        <div class="bg-white relative rounded-lg overflow-hidden md:mx-5 h-[590px] md:h-[500px] shadow-lg flex w-full flex-col">
                          <img alt="{{ $item->title }}" class="w-full h-[220px] object-cover" src="{{ asset('storage/' . $item->image) }}" loading="lazy" width="325" height="544" />
                          <div class="py-6 px-3 news-card">
                            <h2 class="text-center text-lg font-bold text-gray-800 mt-2 news-title line-clamp-3"> {{ $item->title }}</h2>
                            <p class="text-gray-600 mt-2 text-base news-description line-clamp-6 text-center">
                              {{ strip_tags($item->description) }}
                            </p>
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
    </div>
    <section class="bg-green-50 py-5 md:py-20">
        <div class="container mx-auto p-8 md:px-44">
            <div class="flex flex-col space-y-20 md:space-y-40">
                @foreach ($kriteriabansos as $item)
                <div class="relative bg-white p-6 rounded-lg shadow-lg w-[300px] md:w-full mx-auto" data-aos="fade-up" data-aos-duration="800">
                    <div class="absolute sm:-top-14 -top-7 sm:left-1/2 -left-6 sm:transform sm:-translate-x-1/2 w-auto h-auto bg-blue-950 rounded-xl inline-flex items-center justify-center px-4 py-2 shadow-lg">
                        <h3 class="text-white text-[16px] md:text-[24px] font-bold">{{ $item->title }}</h3>
                    </div>                                      
                    <div class="mt-4 md:mt-6 flex justify-center items-center text-center">
                        <div class="text-left text-gray-700 break-words [&_ol]:list-decimal [&_ul]:list-disc [&_ol_ul]:pl-5 [&_ol_ol]:pl-5">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
