<h2 style="margin-bottom: 20px;">Yth. Admin Desa,</h2>

<p>Berikut ini kami sampaikan laporan baru yang telah masuk melalui sistem pelaporan masyarakat:</p>

<table style="margin-top: 20px; border-collapse: collapse;">
    <tr>
        <td style="padding: 4px 10px;"><strong>Nama Pelapor</strong></td>
        <td style="padding: 4px 10px;">: {{ $laporan->nama }}</td>
    </tr>
    <tr>
        <td style="padding: 4px 10px;"><strong>Nomor WhatsApp</strong></td>
        <td style="padding: 4px 10px;">: {{ $laporan->nomor_wa }}</td>
    </tr>
    <tr>
        <td style="padding: 4px 10px;"><strong>Alamat</strong></td>
        <td style="padding: 4px 10px;">: {{ $laporan->alamat }}</td>
    </tr>
    <tr>
        <td style="padding: 4px 10px;"><strong>Tanggal Kejadian</strong></td>
        <td style="padding: 4px 10px;">: {{ $laporan->tanggal_kejadian }}</td>
    </tr>
    <tr>
        <td style="padding: 4px 10px;"><strong>Keterangan</strong></td>
        <td style="padding: 4px 10px;">: {{ $laporan->keterangan }}</td>
    </tr>
</table>

<p style="margin-top: 30px;">Demikian informasi yang dapat kami sampaikan. Mohon untuk ditindaklanjuti sesuai prosedur yang berlaku.</p>

<p>Hormat kami,<br>
Sistem Informasi Desa</p>

