<?php
include 'koneksi.php';

// Pastikan parameter ID ada untuk mencegah error halaman kosong
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Akses ilegal! Kode pendaftaran tidak ditemukan.'); window.location='index.php';</script>";
    exit;
}

$id_pendaftaran = htmlspecialchars($_GET['id']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PENDAFTARAN | Pendaftaran Berhasil</title>
    
    <!-- Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
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
            padding: 20px;
        }

        /* Box Utama Formulir Sukses */
        .box-formulir {
            background: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            text-align: center;
            border-top: 6px solid #e5c043; /* Aksen Emas */
            animation: fadeInUp 0.6s ease-out;
        }

        /* Animasi Efek Muncul */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Ikon Centang Sukses Modern */
        .success-icon {
            font-size: 4.5rem;
            color: #27ae60;
            margin-bottom: 20px;
            animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.3s both;
        }

        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        h2 {
            color: #0c4a34;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .sub-title {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        /* Box Info Kode Pendaftaran */
        .code-card {
            background: #f4f9f6;
            border: 2px dashed #0c4a34;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 35px;
        }

        .code-card p {
            font-size: 0.85rem;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .code-card h4 {
            font-size: 1.6rem;
            color: #0c4a34;
            font-weight: 700;
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 2px;
        }

        /* Wrapper Tombol Aksi */
        .action-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Tombol Utama Cetak Bukti */
        .btn-cetak {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            background: #e5c043;
            color: #042015;
            text-decoration: none;
            padding: 14px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(229, 192, 67, 0.3);
            transition: all 0.3s ease;
        }

        .btn-cetak:hover {
            background: #ffd34f;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 192, 67, 0.4);
        }

        /* Tombol Sekunder Kembali ke Home */
        .btn-home {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: #0c4a34;
            text-decoration: none;
            padding: 12px 20px;
            border: 2px solid #0c4a34;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-home:hover {
            background: #0c4a34;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <section class="box-formulir">
        <!-- Ikon Sukses -->
        <div class="success-icon">
            <i class="far fa-check-circle"></i>
        </div>

        <h2>Pendaftaran Berhasil!</h2>
        <p class="sub-title">Selamat, data formulir Anda telah sistem kami terima dengan baik. Silakan catat atau simpan kode di bawah ini.</p>
        
        <!-- Box Kode Pendaftaran -->
        <div class="code-card">
            <p>Kode Pendaftaran Anda</p>
            <h4><?php echo $id_pendaftaran; ?></h4>
        </div>
        
        <!-- Grup Tombol Aksi -->
        <div class="action-group">
            <a href="cetak-bukti.php?id=<?php echo $id_pendaftaran; ?>" target="_blank" class="btn-cetak">
                <i class="fas fa-print"></i> Cetak Bukti Pendaftaran
            </a>
            <a href="index.php" class="btn-home">
                <i class="fas fa-home"></i> Kembali ke Beranda
            </a>
        </div>
    </section>

</body>
</html>