<div class="overflow-hidden">
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Layanan Publik</h2>
            </div>
        </div>
    </section>

    <div class="px-10 md:px-20 bg-white relative">
        <div wire:loading wire:target="submit, bukti_foto" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
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
                            Form Layanan Publik
                        </h1>
                        <form wire:submit.prevent="submit" wire:key="{{ $formKey }}" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" wire:model="nama" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                                <input type="text" wire:model="nomor_wa" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                @error('nomor_wa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" wire:model="alamat" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Kejadian</label>
                                <input type="date" wire:model="tanggal_kejadian" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                @error('tanggal_kejadian') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Keterangan Laporan</label>
                                <textarea wire:model="keterangan" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
                                @error('keterangan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bukti Foto</label>
                            
                                <div class="flex items-center justify-center w-full">
                                    <label for="bukti_foto" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all border-gray-300 overflow-hidden">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            @if ($bukti_foto)
                                                <img src="{{ $bukti_foto->temporaryUrl() }}" class="w-48 h-48 object-cover rounded-lg" alt="Preview Foto">
                                            @else
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 16l-4-4m0 0l4-4m-4 4h18m-5 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5" />
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                                                <p class="text-xs text-gray-500">PNG, JPG, JPEG (max. 2MB)</p>
                                            @endif
                                        </div>
                                        <input id="bukti_foto" type="file" class="hidden" wire:model="bukti_foto" accept="image/*">
                                    </label>
                                </div>
                            
                                @error('bukti_foto') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                                @enderror
                            </div>                            
                            <div>
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                                    Kirim Laporan
                                </button>
                            </div>

                            @if (session()->has('message'))
                                <div class="text-green-600 mt-4">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Static Image Section -->
                <div class="w-full h-[300px] md:h-[450px] col-span-4 rounded-3xl overflow-hidden order-1 md:order-2 relative flex flex-col my-3 md:my-5 justify-center bg-blue-400"
                    data-aos="fade-left" data-aos-duration="1000">
                    <img alt="Layanan Publik" class="object-cover w-full h-full" src="{{ asset('image/17.png') }}" />
                </div>
            </div>
        </section>
    </div>
</div>
