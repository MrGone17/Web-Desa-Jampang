<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi SuratPembuatan Akta Lahir</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); padding: 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #1f2937; font-size: 22px; margin-bottom: 8px;">Konfirmasi Pengajuan Surat Pembuatan Akta Lahir</h2>
            <p style="color: #6b7280; font-size: 14px;">Desa Jampang</p>
        </div>

        <p style="font-size: 16px; color: #111827;">Halo <strong>{{ $data['nama'] }}</strong>,</p>
        <p style="font-size: 15px; color: #374151; margin-bottom: 24px;">
            Terima kasih telah mengajukan <strong>Surat Pembuatan Akta Kelahiran</strong>. Berikut ini adalah data permohonan Anda yang kami terima:
        </p>

        <table style="width: 100%; font-size: 15px; color: #374151; border-spacing: 0 10px;">
            <tr>
                <td style="width: 40%;"><strong>Nama Anak</strong></td>
                <td>: {{ $data['nama_anak'] }}</td>
            </tr>
            <tr>
                <td style="width: 40%;"><strong>Nama Orang Tua</strong></td>
                <td>: {{ $data['nama_ortu'] }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Lahir</strong></td>
                <td>: {{ \Carbon\Carbon::parse($data['tgl_lahir_ortu'])->translatedFormat('l, d F Y') }}</td>
            </tr>
            <tr>
                <td><strong>Usia Orang Tua</strong></td>
                <td>: {{ $data['usia_ortu'] }} tahun</td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td>: {{ $data['alamat_ortu'] }}</td>
            </tr>
        </table>

        </table>

        <p style="margin-top: 30px; font-size: 15px; color: #374151;">
            Permohonan Anda saat ini berstatus: <strong>{{ ucfirst($data['status']) }}</strong>. Kami akan menghubungi Anda kembali jika surat sudah selesai.
        </p>

        <div style="margin-top: 40px; text-align: center;">
            <p style="font-size: 13px; color: #9ca3af;">Email ini dikirim otomatis oleh sistem.</p>
            <p style="font-size: 13px; color: #9ca3af;">Desa Jampang &copy; {{ date('Y') }}</p>
        </div>
    </div>
</body>
</html>
