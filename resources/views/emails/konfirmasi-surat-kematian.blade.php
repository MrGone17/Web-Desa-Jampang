<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Surat Keterangan Kematian</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); padding: 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #1f2937; font-size: 22px; margin-bottom: 8px;">Konfirmasi Pengajuan Surat Keterangan Kematian</h2>
            <p style="color: #6b7280; font-size: 14px;">Desa Jampang</p>
        </div>

        <p style="font-size: 16px; color: #111827;">Halo <strong>{{ $data['nama'] }}</strong>,</p>
        <p style="font-size: 15px; color: #374151; margin-bottom: 24px;">
            Terima kasih telah mengajukan <strong>Surat Keterangan Kematian</strong>. Berikut ini adalah data permohonan Anda yang kami terima:
        </p>

        <p style="font-size: 15px; color: #374151; margin-top: 24px;">Data Orang Yang Meninggal:</p>

        <table style="width: 100%; font-size: 15px; color: #374151; border-spacing: 0 10px;">
            <tr>
                <td><strong>Nama Yang Meninggal</strong></td>
                <td>: {{ $data['nama_meninggal'] }}</td>
            </tr>
            <tr>
                <td><strong>NIK Yang Meninggal</strong></td>
                <td>: {{ $data['nik_meninggal'] }}</td>
            </tr>
        </table>

        <p style="font-size: 15px; color: #374151; margin-top: 24px;">Adalah {{ $data['shdk_bersangkutan'] }} dari yang Meninggal yaitu</p>

        <table style="width: 100%; font-size: 15px; color: #374151; border-spacing: 0 10px;">
            <tr>
                <td><strong>Nama Bersangkutan</strong></td>
                <td>: {{ $data['nama_bersangkutan'] }}</td>
            </tr>
            <tr>
                <td><strong>NIK Bersangkutan</strong></td>
                <td>: {{ $data['nik_bersangkutan'] }}</td>
            </tr>
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
