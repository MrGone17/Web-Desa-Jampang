<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Form Surat Tidak Punya Akta Kelahiran</h2>
            </div>
        </div>
    </section>
    <section class="bg-blue-50 py-12">
        <div>
            @if ($showSuccessModal)
                <div x-data="{ open: true }" x-show="open" x-transition.opacity.duration.300ms class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                    <div x-show="open" x-transition.scale.duration.300ms class="bg-white p-8 rounded-2xl shadow-2xl max-w-md w-full text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Pembuatan Surat Tidak Punya Akta Kelahiran Berhasil Dikirim</h2>
                        <p class="text-base sm:text-lg text-gray-600 mb-6">data akan diproses terlebih dahulu dan diharapkan mengecheck email secara berkala untuk mengetahui perkembangan proses pembuatan surat</p>
                        <button x-on:click="open = false; setTimeout(() => window.location.reload(), 300);" wire:click="$set('showSuccessModal', false)" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow transition duration-200">
                            Tutup
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <div wire:loading wire:target="save, bukti_pdf, pengantar_pdf" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
            <div class="flex flex-col items-center h-full justify-center">
                <img src="{{ asset('image/bogor.png') }}" alt="Loading..." class="h-32 w-32 animate-pulse mb-4">
                <div class="flex space-x-2">
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce"></span>
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.2s]"></span>
                    <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.4s]"></span>
                </div>
            </div>
        </div>   
        <div class="container mx-auto px-1 md:px-20">
            <div class="bg-gray-50 shadow-xl rounded-2xl p-8 md:p-12">
                <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">Lengkapi Data Anak Berikut</h3>
                <form wire:submit.prevent="save" class="space-y-4" enctype="multipart/form-data">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Masukan Nama Anak </label>
                        <input type="text" name="nama_anak" wire:model="nama_anak" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_anak" wire:model="tempat_lahir_anak" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir_anak" wire:model="tgl_lahir_anak" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                         <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select wire:model="jenis_kelamin_anak" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Kewarganegaraan</label>
                            <select wire:model="kewarganegaraan_anak" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Jika Tidak Salah Lewati --</option>
                                <option value="WNI">Warga Negara Indonesia</option>
                                <option value="WNA">Warga Negara Asing</option>
                            </select>
                        </div>
                    </div>       
                    <div>
                        <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Alamat Rumah Bersama</label>
                        <input type="text" name="alamat_keluarga" wire:model="alamat_keluarga" rows="2" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">Lengkapi Data Ayah</h3>   
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Masukan Nama Lengkap </label>
                            <input type="text" name="nama_ayah" wire:model="nama_ayah" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Masukan Nama ayah">
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Nomor Induk Keluarga</label>
                            <input type="text" name="nik_ayah" wire:model="nik_ayah" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Masukan Nomor Induk ayah">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_ayah" wire:model="tempat_lahir_ayah" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="contoh : Bogor, Semarang Dan Lainnya">
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir_ayah" wire:model="tgl_lahir_ayah" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                         <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select wire:model="jenis_kelamin_ayah" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Kewarganegaraan</label>
                            <select wire:model="kewarganegaraan_ayah" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="WNI">Warga Negara Indonesia</option>
                                <option value="WNA">Warga Negara Asing</option>
                            </select>
                        </div>
                    </div>   
                    <div>
                        <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ayah" wire:model="pekerjaan_ayah" class="w-full px-4 py-2 border capitalize text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Masukan Pekerjaan ayah">
                    </div>   
                    <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">Lengkapi Data ibu</h3>   
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Masukan Nama Lengkap </label>
                            <input type="text" name="nama_ibu" wire:model="nama_ibu" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Masukan Nama ibu">
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Nomor Induk Keluarga</label>
                            <input type="text" name="nik_ibu" wire:model="nik_ibu" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Masukan Nomor Induk ibu">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_ibu" wire:model="tempat_lahir_ibu" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="contoh : Bogor, Semarang Dan Lainnya">
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir_ibu" wire:model="tgl_lahir_ibu" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                         <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select wire:model="jenis_kelamin_ibu" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Kewarganegaraan</label>
                            <select wire:model="kewarganegaraan_ibu" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="WNI">Warga Negara Indonesia</option>
                                <option value="WNA">Warga Negara Asing</option>
                            </select>
                        </div>
                    </div>   
                    <div>
                        <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ibu" wire:model="pekerjaan_ibu" class="w-full px-4 py-2 border capitalize text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Masukan Pekerjaan ibu">
                    </div>       
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Upload Surat Pengantar Dari RT</label>
                        <div class="flex items-center space-x-4">
                            <label for="pengantar_pdf" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-xl text-sm shadow-sm hover:bg-gray-200 transition">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h5v-2H4V5h12v4h2V5a2 2 0 00-2-2H4z" />
                                    <path d="M14 12h2l-3 3-3-3h2V9h2v3z" />
                                </svg>
                                Pilih File
                            </label>
                    
                            <input id="pengantar_pdf" type="file" wire:model="pengantar_pdf" accept="application/pdf" class="hidden">
                    
                            @if ($pengantar_pdf)
                                <span class="text-sm text-gray-600 italic">{{ $pengantar_pdf->getClientOriginalName() }}</span>
                            @else
                                <span class="text-sm text-gray-600 italic">Belum ada file</span>
                            @endif
                        </div>
                    
                        <div wire:loading wire:target="pengantar_pdf" class="text-sm text-gray-500 italic mt-1">
                            Mengunggah file...
                        </div>
                    
                        @error('pengantar_pdf')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>   
                    <div class="mt-6 flex items-start p-4 bg-blue-50 border border-blue-300 rounded-xl shadow-sm">
                        <svg class="w-5 h-5 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <p class="text-sm text-blue-800 leading-relaxed">
                            <strong>Perhatian:</strong> Saat pengambilan surat, <strong>harap cek email secara berkala</strong> dan <strong>periksa folder spam/junk</strong> untuk memastikan tidak ada informasi penting yang terlewat.
                        </p>
                    </div>                                              
                    <!-- Tombol Kirim -->
                    <div class="text-center md:text-end flex justify-end gap-4">
                        <a href="{{ route('Formlayanan') }}" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-6 rounded-xl transition duration-300">Kembali</a>
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
                    Riwayat Pengajuan Surat Tidak Punya Akta Lahir
                </h2>

                @if ($suratlist->isEmpty())
                    <div class="px-6 py-4 text-gray-600">Belum ada data pengajuan.</div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead class="bg-green-50 text-gray-900 font-medium">
                                <tr>
                                    <th class="px-6 py-4">Nama</th>
                                    <th class="px-6 py-4">NIK</th>
                                    <th class="px-6 py-4">Alamat</th>
                                    <th class="px-6 py-4">Tanggal Pembuatan</th>
                                    <th class="px-6 py-4">Surat Pengantar</th>
                                    <th class="px-6 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @foreach ($suratlist as $surat)
                                    <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ optional($surat->warga)->name ?? 'Tidak ditemukan' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                            {{ optional($surat->warga)->nik ?? 'Tidak ditemukan' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                            {{ optional($surat->warga->profil)->alamat ?? 'Tidak ditemukan' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                            {{ \Carbon\Carbon::parse($surat->created_at)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($surat->pengantar_pdf)
                                                <a href="{{ Storage::url($surat->pengantar_pdf) }}" target="_blank"
                                                class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition duration-150">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H3a2 2 0 01-2-2V3a2 2 0 012-2h18a2 2 0 012 2v16a2 2 0 01-2 2z"/>
                                                    </svg>
                                                    Lihat PDF
                                                </a>
                                            @else
                                                <span class="text-gray-500 italic">Tidak ada PDF</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $status = strtolower($surat->status ?? 'tidak diketahui');
                                                $statusClasses = [
                                                    'selesai' => 'bg-green-100 text-green-800',
                                                    'diproses' => 'bg-amber-100 text-amber-800',
                                                    'ditolak' => 'bg-red-100 text-red-800',
                                                    'tidak diketahui' => 'bg-gray-100 text-gray-700',
                                                ];
                                                $statusIcons = [
                                                    'selesai' => '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>',
                                                    'diproses' => '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                                                    'ditolak' => '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>',
                                                    'tidak diketahui' => '',
                                                ];
                                                $class = $statusClasses[$status] ?? 'bg-gray-100 text-gray-700';
                                                $icon = $statusIcons[$status] ?? '';
                                            @endphp
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $class }}">
                                                {!! $icon !!}
                                                {{ ucfirst($status) }}
                                            </span>
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
