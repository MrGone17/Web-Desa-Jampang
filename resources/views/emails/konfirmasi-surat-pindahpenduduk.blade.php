<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Surat Pindah Penduduk</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); padding: 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #1f2937; font-size: 22px; margin-bottom: 8px;">Konfirmasi Surat Pindah Penduduk</h2>
            <p style="color: #6b7280; font-size: 14px;">Desa Jampang</p>
        </div>

        <p style="font-size: 16px; color: #111827;">Halo <strong>{{ $data['nama'] }}</strong>,</p>
        <p style="font-size: 15px; color: #374151; margin-bottom: 24px;">
            Terima kasih telah mengajukan <strong>Surat Pindah Penduduk</strong>. Berikut ini adalah data permohonan Anda yang kami terima:
        </p>

        <table style="width: 100%; font-size: 15px; color: #374151; border-spacing: 0 10px;">
        <tr>
            <td style="width: 40%;"><strong>Nama Lengkap</strong></td>
            <td>: {{ $data['nama'] }}</td>
        </tr>
        <tr>
            <td><strong>NIK</strong></td>
            <td>: {{ $data['nik'] }}</td>
        </tr>
        <tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td>: {{ $data['jenis_kelamin'] === 'L' ? 'Laki-laki' : ($data['jenis_kelamin'] === 'P' ? 'Perempuan' : '-') }}</td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td>: {{ $data['alamat'] }}</td>
        </tr>
    </table>

    <table style="width: 100%; font-size: 15px; color: #374151; border-spacing: 0 10px;">
        <tr>
            <td style="width: 40%;"><strong>No KK</strong></td>
            <td>: {{ $data['no_kk'] }}</td>
        </tr>
        <tr>
            <td><strong>Kepala KK</strong></td>
            <td>: {{ $data['kepala_kk'] }}</td>
        </tr>
        <tr>
            <td><strong>Alasan Pindah</strong></td>
            <td>: {{ $data['alasan_pindah'] }}</td>
        </tr>
        <tr>
            <td><strong>Jumlah Anggota Keluarga</strong></td>
            <td>: {{ $data['jumlah_keluarga'] }}</td>
        </tr>
        <tr>
            <td><strong>Status Pengajuan</strong></td>
            <td>: {{ $data['status'] }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal Pengajuan</strong></td>
            <td>: {{ $data['tanggal_pengajuan'] }}</td>
        </tr>
    </table>

    @if (!empty($data['anggota']) && count($data['anggota']) > 0)
        <br>
        <h3 style="color: #111827;">Anggota Keluarga yang Ikut Pindah</h3>
        <table style="width: 100%; border-collapse: collapse; font-size: 15px; color: #374151;">
            <thead>
                <tr>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Nama</th>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">NIK</th>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Jenis Kelamin</th>
                    <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Status Hubungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['anggota'] as $a)
                    <tr>
                        <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $a['nama'] }}</td>
                        <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $a['nik'] }}</td> 
                        <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $a['jenis_kelamin'] === 'L' ? 'Laki-laki' : ($a['jenis_kelamin'] === 'P' ? 'Perempuan' : '-')}}</td>
                        <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $a['shdk'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

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
