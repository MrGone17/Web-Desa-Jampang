<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Form Permohonan Kartu Keluarga</h2>
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
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Pembuatan Surat Permohonan Kartu Keluarga Berhasil Dikirim</h2>
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
                <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">Lengkapi Data Berikut</h3>
                <form wire:submit.prevent="save" class="space-y-4" enctype="multipart/form-data">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Masukan Nama Lengkap </label>
                        <input type="text" name="nama_lengkap" wire:model="nama_lengkap" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Nomor Induk Keluarga</label>
                            <input type="text" name="nik" wire:model="nik" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Nomor Kartu Keluarga</label>
                            <input type="text" name="no_kk" wire:model="no_kk" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukan Nomor KK">
                            @error('no_kk') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" wire:model="tempat_lahir" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" wire:model="tgl_lahir" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                         <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select wire:model="jenis_kelamin" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Agama</label>
                            <select wire:model="agama" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Pekerjaan</label>
                            <input type="text" name="pekerjaan" wire:model="pekerjaan" class="w-full px-4 py-2 border capitalize text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                        </div>
                        <div>
                            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Kewarganegaraan</label>
                            <select wire:model="kewarganegaraan" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>
                                <option value="">-- Jika Tidak Salah Lewati --</option>
                                <option value="WNI">Warga Negara Indonesia</option>
                                <option value="WNA">Warga Negara Asing</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-1 text-xs md:text-sm font-medium text-gray-700">Alamat Rumah</label>
                        <input type="text" name="alamat" wire:model="alamat" rows="2" class="w-full px-4 py-2 border text-xs md:text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
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
                    <!-- Tombol Kirim -->
                    <div class="flex justify-end gap-3 text-center">
                        <a href="{{ route('Formlayanan') }}" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 md:py-2 md:px-5 rounded-xl transition duration-300 text-sm md:text-base">
                            Kembali
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-1 px-3 md:py-2 md:px-5 rounded-xl transition duration-300 text-sm md:text-base">
                            Kirim Formulir
                        </button>
                    </div>
                    @if (session()->has('message'))
                        <div class="text-green-600 mt-4">
                            {{ session('message') }}
                        </div>
                    @endif
                </form>
            </div>
            <div class="mt-10 bg-white shadow-xl rounded-xl overflow-hidden border border-gray-200">
                <h2 class="text-lg md:text-xl font-bold text-white px-4 md:px-6 py-3 md:py-4 bg-gradient-to-r from-[#0F5C34] to-[#009A4B]">
                    Riwayat Pengajuan Surat Permohonan Kartu Keluarga
                </h2>

                @if ($suratlist->isEmpty())
                    <div class="px-4 py-3 text-sm text-gray-600">Belum ada data pengajuan.</div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-xs md:text-sm text-left text-gray-700">
                            <thead class="bg-green-50 text-gray-900 font-medium">
                                <tr>
                                    <th class="px-3 md:px-6 py-2 md:py-4">Nama</th>
                                    <th class="px-3 md:px-6 py-2 md:py-4">NIK</th>
                                    <th class="px-3 md:px-6 py-2 md:py-4">Alamat</th>
                                    <th class="px-3 md:px-6 py-2 md:py-4">Tanggal Pembuatan</th>
                                    <th class="px-3 md:px-6 py-2 md:py-4">Surat Pengantar</th>
                                    <th class="px-3 md:px-6 py-2 md:py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @foreach ($suratlist as $surat)
                                    <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                        <td class="px-3 md:px-6 py-2 md:py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ optional($surat->warga)->name ?? 'Tidak ditemukan' }}
                                        </td>
                                        <td class="px-3 md:px-6 py-2 md:py-4 whitespace-nowrap text-gray-600">
                                            {{ optional($surat->warga)->nik ?? 'Tidak ditemukan' }}
                                        </td>
                                        <td class="px-3 md:px-6 py-2 md:py-4 whitespace-nowrap text-gray-600">
                                            {{ optional($surat->warga->profil)->alamat ?? 'Tidak ditemukan' }}
                                        </td>
                                        <td class="px-3 md:px-6 py-2 md:py-4 whitespace-nowrap text-gray-600">
                                            {{ \Carbon\Carbon::parse($surat->created_at)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="px-3 md:px-6 py-2 md:py-4 whitespace-nowrap">
                                            @if ($surat->pengantar_pdf)
                                                <a href="{{ Storage::url($surat->pengantar_pdf) }}" target="_blank"
                                                class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition duration-150 text-xs md:text-sm">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H3a2 2 0 01-2-2V3a2 2 0 012-2h18a2 2 0 012 2v16a2 2 0 01-2 2z"/>
                                                    </svg>
                                                    Lihat PDF
                                                </a>
                                            @else
                                                <span class="text-gray-500 italic text-xs md:text-sm">Tidak ada PDF</span>
                                            @endif
                                        </td>
                                        <td class="px-3 md:px-6 py-2 md:py-4">
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
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] md:text-xs font-semibold {{ $class }}">
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
