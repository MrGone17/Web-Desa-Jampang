<!-- ========== FOOTER ========== -->
<footer class="mt-auto bg-gray-900 w-full dark:bg-neutral-950">
    <div class="w-full max-w-7xl py-10 px-4 sm:px-6 lg:px-8 mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white text-[15px]">
        <!-- Logo dan Teks -->
        <div class="flex items-center gap-4">
          <img src="{{ asset('image/bogor.png') }}" alt="Bogor" class="h-12 w-12">
          <h2 class="text-2xl font-serif">SID Jampang</h2>
        </div>
        <!-- Menu -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <p class="font-semibold text-gray-100 mb-2">Menu Utama</p>
            <ul class="space-y-1">
                <li><a href="{{ route('Beranda') }}" class="hover:text-yellow-400">Beranda</a></li>
                <li><a href="{{ route('Visimisi') }}" class="hover:text-yellow-400">Visi & Misi</a></li>
                <li><a href="{{ route('Strukturdesa') }}" class="hover:text-yellow-400">Pemerintahan Desa</a></li>
                <li><a href="{{ route('Potensidesa') }}" class="hover:text-yellow-400">Potensi Desa</a></li>
            </ul>
          </div>
          <div>
            <p class="font-semibold text-gray-100 mb-2">Layanan</p>
            <ul class="space-y-1">
                <li><a href="{{ route('Administrasipenduduk') }}" class="hover:text-yellow-400">Administrasi Penduduk</a></li>
                <li><a href="{{ route('Kepengurusansurat') }}" class="hover:text-yellow-400">Kepengurusan Surat</a></li>
                <li><a href="{{ route('Bansos') }}" class="hover:text-yellow-400">Bantuan Sosial</a></li>
                <li><a href="#" class="hover:text-yellow-400">Layanan Publik</a></li>
            </ul>
          </div>
        </div>
        <!-- Informasi Desa -->
        <div>
          <p class="font-semibold text-gray-100 mb-2">Informasi Desa</p>
          <ul class="space-y-2 text-[15px] text-white">
              <li class="flex items-center gap-2">
                <!-- Jam -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>08.00 - 16.00 WIB</span>
              </li>
              <li class="flex items-center gap-2">
                <!-- Telepon -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.95.68l1.4 4.21a1 1 0 01-.21.97l-1.27 1.27a16.001 16.001 0 006.586 6.586l1.27-1.27a1 1 0 01.97-.21l4.21 1.4a1 1 0 01.68.95V19a2 2 0 01-2 2h-.75C10.607 21 3 13.393 3 4.75V4a2 2 0 012-2z" />
                </svg>
                <span>021-12345678</span>
              </li>
              <li class="flex items-center gap-2">
                <!-- Lokasi -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13 21.314 8.343 16.657A8 8 0 1117.657 16.657z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Jl. Pendidikan No. 123, Jakarta</span>
              </li>
              <li class="flex items-center gap-2">
                <!-- Email (Surat) -->
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>info@sekolahnegeri.sch.id</span>
              </li>
          </ul>

          <!-- Sosial Media -->
          <div class="flex gap-4 mt-4">
            <a href="#" class="text-white hover:text-yellow-400">
              <!-- Facebook -->
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 10-11.5 9.95v-7.05h-2.3v-2.9h2.3V9.85c0-2.3 1.37-3.6 3.47-3.6.7 0 1.44.13 1.44.13v2.3h-.81c-.8 0-1.05.5-1.05 1v1.6h2.1l-.33 2.9h-1.77V22A10 10 0 0022 12z" />
              </svg>
            </a>
            <a href="#" class="text-white hover:text-yellow-400">
              <!-- Instagram -->
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zm4.25 4.5a4.25 4.25 0 110 8.5 4.25 4.25 0 010-8.5zm0 1.5a2.75 2.75 0 100 5.5 2.75 2.75 0 000-5.5zM17 6.25a1 1 0 110 2 1 1 0 010-2z" />
              </svg>
            </a>
            <a href="#" class="text-white hover:text-yellow-400">
              <!-- YouTube -->
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21.8 8.001a2.753 2.753 0 00-1.934-1.95C18.034 5.5 12 5.5 12 5.5s-6.034 0-7.866.551A2.753 2.753 0 002.2 8.001 28.727 28.727 0 002 12a28.727 28.727 0 00.2 3.999 2.753 2.753 0 001.934 1.95C5.966 18.5 12 18.5 12 18.5s6.034 0 7.866-.551a2.753 2.753 0 001.934-1.95A28.727 28.727 0 0022 12a28.727 28.727 0 00-.2-3.999zM10 15V9l5 3-5 3z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
