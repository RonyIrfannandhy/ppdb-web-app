<?php
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PENDAFTARAN ONLINE | Daftar Nilai Administrator</title>
    
    <!-- Font Awesome & Google Fonts Terintegrasi -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- RESET & BASE STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            /* Tema Hijau Islami Selaras dengan Halaman Sebelumnya */
            background: #062c1e linear-gradient(135deg, #062c1e 0%, #0c4a34 100%);
            min-height: 100vh;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        /* --- MODERN PREMIUM HEADER & NAVBAR --- */
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
            text-transform: capitalize;
        }

        header ul li a:hover {
            color: #e5c043;
            background: rgba(255, 255, 255, 0.08);
        }

        header ul li a[href*="keluar"] {
            background: rgba(220, 53, 69, 0.15);
            color: #ff6b6b;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        header ul li a[href*="keluar"]:hover {
            background: #dc3545;
            color: #fff;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
        }

        /* --- CONTENT SECTION --- */
        .content {
            flex: 1;
            width: 100%;
            max-width: 1200px;
            margin: 110px auto 50px auto;
            padding: 0 20px;
            z-index: 10;
            animation: fadeInPage 0.5s ease-out;
        }

        @keyframes fadeInPage {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content h2 {
            font-size: 1.7rem;
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

        /* --- PREMIUM GLASS BOX CONTAINER --- */
        .box {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            /* Membuat area scroll horizontal yang rapi khusus tabel jika layar kekecilan */
            overflow-x: auto; 
        }

        /* Kustomisasi scrollbar internal box agar serasi */
        .box::-webkit-scrollbar {
            height: 8px;
        }
        .box::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .box::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.3);
            border-radius: 10px;
        }
        .box::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 55, 0.5);
        }

        /* --- INTERACTIVE MODERN TABLE --- */
        .table {
            width: 100%;
            border-collapse: collapse;
            border: none; /* Menghapus border=1 bawaan HTML kuno */
            text-align: left;
            font-size: 0.9rem;
            min-width: 950px; /* Menjaga data tidak berdempetan di layar kecil */
        }

        .table th {
            background: rgba(4, 30, 20, 0.8);
            color: #e5c043; /* Judul Kolom Emas */
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.82rem;
            padding: 16px 14px;
            border-bottom: 2px solid rgba(212, 175, 55, 0.4);
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 14px 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            vertical-align: middle;
        }

        /* Efek Interaktif Baris Terang Saat Kursor Melintas */
        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.002);
        }

        /* Desain Kolom Nomor & Nilai Agar Lebih Rapi di Tengah */
        .table td:nth-child(1), 
        .table td:nth-child(6) {
            text-align: center;
            font-weight: 500;
        }

        /* --- BUTTON AKSI INTERACTIVE STYLE --- */
        .btn-action {
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        /* Tombol Detail (Tema Emas/Kuning) */
        .btn-detail {
            background: rgba(229, 192, 67, 0.15);
            color: #e5c043;
            border: 1px solid rgba(229, 192, 67, 0.3);
            margin-right: 5px;
        }

        .btn-detail:hover {
            background: #e5c043;
            color: #062c1e;
            box-shadow: 0 4px 12px rgba(229, 192, 67, 0.3);
            transform: translateY(-1px);
        }

        /* Tombol Hapus (Tema Merah) */
        .btn-delete {
            background: rgba(220, 53, 69, 0.15);
            color: #ff6b6b;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .btn-delete:hover {
            background: #dc3545;
            color: #fff;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
            transform: translateY(-1px);
        }

        /* --- RESPONSIVE HEADER --- */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 12px;
                padding: 15px;
            }
            header ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            .content {
                margin-top: 160px;
            }
        }
    </style>
</head>
<body>
       
    <!-- Bagian Header & Navigasi Utama -->
    <header>
        <h1><a href="admin.php">PENDAFTARAN ONLINE</a></h1>
        <ul>
            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="daftar_peserta.php"><i class="fa fa-users"></i> Daftar Peserta</a></li>
            <li><a href="keluar.php"><i class="fa fa-sign-out"></i> Keluar</a></li>
        </ul>
    </header>

    <!-- Bagian Utama Content -->
    <section class="content">
        <h2>Daftar Nilai</h2>
        <div class="box">
            <!-- Atribut border="1" sengaja dibersihkan otomatis lewat CSS agar desain modern global -->
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pendaftaran</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Rata-Rata Raport</th>
                        <th>Jurusan</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
                        while($row = mysqli_fetch_array($list_peserta)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['id_pendaftaran'] ?></td>
                        <td><?php echo $row['id_pendaftaran'] ?></td>
                        <td><?php echo $row['nm_peserta'] ?></td>
                        <td><?php echo $row['tgl_lahir'] ?></td>
                        <td><?php echo $row['raport'] ?></td>
                        <td><?php echo $row['jurusan'] ?></td>
                        <td><?php echo $row['agama'] ?></td>
                        <td><?php echo $row['alamat'] ?></td>
                        <td><?php echo $row['jenis_kelamin'] ?></td>
                        <td style="text-align: center; white-space: nowrap;">
                            <a href="detail-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" class="btn-action btn-detail">
                                <i class="fa fa-search"></i> Detail
                            </a>
                            <a href="hapus-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" onclick="return confirm('Yakin ?')" class="btn-action btn-delete">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>