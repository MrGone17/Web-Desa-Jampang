<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Surat</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; padding: 20px;">
    <div style="background-color: #ffffff; padding: 30px; border-radius: 8px; max-width: 600px; margin: auto;">
        <h2 style="color: #1f2937;">Halo {{ $data['nama'] }},</h2>
        <p>Pengajuan surat Tidak Memiliki Dokumen Kependudukan kamu telah diperbarui dengan status berikut:</p>

        <p><strong>Status:</strong> {{ ucfirst($data['status']) }}</p>

        @if(!empty($data['catatan']))
            <p><strong>Catatan:</strong> {{ $data['catatan'] }}</p>
        @endif

        <p>Terima kasih telah menggunakan layanan surat online Desa Jampang.</p>

        <p style="margin-top: 30px;">Hormat kami,<br>Desa Jampang</p>
    </div>
</body>
</html>
