<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Form Pembuatan Surat Nikah</h2>
            </div>
        </div>
    </section>
    <section class="bg-blue-50 py-12">
        <div wire:loading wire:target="submit, kk_pdf, kk_foto" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
            <div class="flex flex-col items-center h-full justify-center">
                <img src="{{ asset('image/bogor.png') }}" alt="Loading..." class="h-32 w-32 animate-pulse mb-4">
                <div class="flex space-x-2">
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce"></span>
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.2s]"></span>
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.4s]"></span>
                </div>
            </div>
        </div>   
        <div class="container mx-auto px-6 md:px-20">
            <div class="bg-gray-50 shadow-xl rounded-2xl p-8 md:p-12">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Lengkapi Data Berikut</h3>
                <form wire:submit.prevent="submit" wire:key="{{ $formKey }}" enctype="multipart/form-data" class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" wire:model="nama_lengkap" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama lengkap" readonly>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" wire:model="nik" name="nik" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan NIK" readonly>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" wire:model="tgl_lahir" name="tgl_lahir" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" wire:model="alamat" rows="2" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan alamat lengkap" readonly></textarea>
                    </div>

                    <!-- Nama Pasangan -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Nama Pasangan</label>
                        <input type="text" wire:model="nama_pasangan" name="nama_pasangan" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama pasangan" required>
                    </div>

                    <!-- Tanggal Pernikahan -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Tanggal Pernikahan</label>
                        <input type="date" wire:model="tgl_nikah" name="tgl_nikah" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <!-- Tambahan Upload foto-->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Upload Foto Kartu Keluarga (JPG/PNG)
                        </label>
                    
                        <div class="flex items-center space-x-4">
                            <label for="kk_foto" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-xl text-sm shadow-sm hover:bg-gray-200 transition">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h5v-2H4V5h12v4h2V5a2 2 0 00-2-2H4z" />
                                    <path d="M14 12h2l-3 3-3-3h2V9h2v3z" />
                                </svg>
                                Pilih Foto
                            </label>
                            <input id="kk_foto" type="file" wire:model="kk_foto" accept="image/*" class="hidden">
                    
                            @if ($kk_foto)
                                <span class="text-sm text-gray-600 italic">{{ $kk_foto->getClientOriginalName() }}</span>
                            @else
                                <span class="text-sm text-gray-600 italic">Belum ada file</span>
                            @endif
                        </div>
                    
                        <div wire:loading wire:target="kk_foto" class="text-sm text-gray-500 italic mt-1">
                            Mengunggah foto...
                        </div>
                    
                        @error('kk_foto')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    
                        @if ($kk_foto)
                        @php
                            $ext = strtolower($kk_foto->getClientOriginalExtension());
                            $isImage = in_array($ext, ['jpg', 'jpeg', 'png']);
                        @endphp
                    
                        @if ($isImage)
                            <div class="mt-4">
                                <p class="text-sm text-gray-600">Preview:</p>
                                <img src="{{ $kk_foto->temporaryUrl() }}" class="rounded-md shadow max-w-xs mt-1">
                            </div>
                        @else
                            <div class="text-red-500 text-sm mt-2">
                                File tidak valid. Hanya gambar (JPG/PNG) yang diperbolehkan.
                            </div>
                        @endif
                    @endif                    
                    </div>   
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Upload Dokumen PDF (Contoh: Kartu Keluarga)
                        </label>
                    
                        <div class="flex items-center space-x-4">
                            <label for="kk_pdf" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-xl text-sm shadow-sm hover:bg-gray-200 transition">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h5v-2H4V5h12v4h2V5a2 2 0 00-2-2H4z" />
                                    <path d="M14 12h2l-3 3-3-3h2V9h2v3z" />
                                </svg>
                                Pilih File
                            </label>
                    
                            <input id="kk_pdf" type="file" wire:model="kk_pdf" accept="application/pdf" class="hidden">
                    
                            @if ($kk_pdf)
                                <span class="text-sm text-gray-600 italic">{{ $kk_pdf->getClientOriginalName() }}</span>
                            @else
                                <span class="text-sm text-gray-600 italic">Belum ada file</span>
                            @endif
                        </div>
                    
                        <div wire:loading wire:target="kk_pdf" class="text-sm text-gray-500 italic mt-1">
                            Mengunggah file...
                        </div>
                    
                        @error('kk_pdf')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>                                                                                      
                    <!-- Tombol Kirim -->
                    <div class="text-center md:text-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-xl transition duration-300">Kirim Formulir</button>
                    </div>
                    @if (session()->has('message'))
                        <div class="text-green-600 mt-4">
                            {{ session('message') }}
                        </div>
                    @endif
                </form>
            </div>
            <div class="mt-10 bg-white shadow-xl rounded-xl overflow-hidden border border-gray-200">
                <h2 class="text-xl font-bold text-white px-6 py-4 bg-gradient-to-r from-[#0F5C34] to-[#009A4B]">
                    Riwayat Pengajuan Surat Nikah
                </h2>

                @if ($suratNikahList->isEmpty())
                    <div class="px-6 py-4 text-gray-600">Belum ada data pengajuan.</div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead class="bg-green-100 text-gray-900">
                                <tr>
                                    <th class="px-6 py-3 font-semibold">Nama</th>
                                    <th class="px-6 py-3 font-semibold">NIK</th>
                                    <th class="px-6 py-3 font-semibold">Tanggal Nikah</th>
                                    <th class="px-6 py-3 font-semibold">Alamat</th>
                                    <th class="px-6 py-3 font-semibold">PDF</th>
                                    <th class="px-6 py-3 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @foreach ($suratNikahList as $surat)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $surat->warga->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $surat->warga->nik }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($surat->tgl_nikah)->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $surat->warga->profil->alamat }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ Storage::url($surat->kk_pdf) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800 font-medium underline">
                                                Lihat PDF
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($surat->status === 'diproses')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                                    Diproses
                                                </span>
                                            @elseif ($surat->status === 'selesai')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                    Selesai
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                                                    {{ ucfirst($surat->status) }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
