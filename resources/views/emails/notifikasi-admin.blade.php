<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemberitahuan Pengajuan Surat</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); padding: 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #1f2937; font-size: 22px; margin-bottom: 8px;">Pemberitahuan Pengajuan Surat</h2>
            <p style="color: #6b7280; font-size: 14px;">Desa Jampang</p>
        </div>

        <p style="font-size: 16px; color: #111827;">Halo <strong>Admin Desa Jampang</strong>,</p>
        <p style="font-size: 15px; color: #374151; margin-bottom: 24px;">
            Pemberitahuan Pengajuan Surat <strong>{{ $data['nama_surat'] }}</strong>. Berikut Nama Pengirim Yang Kami Terima:
        </p>

        <p style="font-size: 15px; color: #374151; margin-top: 24px;">Data Yang Kami Konfirmasikan Kembali:</p>

        <table style="width: 100%; font-size: 15px; color: #374151; border-spacing: 0 10px;">
            <tr>
                <td><strong>Nama Pengirim Surat</strong></td>
                <td>: {{ $data['nama_lengkap'] }}</td>
            </tr>
        </table>
        <p style="font-size: 15px; color: #374151; margin-top: 20px;">
            Mohon untuk segera memproses permohonan ini dan melakukan pengecekan data pengajuan melalui panel admin. Pastikan informasi yang diterima sudah lengkap sebelum diproses lebih lanjut.
        </p>

        <div style="margin-top: 40px; text-align: center;">
            <p style="font-size: 13px; color: #9ca3af;">Email ini dikirim otomatis oleh sistem.</p>
            <p style="font-size: 13px; color: #9ca3af;">Desa Jampang &copy; {{ date('Y') }}</p>
        </div>
    </div>
</body>
</html>
