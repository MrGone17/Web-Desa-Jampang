<div class="overflow-hidden">
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
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Beda Nama</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk konfirmasi perbedaan nama pada dokumen resmi.</p>
                    </div>
                    <a href="{{ route('Formbedanama') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Domisili</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk legalitas domisili di wilayah desa.</p>
                    </div>
                    <a href="{{ route('Formsuratdomisili') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Permohonan Kartu Keluarga</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pengajuan pembuatan Kartu Keluarga baru.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratpermohonankk') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan KTP Dalam Proses</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk bukti KTP sedang dalam proses pembuatan.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratprosesktp') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Penduduk</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan status penduduk di desa.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratketeranganpenduduk') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Permohonan Perubahan Kartu Keluarga</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk perubahan data pada Kartu Keluarga.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanansuratperubahankk') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Tidak Memiliki Dokumen Penduduk</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan tidak memiliki dokumen kependudukan.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanantidakmemilikidokumen') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Kuasa Layanan Kependudukan</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pemberian kuasa pengurusan dokumen kependudukan.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanankuasa') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Pindah Kependudukan</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pengajuan pindah domisili penduduk.</p>
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
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan ahli waris resmi.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananahliwaris') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Tidak Punya Akta Lahir</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan tidak memiliki akta kelahiran.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanannoaktalahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Pembuatan Akta Kelahiran</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pengajuan pembuatan akta kelahiran.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananpembuatanaktalahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Kelahiran</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan kelahiran resmi.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananbuataktalahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Lahir & Mati</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan kelahiran dan kematian.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananmatidanlahir') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Kematian</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan kematian resmi.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanankematian') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Kuasa Pengasuhan Anak</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pemberian kuasa pengasuhan anak.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanankuasapengasuhananak') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Pengakuan Anak</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pengakuan anak secara resmi.</p>
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
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan status pernikahan.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganmenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Belum Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan status belum menikah.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananbelummenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Numpang Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk izin menikah di luar domisili.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanannumpangmenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Rujuk Cerai</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan rujuk setelah cerai.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananrujukcerai') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Telah Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan telah menikah secara resmi.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketerangantelahmenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Wali</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan wali nikah.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganwali') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Wali Hakim</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan wali hakim dalam pernikahan.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganwalihakim') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Pengantar Nikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pengantar pernikahan resmi.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganpengantarnikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Permohonan Cerai</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pengajuan permohonan cerai.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganpermohonancerai') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Permohonan Duplikasi Surat Nikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk pengajuan duplikat surat nikah.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganduplikatsuratnikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Janda Duda</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan status janda atau duda.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganketjandaduda') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Lajang</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan status lajang.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganketlajang') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Pernah Menikah</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan pernah menikah.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganketpernahmenikah') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
            </div>
            <div class="px-4 py-4 flex items-center justify-center">
                <h1 class="bg-primary text-white text-xs md:text-3xl text-center font-bold px-6 py-2 rounded-lg" data-aos="fade-up" data-aos-duration="1000">
                    Pembuatan Surat Layanan Umum
                </h1>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Izin Keramaian</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk izin penyelenggaraan acara keramaian.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananketeranganizinkeramaian') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Catatan Kriminal</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan catatan kriminal (SKCK).</p>
                    </div>
                    <a href="{{ route('FormsuratLayananSKCK') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Jamkesos</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan jaminan kesehatan sosial.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananjamkesos') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Kehilangan</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan kehilangan dokumen atau barang.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanankehilangan') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Penghasilan Orang Tua</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan penghasilan orang tua.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananpenghasilanortu') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Tidak Mampu</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan status tidak mampu.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanantidakmampu') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Domisili Usaha</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan domisili usaha warga.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanandomisiliusaha') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Domisili Usaha Non Warga</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan domisili usaha non warga.</p>
                    </div>
                    <a href="{{ route('FormsuratLayanandomisiliusahanonwarga') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Jual Beli</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan transaksi jual beli.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananjualbeli') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="border rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Surat Keterangan Usaha</h4>
                        <p class="text-sm text-gray-600 mb-4">Untuk keterangan keberadaan usaha.</p>
                    </div>
                    <a href="{{ route('FormsuratLayananusaha') }}" class="mt-auto inline-block bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Isi Form
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>