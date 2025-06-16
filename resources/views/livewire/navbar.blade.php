<!-- ========== HEADER ========== -->
<header id="navbar" class="sticky top-0 transition-all duration-300 ease-in-out z-50 w-full py-7 bg-gradient-to-r from-[#0F5C34] to-[#009A4B]">
    <nav class="relative max-w-7xl w-full flex flex-wrap lg:grid lg:grid-cols-12 basis-full items-center px-4 lg:px-6 mx-auto">
        <div class="md:col-span-3 items-center gap-2 flex">
            <!-- Logo dan Teks -->
            <img src="{{ asset('image/bogor.png') }}" alt="Bogor" class="h-7 w-7 lg:h-14 lg:w-14">
            <h2 class="text-base lg:text-xl font-serif text-white">SID Jampang</h2>
            <!-- End Logo dan Teks -->
        </div>      
        <div class="hidden md:flex justify-end items-center gap-1 md:order-3 col-span-2">
            @if(auth('warga')->check())
                <!-- Sudah login sebagai warga -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-md bg-yellow-400 text-white hover:bg-yellow-300 focus:outline-none">
                        Akun Saya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute right-0 mt-2 w-40 bg-[#2e8156] rounded-md shadow-lg z-50">
                        <a href="{{ route('Profil') }}"
                        class="block px-4 py-2 text-sm hover:text-yellow-400 text-white ">Profil</a>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm hover:text-yellow-400 text-white ">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Belum login -->
                <a href="{{ route('login') }}" class="hidden lg:block">
                    <button type="button"
                            class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-md bg-yellow-400 text-white hover:bg-yellow-300 focus:outline-none">
                        Login
                    </button>
                </a>
            @endif
        </div>
  

        <!-- Button Group -->
        <div class="lg:hidden flex ml-auto px-4">
            <button type="button"
                class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl text-white hover:bg-transparent focus:outline-none focus:bg-transparent disabled:opacity-50 disabled:pointer-events-none dark:text-white"
                id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail"
                aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
                
                <!-- Hamburger Icon -->
                <svg class="hs-collapse-open:hidden shrink-0 size-5" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
        
                <!-- Close Icon -->
                <svg class="hs-collapse-open:block hidden shrink-0 size-5" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
        
        <!-- End Button Group -->

        <!-- Collapse -->
        <div id="hs-navbar-hcail"
            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block lg:w-auto lg:basis-auto lg:order-2 lg:col-span-6"
            aria-labelledby="hs-navbar-hcail-collapse">
            <div class="flex flex-col items-start text-right gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-5 md:mt-0">
                <div>
                    <a class="w-full p-2 flex items-center font-serif text-white  hover:text-yellow-400 focus:outline-none text-sm"
                        href="{{ route('Beranda') }}" aria-current="page">Beranda</a>
                </div>
                <div class="hs-dropdown relative inline-flex">
                    <button type="button" class="hs-dropdown-toggle w-full p-2 flex items-center font-serif text-white  hover:text-yellow-400 focus:outline-none text-sm">
                        Profil
                    </button>
            
                    <div class="text-start hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-44 hidden z-10 mt-2 min-w-20 bg-[#2e8156] text-white pl-2 rounded-md" role="menu" aria-labelledby="hs-dropdown-unstyled">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('Visimisi') }}" class="block p-2 text-sm text-white hover:text-yellow-400">
                                Visi & Misi
                            </a>
                            <a href="{{ route('Strukturdesa') }}" class="block p-2 text-sm text-white hover:text-yellow-400">
                                Pemerintahan Desa
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hs-dropdown relative inline-flex">
                    <button type="button" class="hs-dropdown-toggle w-full p-2 flex items-center font-serif text-white  hover:text-yellow-400 focus:outline-none text-sm">
                        Layanan Desa
                    </button>
            
                    <div class="text-start hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-44 hidden z-10 mt-2 min-w-20 bg-[#2D8D5C] text-white pl-2 rounded-md" role="menu" aria-labelledby="hs-dropdown-unstyled">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('Administrasipenduduk') }}" class="block p-2 font-sans text-sm text-white ">
                                Administrasi Penduduk
                            </a>
                            <a href="{{ route('Kepengurusansurat') }}" class="block p-2 font-sans text-sm text-white ">
                                Kepengurusan Surat
                            </a>
                            <a href="{{ route('Bansos') }}" class="block p-2 font-sans text-sm text-white ">
                                Bantuan Sosial
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hs-dropdown relative inline-flex">
                    <button type="button" class="hs-dropdown-toggle w-full p-2 flex items-center font-serif text-white  hover:text-yellow-400 focus:outline-none text-sm">
                        <a href="{{ route('Potensidesa') }}">Potensi Desa</a>
                    </button>
                </div>
                <div class="hs-dropdown relative inline-flex">
                    <button type="button" class="hs-dropdown-toggle w-full p-2 flex items-center font-serif text-white  hover:text-yellow-400 focus:outline-none text-sm">
                        Media
                    </button>
            
                    <div class="text-start hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-28 hidden z-10 mt-2 min-w-20 bg-[#2D8D5C] text-white pl-2 rounded-md" role="menu" aria-labelledby="hs-dropdown-unstyled">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('Berita') }}" class="block p-2 font-sans text-sm text-white ">
                                Berita
                            </a>
                            <a href="{{ route('Fotodesa') }}" class="block p-2 font-sans text-sm text-white ">
                                Foto
                            </a>
                            <a href="{{ route('Videodesa') }}" class="block p-2 font-sans text-sm text-white ">
                                Video
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hs-dropdown relative inline-flex">
                    <button type="button" class="hs-dropdown-toggle w-full p-2 flex items-center font-serif text-white  hover:text-yellow-400 focus:outline-none text-sm">
                        Layanan Publik
                    </button>
            
                    <div class="text-start hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-44 hidden z-10 mt-2 min-w-20 bg-[#2D8D5C] text-white pl-2 rounded-md" role="menu" aria-labelledby="hs-dropdown-unstyled">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('Layananpublik') }}" class="block p-2 font-sans text-sm text-white ">
                                Laporan Publik
                            </a>
                            <a href="{{ route('Kontak') }}" class="block p-2 font-sans text-sm text-white ">
                                Kontak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('scroll', function () {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('py-3', 'shadow-md');
                    navbar.classList.remove('py-7');
                } else {
                    navbar.classList.add('py-7');
                    navbar.classList.remove('py-3', 'shadow-md');
                }
            });
        </script>        
        <!-- End Collapse -->
    </nav>
</header>
<!-- ========== END HEADER ========== -->
