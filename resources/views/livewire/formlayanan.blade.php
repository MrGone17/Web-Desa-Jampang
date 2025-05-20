<div>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Form Layanan Pembuatan Surat</h2>
            </div>
        </div>
    </section>
    <section class="py-4 bg-white">
        <div class="container mx-auto px-4">
            <div class="px-4 mb-4 flex items-center justify-center">
                <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-right" data-aos-duration="1000">
                    Pembuatan Surat Kependudukan
                </h1>
            </div> 
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Nikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('Formsuratnikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Beda Nama</h4>
                        <p class="text-sm text-gray-600 mb-4">Digunakan untuk mengonfirmasi perbedaan nama pada dokumen resmi.</p>
                    </div>
                    <a href="{{ route('Formbedanama') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Domisili</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('Formsuratdomisili') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Permohonan Kartu Keluarga</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratpermohonankk') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan KTP Dalam Proses</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratprosesktp') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Penduduk</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratketeranganpenduduk') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Permohonan Perubahan Kartu Keluarga</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratperubahankk') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Tidak Memiliki Dokumen Penduduk</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanantidakmemilikidokumen') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Kuasa Layanan Kependudukan</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanankuasa') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Pindah Kependudukan</h4>
                        <p class="text-sm text-gray-600 mb-4">Dibutuhkan untuk keperluan legalitas usaha di wilayah desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananpindahkependudukan') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
            </div>
            <div class="px-4 py-4 flex items-center justify-center">
                <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-up" data-aos-duration="1000">
                    Pembuatan Surat Layanan Catatan Sipil
                </h1>
            </div> 
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Ahli Waris</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananahliwaris') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Tidak Punya Akta Lahir</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanannoaktalahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Pembuatan Akta Kelahiran</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananpembuatanaktalahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Kelahiran</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananbuataktalahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Lahir & Mati</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananmatidanlahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Kematian</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanankematian') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Kuasa Pengasuhan Anak</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanankuasapengasuhananak') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Pengakuan Anak</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananpembuatanPengakuanAnak') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
            </div>
            <div class="px-4 py-4 flex items-center justify-center">
                <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-up" data-aos-duration="1000">
                    Pembuatan Surat Layanan Pernikahan
                </h1>
            </div> 
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganmenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Belum Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananbelummenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Numpang Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanannumpangmenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Rujuk Cerai</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananrujukcerai') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Telah Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketerangantelahmenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Wali</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganwali') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Wali Hakim</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganwalihakim') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Pengantar Nikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Form untuk mengajukan permohonan surat nikah resmi dari desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganpengantarnikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
