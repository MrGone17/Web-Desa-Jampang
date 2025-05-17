<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Surat Permohonan KK</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); padding: 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #1f2937; font-size: 22px; margin-bottom: 8px;">Konfirmasi Status Surat Permohonan Kartu Keluarga</h2>
            <p style="color: #6b7280; font-size: 14px;">Desa Jampang</p>
        </div>

        <p style="font-size: 16px; color: #111827;">Halo <strong>{{ $data['nama'] }}</strong>,</p>
        <p style="font-size: 15px; color: #374151; margin-bottom: 24px;">
            Pengajuan surat domisili kamu telah diperbarui dengan status berikut:
        </p>

        <table style="width: 100%; font-size: 15px; color: #374151; border-spacing: 0 10px;">
            <p><strong>Status:</strong> {{ ucfirst($data['status']) }}</p>

            @if(!empty($data['catatan']))
                <p><strong>Catatan:</strong> {{ $data['catatan'] }}</p>
            @endif
        </table>

        <p style="margin-top: 30px; font-size: 15px; color: #374151;">
            Permohonan Anda saat ini sedang dalam proses. Kami akan menghubungi Anda kembali jika surat sudah selesai.
        </p>

        <div style="margin-top: 40px; text-align: center;">
            <p style="font-size: 13px; color: #9ca3af;">Email ini dikirim otomatis oleh sistem.</p>
            <p style="font-size: 13px; color: #9ca3af;">Desa Jampang &copy; {{ date('Y') }}</p>
        </div>
    </div>
</body>
</html>
