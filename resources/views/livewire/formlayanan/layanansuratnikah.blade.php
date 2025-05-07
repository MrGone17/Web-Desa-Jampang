<div>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('image/berita.jpg') }}');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="relative container mx-auto px-6 md:px-20 py-16">
            <div class="text-center md:text-start text-white">
                <h2 class="text-3xl md:text-5xl font-bold">Form Pembuatan Surat Nikah</h2>
            </div>
        </div>
    </section>
    <section class="bg-white py-12">
        <div class="container mx-auto px-6 md:px-20">
            <div class="bg-gray-50 shadow-xl rounded-2xl p-8 md:p-12">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Lengkapi Data Berikut</h3>
                <form action="#" method="POST" class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" name="nik" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan NIK" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>

                    <!-- Nama Pasangan -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Nama Pasangan</label>
                        <input type="text" name="nama_pasangan" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama pasangan" required>
                    </div>

                    <!-- Tanggal Pernikahan -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Tanggal Pernikahan</label>
                        <input type="date" name="tgl_nikah" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <!-- Tambahan Upload PDF KK -->
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Upload Fotokopi Kartu Keluarga (PDF)</label>
                        <div class="flex items-center space-x-4">
                            <label class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-xl text-sm shadow-sm hover:bg-gray-200 transition">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h5v-2H4V5h12v4h2V5a2 2 0 00-2-2H4z" />
                                    <path d="M14 12h2l-3 3-3-3h2V9h2v3z" />
                                </svg>
                                Pilih File PDF
                                <input type="file" name="kk_pdf" accept="application/pdf" class="hidden" onchange="showFileName(this)">
                            </label>
                            <span id="file-name" class="text-sm text-gray-600 italic">Belum ada file</span>
                        </div>
                    </div>
                    <!-- Tombol Kirim -->
                    <div class="text-center md:text-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-xl transition duration-300">Kirim Formulir</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        function showFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : "Belum ada file";
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
</div>
