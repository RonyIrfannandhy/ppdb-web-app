<?php
include 'koneksi.php';
// Ambil data pendaftaran
$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '".mysqli_real_escape_string($conn, $_GET['id'])."' ");
$p = mysqli_fetch_object($peserta);

// Antisipasi jika data tidak ditemukan
if(!$p) {
    echo "<script>alert('Data pendaftaran tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEN| Bukti Pendaftaran - <?php echo $p->nm_peserta ?></title>
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- CORE STYLES (TAMPILAN LAYAR/BROWSER) --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #042015 linear-gradient(135deg, #042015 0%, #0c4a34 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            color: #333;
        }

        /* Container Utama Lembar Bukti */
        .box {
            background: #ffffff;
            width: 100%;
            max-width: 750px;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border-top: 8px solid #e5c043; /* Aksen warna emas */
            position: relative;
        }

        /* Kop Surat / Header Bukti */
        .header-bukti {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 3px double #0c4a34;
            margin-bottom: 35px;
        }

        .header-bukti h1 {
            font-size: 1.8rem;
            color: #0c4a34;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-bukti p {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
        }

        /* Desain Tabel Data Pendaftaran */
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        .table-data tr {
            transition: background 0.2s ease;
        }

        .table-data tr:nth-child(even) {
            background-color: #f9fbf9;
        }

        .table-data td {
            padding: 14px 10px;
            font-size: 0.95rem;
            color: #444;
            border-bottom: 1px solid #eee;
        }

        /* Lebar Kolom Label & Titik Dua */
        .table-data td:nth-child(1) {
            width: 35%;
            font-weight: 600;
            color: #0c4a34;
        }
        
        .table-data td:nth-child(2) {
            width: 3%;
            color: #999;
            text-align: center;
        }

        .table-data td:nth-child(3) {
            width: 62%;
            font-weight: 500;
        }

        /* Highlight khusus untuk Kode Pendaftaran */
        .kode-pendaftaran {
            font-family: monospace;
            font-size: 1.1rem !important;
            color: #e5c043 !important;
            font-weight: 700 !important;
            background: #042015;
            padding: 4px 12px !important;
            border-radius: 6px;
            display: inline-block;
        }

        /* Area Tanda Tangan / Garis Validasi */
        .footer-bukti {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 20px;
        }

        .note {
            font-size: 0.8rem;
            color: #777;
            font-style: italic;
            max-width: 50%;
            line-height: 1.4;
        }

        .ttd-box {
            text-align: center;
            font-size: 0.9rem;
        }

        .ttd-space {
            height: 80px;
        }

        /* Tombol Aksi Melayang (Hanya tampil di browser) */
        .action-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            gap: 12px;
            z-index: 999;
        }

        .btn-action {
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-print {
            background: #e5c043;
            color: #042015;
        }

        .btn-print:hover {
            background: #ffd34f;
            transform: translateY(-2px);
        }

        .btn-back {
            background: #ffffff;
            color: #333;
        }

        .btn-back:hover {
            background: #eee;
            transform: translateY(-2px);
        }


        /* --- OPTIMASI KHUSUS CETAK KERTAS (PRINTER / PDF) --- */
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
                display: block !important;
            }

            .box {
                box-shadow: none !important;
                border-top: none !important;
                max-width: 100% !important;
                padding: 0 !important;
            }

            .kode-pendaftaran {
                background: transparent !important;
                color: #000 !important;
                padding: 0 !important;
                font-weight: bold !important;
            }

            /* Sembunyikan tombol navigasi & cetak saat proses cetak berlangsung */
            .action-buttons {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <div class="box">
        <!-- Kepala Lembar Bukti -->
        <div class="header-bukti">
            <h1>Bukti Pendaftaran</h1>
            <p>Panitia Pendaftaran Santri Baru (PPSB) Online Resmi</p>
        </div>
        
        <!-- Tabel Rincian Data -->
        <table class="table-data">
            <tr>
                <td>Kode Pendaftaran</td>
                <td>:</td>
                <td><span class="kode-pendaftaran"><?php echo $p->id_pendaftaran ?></span></td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td><?php echo $p->th_ajaran ?></td>
            </tr>
            <tr>
                <td>Jurusan / Peminatan</td>
                <td>:</td>
                <td><?php echo $p->jurusan ?></td>
            </tr>
            <tr>
                <td>Nomor Induk Siswa Nasional</td>
                <td>:</td>
                <td><?php echo $p->NISN ?></td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td><?php echo $p->asal_sekolah ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?php echo $p->nm_peserta ?></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?php echo $p->tmp_lahir . ', ' . date('d F Y', strtotime($p->tgl_lahir)); ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $p->jenis_kelamin ?></td>
            </tr>
            <tr>
                <td>No. Telepon / WhatsApp</td>
                <td>:</td>
                <td><?php echo $p->no_hp ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?php echo $p->agama ?></td>
            </tr>
            <tr>
                <td>Nilai Rata-Rata Raport</td>
                <td>:</td>
                <td><strong><?php echo $p->raport ?></strong></td>
            </tr>
            <tr>
                <td>Alamat Tinggal</td>
                <td>:</td>
                <td><?php echo $p->alamat ?></td>
            </tr>
        </table>

        <!-- Bagian Bawah Bukti / Validasi TTD -->
        <div class="footer-bukti">
            <div class="note">
                * Simpan bukti pendaftaran ini dengan baik.<br>
                * Bawa lembar cetak ini beserta berkas persyaratan asli saat melakukan verifikasi ulang di sekolah.
            </div>
            <div class="ttd-box">
                <p>Kota Pendaftaran, <?php echo date('d M Y'); ?></p>
                <p style="margin-top: 5px; font-weight: 500;">Panitia Pendaftaran,</p>
                <div class="ttd-space"></div>
                <p style="text-decoration: underline; font-weight: 600;">( .................................... )</p>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi Melayang (Akan otomatis hilang saat dicetak ke kertas) -->
    <div class="action-buttons">
        <a href="index.php?id=<?php echo $p->id_pendaftaran ?>" class="btn-action btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <button onclick="window.print()" class="btn-action btn-print">
            <i class="fas fa-print"></i> Cetak Dokumen
        </button>
    </div>

</body>
</html>