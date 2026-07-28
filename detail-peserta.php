<?php
    session_start();
    include 'koneksi.php';

    // Amankan parameter ID dari celah SQL Injection
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

    $peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '$id'");
    $p = mysqli_fetch_object($peserta);

    // Jika data tidak ditemukan
    if (!$p) {
        echo "<script>alert('Data peserta tidak ditemukan!'); window.location='daftar_peserta.php';</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB ONLINE | Detail Peserta Administrator</title>
    
    <!-- Integrasi Font Awesome & Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- RESET & GLOBAL STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #062c1e linear-gradient(135deg, #062c1e 0%, #0c4a34 100%);
            min-height: 100vh;
            color: #fff;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* --- STYLISH NAVBAR HEADER --- */
        header {
            background: rgba(6, 44, 30, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        header h1 a {
            color: #d4af37;
            text-decoration: none;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
        }

        header h1 a::before {
            content: "\f19c"; 
            font-family: FontAwesome;
            font-size: 1.5rem;
        }

        header ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        header ul li a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 10px 18px;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        header ul li a:hover {
            color: #e5c043;
            background: rgba(255, 255, 255, 0.08);
        }

        /* --- CONTENT WRAPPER --- */
        .content {
            flex: 1;
            width: 100%;
            max-width: 850px;
            margin: 120px auto 60px auto;
            padding: 0 20px;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content h2 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 25px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid #d4af37;
            padding-left: 15px;
            letter-spacing: 0.5px;
        }

        /* --- BIODATA CONTAINER --- */
        .box {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* --- DATA TABLE STYLING --- */
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            transition: background 0.2s ease;
        }

        .table-data tr:last-child {
            border-bottom: none;
        }

        .table-data tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .table-data td:nth-child(1) {
            width: 35%;
            padding: 16px 10px 16px 0;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .table-data td:nth-child(2) {
            width: 5%;
            padding: 16px 0;
            color: #e5c043;
            font-weight: 600;
            text-align: center;
        }

        .table-data td:nth-child(3) {
            width: 60%;
            padding: 16px 0 16px 10px;
            color: #fff;
            font-weight: 400;
            font-size: 0.95rem;
        }

        .highlight-text {
            color: #e5c043 !important;
            font-weight: 600 !important;
            letter-spacing: 0.5px;
        }

        /* --- FOOTER UTILITY BUTTONS --- */
        .action-footer {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            transform: translateX(-3px);
        }

        .btn-print {
            background: #e5c043;
            color: #062c1e;
            box-shadow: 0 4px 15px rgba(229, 192, 67, 0.3);
        }

        .btn-print:hover {
            background: #ffd34f;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 192, 67, 0.4);
        }

        /* Responsive Mobile Layout */
        @media (max-width: 600px) {
            header {
                flex-direction: column;
                gap: 10px;
                padding: 12px;
            }
            header ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            .content {
                margin-top: 170px;
            }
            .box {
                padding: 20px;
            }
            .table-data tr {
                display: flex;
                flex-direction: column;
                padding: 12px 0;
            }
            .table-data td:nth-child(1),
            .table-data td:nth-child(2),
            .table-data td:nth-child(3) {
                width: 100%;
                padding: 2px 0;
                text-align: left;
            }
            .table-data td:nth-child(2) {
                display: none;
            }
            .action-footer {
                flex-direction: column-reverse;
            }
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <!-- Navigasi Atas -->
    <header>
        <h1><a href="beranda.php">PENDAFTARAN ONLINE</a></h1>
        <ul>
            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="daftar_peserta.php"><i class="fa fa-users"></i> Daftar Peserta</a></li>
            <li><a href="keluar.php"><i class="fa fa-sign-out"></i> Keluar</a></li>
        </ul>
    </header>

    <!-- Konten Utama Detail Profil -->
    <section class="content">
        <h2><i class="fa fa-user-circle"></i> Detail Peserta</h2>
        <div class="box">
            <table class="table-data" border="0">
                <tr>
                    <td>Kode Pendaftaran</td>
                    <td>:</td>
                    <!-- Ambil Data ID Pendaftaran dari Database -->
                    <td class="highlight-text"><?php echo htmlspecialchars($p->id_pendaftaran); ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <!-- Ambil Data Tahun Ajaran dari Database (Fallback ke 2026/2027 jika kosong) -->
                    <td><?php echo !empty($p->th_ajaran) ? htmlspecialchars($p->th_ajaran) : '2026/2027'; ?></td>
                </tr>
                <tr>
                    <td>Jurusan Berbakat</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($p->jurusan); ?></td>
                </tr>
                <tr>
                    <td>Nomor Induk Siswa Nasional (NISN)</td>
                    <td>:</td>
                    <td class="highlight-text"><?php echo htmlspecialchars($p->NISN); ?></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($p->asal_sekolah); ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap Peserta</td>
                    <td>:</td>
                    <td><strong><?php echo htmlspecialchars($p->nm_peserta); ?></strong></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($p->tmp_lahir) . ', ' . htmlspecialchars($p->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($p->jenis_kelamin); ?></td>
                </tr>
                <tr>
                    <td>No. Telepon / WhatsApp</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($p->no_hp); ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($p->agama); ?></td>
                </tr>
                <tr>
                    <td>Nilai Rata-Rata Raport</td>
                    <td>:</td>
                    <td><span style="background: rgba(229,192,67,0.2); padding: 2px 10px; border-radius: 6px; color: #e5c043; font-weight: 650;"><?php echo htmlspecialchars($p->raport); ?></span></td>
                </tr>
                <tr>
                    <td>Alamat Tinggal</td>
                    <td>:</td>
                    <td><?php echo htmlspecialchars($p->alamat); ?></td>
                </tr>
            </table>

            <!-- Tombol Aksi Bawah -->
            <div class="action-footer">
                <a href="daftar_peserta.php" class="btn btn-back">
                    <i class="fa fa-arrow-left"></i> Kembali Ke Daftar
                </a>
                <button onclick="window.print()" class="btn btn-print">
                    <i class="fa fa-print"></i> Cetak Dokumen
                </button>
            </div>
        </div>
    </section>

</body>
</html>