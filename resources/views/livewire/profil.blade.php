<div class="overflow-hidden">
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Profil Warga</h2>
            </div>
        </div>
    </section>
    <div class="px-10 md:px-20 bg-white relative">
        <div>
            @if ($showSuccessModal)
                <div x-data="{ open: true }" x-show="open" x-transition.opacity.duration.300ms class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                    <div x-show="open" x-transition.scale.duration.300ms class="bg-white p-8 rounded-2xl shadow-2xl max-w-md w-full text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Profil Berhasil Disimpan</h2>
                        <p class="text-base sm:text-lg text-gray-600 mb-6">Anda sekarang dapat mengakses halaman <a href="{{ route('Formlayanan') }}" class="text-blue-600 underline hover:text-green-800"> Pembuatan Surat Online</a>.</p>
                        <button wire:click="$set('showSuccessModal', false)" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow transition duration-200">
                            Tutup
                        </button>
                    </div>
                </div>
            @endif
        </div>


        <div wire:loading wire:target="save, foto" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
            <div class="flex flex-col items-center h-full justify-center">
                <img src="{{ asset('image/bogor.png') }}" alt="Loading..." class="h-32 w-32 animate-pulse mb-4">
                <div class="flex space-x-2">
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce"></span>
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.2s]"></span>
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.4s]"></span>
                </div>
            </div>
        </div> 
        <section class="relative py-10">
            <div class="grid grid-cols-1 md:grid-cols-12 items-center md:gap-14">
                <!-- Form Section -->
                <div class="w-full col-span-8 px-5 mb-5 order-2 md:order-1">
                    <div class="text-left">
                        <hr class="bg-green-500 h-1 mb-5 w-20">
                        <h1 class="text-2xl sm:text-4xl font-bold text-slate-800 mb-5" data-aos="fade-right" data-aos-duration="1000">
                            Data Diri Warga
                        </h1>
                        <!-- Form Profil Warga -->
                        <form wire:submit.prevent="save" class="space-y-4" enctype="multipart/form-data">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <input type="text" wire:model="nama" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Nama lengkap warga" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nomor Induk Kependudukan</label>
                                    <input type="text" wire:model="nik" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Nama lengkap warga" readonly>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea rows="2" wire:model="alamat" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                        placeholder="Alamat lengkap warga"></textarea>
                                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                    <input type="text" wire:model="tempat_lahir" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                        placeholder="Contoh: Bogor">
                                    @error('tempat_lahir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" wire:model="tanggal_lahir" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                    @error('tanggal_lahir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                             <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                    <select wire:model="jenis_kelamin" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        <option value="">-- Pilih --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Agama</label>
                                    <select wire:model="agama" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        <option value="">-- Pilih --</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                    </select>
                                    @error('agama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                    <input type="text" wire:model="pekerjaan" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Pekerjaan Warga" >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">kewarganegaraan</label>
                                    <select wire:model="kewarganegaraan" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        <option value="">-- Pilih --</option>
                                        <option value="WNI">Warga Negara Indonesia</option>
                                        <option value="WNA">Warga Negara Asing</option>
                                    </select>
                                    @error('kewarganegaraan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="text" wire:model="telepon" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                    placeholder="08xxxxxxxxxx">
                                @error('telepon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow">
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="w-full h-[300px] md:h-[450px] col-span-4 rounded-3xl overflow-hidden order-1 md:order-2 relative flex flex-col items-center justify-center bg-gradient-to-br from-white to-gray-100 shadow-lg border border-gray-200"
                    data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-center space-y-4">
                        <div class="relative">
                            @if ($foto)
                                {{-- Saat upload baru --}}
                                <img src="{{ $foto->temporaryUrl() }}" class="w-40 h-40 rounded-full object-cover mx-auto shadow-md ring-4 ring-green-500/30">
                            @elseif ($foto_path)
                                {{-- Saat data lama dari DB --}}
                                <img src="{{ asset('storage/' . $foto_path) }}" class="w-40 h-40 rounded-full object-cover mx-auto shadow-md ring-4 ring-green-500/30">
                            @else
                                {{-- Default fallback --}}
                                <div class="w-40 h-40 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-gray-600 text-sm shadow-inner ring-1 ring-gray-400/30">
                                    <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 7h4l2-3h6l2 3h4v13H3V7z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 11a3 3 0 100 6 3 3 0 000-6z"/>
                                    </svg>
                                </div>
                            @endif


                            @if ($foto)
                                <div class="absolute inset-0 flex items-center justify-center bg-black/30 rounded-full opacity-0 hover:opacity-100 transition duration-300">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2-3h6l2 3h4v13H3V7z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11a3 3 0 100 6 3 3 0 000-6z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div>
                            <input type="file" wire:model="foto" id="foto" class="hidden">
                            <label for="foto" class="cursor-pointer bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full shadow transition">
                                Pilih Foto
                            </label>
                        </div>

                        @error('foto') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
