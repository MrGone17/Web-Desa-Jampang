<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Surat Keterangan Beda Nama</title>
</head>
<body>
    <h2>Halo {{ $data['nama'] }}</h2>
    <p>Terima kasih telah mengajukan Surat Keterangan Beda Nama.</p>
    <p><strong>Nama Beda:</strong> {{ $data['nama_beda'] }}</p>
    <p><strong>Perbedaan:</strong> {{ $data['perbedaan'] }}</p>
    <p><strong>NIK:</strong> {{ $data['nik'] }}</p>
    <p><strong>Alamat:</strong> {{ $data['alamat'] }}</p>
    <p>Permohonan kamu sedang dalam proses. Kami akan menghubungi kembali jika sudah selesai.</p>
</body>
</html>
