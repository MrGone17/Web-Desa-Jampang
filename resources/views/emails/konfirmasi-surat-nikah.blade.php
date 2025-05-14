<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Surat Nikah</title>
</head>
<body>
    <h2>Halo {{ $data['nama'] }},</h2>
    <p>Terima kasih telah mengajukan Surat Nikah di sistem kami.</p>
    <p>Berikut ringkasan data Anda:</p>

    <ul>
        <li><strong>Nama:</strong> {{ $data['nama'] }}</li>
        <li><strong>NIK:</strong> {{ $data['nik'] }}</li>
        <li><strong>Nama Pasangan:</strong> {{ $data['pasangan'] }}</li>
        <li><strong>Tanggal Nikah:</strong> {{ $data['tanggal'] }}</li>
    </ul>

    <p>Pengajuan Anda akan segera kami proses.</p>
    <p>Salam,<br>Admin Desa Jampang</p>
</body>
</html>
