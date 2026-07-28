<?php
    include 'koneksi.php';

    if (isset($_POST['submit'])) {
        // Ambil ID terbesar untuk generate kode otomatis
        $getMaxid = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
        $d = mysqli_fetch_object($getMaxid);
        
        $nextId = ($d->id) ? $d->id + 1 : 1;
        $generateId = 'P' . date('Y') . sprintf("%05s", $nextId);
        $generateIdN = 'N' . date('Y') . sprintf("%05s", $nextId);
        
        // Sanitasi dasar untuk keamanan dari SQL Injection
        $th_ajaran        = mysqli_real_escape_string($conn, $_POST['th_ajaran']);
        $jurusan          = mysqli_real_escape_string($conn, $_POST['jurusan']);
        $nisn             = mysqli_real_escape_string($conn, $_POST['NISN']);
        $asal_sekolah     = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
        $nm_peserta       = mysqli_real_escape_string($conn, $_POST['nm_peserta']);
        $tmp_lahir        = mysqli_real_escape_string($conn, $_POST['tmp_lahir']);
        $tgl_lahir        = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
        $jenis_kelamin    = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
        $no_hp            = mysqli_real_escape_string($conn, $_POST['no_hp']);
        $agama            = mysqli_real_escape_string($conn, $_POST['agama']);
        $raport           = mysqli_real_escape_string($conn, $_POST['raport']);
        $alamat           = mysqli_real_escape_string($conn, $_POST['alamat']);
        $sumber_informasi = mysqli_real_escape_string($conn, $_POST['sumber_informasi']);

        $bindo = mysqli_real_escape_string($conn, $_POST['BINDO']);
        $mtk   = mysqli_real_escape_string($conn, $_POST['MTK']);
        $ipa   = mysqli_real_escape_string($conn, $_POST['IPA']);
        $bingg = mysqli_real_escape_string($conn, $_POST['BINGG']);

        // Insert Data Pendaftaran
        $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES(
            '".$generateId."',
            '".date('Y-m-d')."',
            '".$th_ajaran."',
            '".$jurusan."',
            '".$nisn."',
            '".$asal_sekolah."',
            '".$nm_peserta."',
            '".$tmp_lahir."',
            '".$tgl_lahir."',
            '".$jenis_kelamin."',
            '".$no_hp."',
            '".$agama."',
            '".$raport."',
            '".$alamat."',
            '".$sumber_informasi."'
        )");

        // Insert Data Nilai Mata Pelajaran
        $insertnilai = mysqli_query($conn, "INSERT INTO tb_nilai VALUES(
            '".$generateIdN."',
            '".$bindo."',
            '".$mtk."',
            '".$ipa."',
            '".$bingg."'
        )");

        if ($insert && $insertnilai){
            echo '<script>window.location="berhasil.php?id='.$generateId.'"</script>';
        } else {
            $error_msg = mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PENDAFTARAN ONLINE | Formulir Pendaftaran</title>
    
    <!-- Integrasi Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- RESET & BASE STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #062c1e;
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* --- NAVBAR --- */
        header {
            position: fixed;
            top: 24px;
            left: 0;
            width: 100%;
            padding: 0 max(4vw, 24px);
            z-index: 1000;
            transition: var(--transition-smooth);
            display: flex;
            justify-content: center;
        }

        header.scrolled {
            top: 0;
            padding: 0;
        }

        header.scrolled nav {
            border-radius: 0;
            background: rgba(3, 20, 18, 0.98);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 14px max(4vw, 24px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.6);
            max-width: 100%;
        }

        nav {
            background: rgba(6, 36, 33, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 14px 40px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition-smooth);
            width: 100%;
            max-width: var(--content-width);
        }

        .logo-area img { 
            height: 52px; 
            width: auto; 
            display: block; 
            filter: drop-shadow(0 2px 12px rgba(255,255,255,0.2));
        }
        
        .nav-links ul { list-style: none; display: flex; align-items: center; gap: 8px; }
        
        .nav-links ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 10px 22px;
            border-radius: 10px;
            transition: var(--transition-smooth);
            letter-spacing: 0.5px;
        }

        .nav-links ul li a:hover, .nav-links ul li.active a {
            color: var(--gold-lux);
            background: rgba(245, 158, 11, 0.12);
        }

        .nav-cta {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(16, 185, 129, 0.25)) !important;
            border: 1px solid rgba(245, 158, 11, 0.6) !important;
            color: var(--gold-lux) !important;
            margin-left: 15px;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.15);
        }
        .nav-cta:hover {
            background: linear-gradient(135deg, var(--gold-lux), #fcd34d) !important;
            color: #000000 !important;
            border-color: var(--gold-lux) !important;
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3) !important;
        }

        .menu-toggle { display: none; cursor: pointer; z-index: 1010; padding: 6px; }
        .hamburger { width: 24px; height: 2px; background: var(--text-white); position: relative; transition: var(--transition-smooth); }
        .hamburger::before, .hamburger::after { content: ''; position: absolute; width: 100%; height: 100%; background: var(--text-white); transition: var(--transition-smooth); }
        .hamburger::before { top: -7px; }
        .hamburger::after { top: 7px; }

        .menu-toggle.open .hamburger { background: transparent; }
        .menu-toggle.open .hamburger::before { transform: rotate(45deg); top: 0; background: var(--gold-lux); }
        .menu-toggle.open .hamburger::after { transform: rotate(-45deg); top: 0; background: var(--gold-lux); }


   
    .cta-wrapper-outer {
        position: relative;
        width: 100%;
        padding: 100px max(4vw, 24px);
        display: flex;
        justify-content: center;
        align-items: center;
        /* Latar belakang dinamis dengan overlay gradient luxury */
        background-image: 
            radial-gradient(circle at center, rgba(16, 185, 129, 0.15) 0%, transparent 70%),
            linear-gradient(135deg, rgba(2, 15, 13, 0.92) 0%, rgba(6, 36, 33, 0.85) 50%, rgba(1, 10, 8, 0.95) 100%), 
            url('img/Kajian kitab salaf.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; /* Parallax subtle effect */
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        overflow: hidden;
        z-index: 10;
    }

    /* Pattern overlay hiasan (Opsional) */
    .cta-wrapper-outer::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(rgba(245, 158, 11, 0.08) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
        opacity: 0.5;
    }

    .cta-container {
        position: relative;
        width: 100%;
        max-width: 900px;
        text-align: center;
        z-index: 2;
        padding: 50px 30px;
        background: rgba(6, 36, 33, 0.45);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 28px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
    }

    /* Badge Status Gelombang PPDB */
    .cta-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        background: rgba(245, 158, 11, 0.12);
        border: 1px solid rgba(245, 158, 11, 0.4);
        border-radius: 50px;
        color: var(--gold-lux, #f59e0b);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .cta-badge i {
        font-size: 0.75rem;
        animation: pulse-dot 1.8s infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(0.85); }
    }

    /* Judul Utama */
    .cta-container h2 {
        color: #ffffff;
        font-size: clamp(2.2rem, 4vw, 3.2rem);
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: -0.5px;
        margin-bottom: 16px;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
    }

    .cta-container h2 span {
        background: linear-gradient(135deg, #ffffff 0%, var(--gold-lux, #f59e0b) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Subtitle Keterangan */
    .cta-description {
        color: #cbd5e1;
        font-size: clamp(0.95rem, 1.5vw, 1.1rem);
        line-height: 1.6;
        max-width: 680px;
        margin: 0 auto 35px;
        font-weight: 400;
    }

    /* Tombol Utama (Hero Button) */
    .hero-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 18px 38px;
        background: linear-gradient(135deg, #d97706 0%, #f59e0b 50%, #fcd34d 100%);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 14px;
        color: #020f0d;
        font-size: 0.95rem;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 12px 30px rgba(245, 158, 11, 0.35);
        position: relative;
        overflow: hidden;
    }

    /* Efek Kilau / Glossy pada Tombol */
    .hero-btn::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -60%;
        width: 40%;
        height: 200%;
        background: linear-gradient(
            to right, 
            rgba(255, 255, 255, 0) 0%, 
            rgba(255, 255, 255, 0.5) 50%, 
            rgba(255, 255, 255, 0) 100%
        );
        transform: rotate(30deg);
        transition: all 0.8s ease;
    }

    .hero-btn:hover::after {
        left: 130%;
    }

    .hero-btn:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 18px 40px rgba(245, 158, 11, 0.5);
        color: #000000;
    }

    .hero-btn i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .hero-btn:hover i {
        transform: translateX(4px);
    }

    /* --- RESPONSIVE ADJUSTMENTS --- */
    @media (max-width: 768px) {
        .cta-wrapper-outer {
            padding: 70px 20px;
            background-attachment: scroll; /* Mobile smooth scrolling */
        }

        .cta-container {
            padding: 35px 20px;
            border-radius: 20px;
        }

        .hero-btn {
            width: 100%;
            padding: 16px 24px;
            font-size: 0.88rem;
        }
    }

        /* --- HERO VIDEO BACKGROUND SYSTEM --- */
        .hero-wrapper-outer {
            width: 100%;
            display: flex;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background-color: var(--bg-dark);
        }

        .hero-section {
            position: relative;
            min-height: 95vh;
            width: 100%;
            max-width: var(--content-width);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 140px 0 80px;
            z-index: 2;
        }

        .hero-video-wrapper {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100vw;
            height: 100%;
            z-index: 1;
            background-position: center;
            background-size: cover;
        }

        .hero-video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, 
                rgba(3, 20, 18, 0.75) 0%, 
                rgba(3, 20, 18, 0.5) 60%, 
                var(--bg-dark) 100%);
        }

        .text-box {
            position: relative;
            max-width: 850px;
            z-index: 5;
            background: rgba(6, 36, 33, 0.5);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 55px 45px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 35px 80px rgba(0,0,0,0.6);
            text-align: center;
        }

        .text-box .sub-badge {
            background: linear-gradient(90deg, rgba(245, 158, 11, 0.25), transparent);
            border-left: 3px solid var(--gold-lux);
            color: #fde047;
            padding: 8px 20px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 2px;
            display: inline-block;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        .text-box h1 {
            font-size: 3.8rem;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -1.5px;
            margin-bottom: 22px;
            background: linear-gradient(180deg, var(--text-white) 40%, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-box p {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 40px;
            font-weight: 400;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
        }


        /* --- HERO BACKGROUND WRAPPER --- */
        .hero-section {
            position: relative;
            flex: 1;
            padding: 120px 20px 60px 20px; /* Offset padding atas untuk navbar fixed */
            display: flex;
            justify-content: center;
            align-items: center;
            /* Gambar background + overlay gradien selaras dengan halaman login */
            background: linear-gradient(135deg, rgba(6, 44, 30, 0.88) 0%, rgba(12, 74, 52, 0.88) 100%), 
                        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat fixed;
        }

        /* --- CONTAINER UTAMA FORM --- */
        .box-formulir {
            width: 100%;
            max-width: 820px;
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.25);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            animation: fadeInCard 0.6s ease-out;
        }

        @keyframes fadeInCard {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- ALERT NOTIFIKASI GAGAL --- */
        .alert-error {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid #dc3545;
            color: #ff8e98;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            text-align: center;
        }

        /* --- TYPOGRAPHY HEADER --- */
        .box-formulir h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e5c043;
            text-align: center;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .box-formulir h2 {
            font-size: 1.1rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            margin: 35px 0 15px 0;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .box-formulir h2::before {
            content: "\f0f6";
            font-family: FontAwesome;
            color: #e5c043;
        }

        /* --- FORM ELEMENTS & CONTROLS --- */
        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
        }

        .input-control {
            width: 100%;
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 12px 16px;
            color: #fff;
            font-size: 0.95rem;
            border-radius: 12px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-control:focus {
            border-color: #e5c043;
            background: rgba(0, 0, 0, 0.4);
            box-shadow: 0 0 12px rgba(229, 192, 67, 0.25);
        }

        .input-control[readonly] {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.5);
            border-color: rgba(255, 255, 255, 0.05);
            cursor: not-allowed;
        }

        select.input-control option {
            background: #0c4a34;
            color: #fff;
        }

        textarea.input-control {
            min-height: 100px;
            resize: vertical;
        }

        /* Group Radio Button */
        .radio-group {
            display: flex;
            gap: 25px;
            padding: 8px 0;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .radio-label input[type="radio"] {
            accent-color: #e5c043;
            transform: scale(1.15);
        }

        /* --- GRID FORM UNTUK NILAI RAPORT --- */
        .grid-nilai {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            background: rgba(0, 0, 0, 0.2);
            padding: 25px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* --- SUBMIT BUTTON --- */
        .btn-container {
            margin-top: 35px;
            text-align: center;
        }

        .btn-daftar {
            background: #e5c043;
            color: #062c1e;
            border: none;
            padding: 14px 40px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(229, 192, 67, 0.3);
            transition: all 0.3s ease;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-daftar:hover {
            background: #ffd34f;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(229, 192, 67, 0.4);
        }

        .btn-daftar:active {
            transform: translateY(0);
        }

        /* --- FOOTER STYLES --- */
        footer {
            background: rgba(4, 28, 19, 0.95);
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            padding: 20px 40px;
            text-align: center;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }

        footer strong {
            color: #e5c043;
        }

        /* --- RESPONSIVE ADJUSTMENTS --- */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }
            .hero-section {
                padding: 100px 15px 40px 15px;
            }
            .box-formulir {
                padding: 25px 20px;
            }
            .box-formulir h1 {
                font-size: 1.4rem;
            }
            .grid-nilai {
                grid-template-columns: 1fr;
                gap: 15px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation Header -->
<header id="mainHeader">
    <nav>
        <div class="logo-area">
            <a href="index.php"><img src="img/logo pondok.png" alt="Logo Ponpes Riyadlus Sholihin"></a>
        </div>
        
        <div class="nav-links" id="navLinks">
            <ul>
                <!-- Navigasi Dihubungkan Langsung ke Section Target di Index.php -->
                <li><a href="index.php">BERANDA</a></li>
                <li><a href="index.php#profil">SELAYANG PANDANG</a></li>
                <li><a href="index.php#fasilitas">FASILITAS</a></li>
                <li><a href="index.php#galeri">GALERI</a></li>
                <li><a href="index.php#kontak">KONTAK</a></li>
                <li class="active"><a href="login.php">ADMIN</a></li>
                <li><a href="daftar.php" class="nav-cta"><i class="fa-solid fa-pen-to-square"></i> PENDAFTARAN </a></li>
            </ul>
        </div>

        <div class="menu-toggle" id="mobileMenuBtn" onclick="toggleMobileMenu()">
            <div class="hamburger"></div>
        </div>
    </nav>
</header>

<div class="cta-wrapper-outer">
    <section class="cta-container" data-aos="zoom-in" data-aos-duration="700">
        <!-- Status Badge -->
        <div class="cta-badge">
            <i class="fa-solid fa-circle"></i> Penerimaan Santri Baru T.A 2026/2027
        </div>

        <!-- Judul -->
        <h2>Bergabunglah Bersama Keluarga Besar <span>Ponpes Riyadlus Sholihin</span></h2>

        <!-- Tombol Aksi -->
        <a href="daftar.phP#formulir" class="hero-btn">
            ISI FORMULIR SEKARANG 
            <i class="fa-solid fa-arrow-right-long"></i>
        </a>
    </section>
</div>

    <!-- HERO BACKGROUND WRAPPER -->
    <section class="hero-section" id="formulir">
        <div class="box-formulir">
            <h1>Formulir Pendaftaran</h1>
            <p style="text-align: center; color: rgba(255,255,255,0.65); font-size: 0.85rem; margin-bottom: 20px;">Silakan isi seluruh dokumen kelengkapan data santri dengan benar.</p>
            
            <?php if(isset($error_msg)): ?>
                <div class="alert-error">
                    <i class="fa fa-exclamation-triangle"></i> Gagal memproses pendaftaran: <?= $error_msg ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                
                <!-- SEKSI 1: DATA AKADEMIK -->
                <h2>Data Pendaftaran</h2>
                
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="th_ajaran" class="input-control" value="2026/2027" readonly>
                </div>

                <div class="form-group">
                    <label>Jurusan / Peminatan</label>
                    <select class="input-control" name="jurusan" required>
                        <option value="">-- Pilih Jurusan Berbakat --</option>
                        <option value="Sastra Indonesia">Sastra Indonesia</option>
                        <option value="Sastra Inggris">Sastra Inggris</option>
                        <option value="Teknik Komputer & Jaringan">Teknik Komputer & Jaringan</option>
                        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Asisten Keperawatan">Asisten Keperawatan</option>
                        <option value="Teknologi Laboratorium Medik">Teknologi Laboratorium Medik</option>
                        <option value="Farmasi Klinis & Komunitas">Farmasi Klinis & Komunitas</option>
                    </select>
                </div>

                <!-- SEKSI 2: DATA PRIBADI -->
                <h2>Data Diri Calon Siswa</h2>

                <div class="form-group">
                    <label>Nomor Induk Siswa Nasional (NISN)</label>
                    <input type="text" name="NISN" class="input-control" placeholder="Masukkan 10 digit NISN" required>
                </div>

                <div class="form-group">
                    <label>Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="input-control" placeholder="Contoh: SMP Negeri 1" required>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nm_peserta" class="input-control" placeholder="Nama sesuai ijazah resmi" required>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tmp_lahir" class="input-control" placeholder="Kota/Kabupaten lahir" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="input-control" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>No. Telepon / WhatsApp Handphone</label>
                    <input type="number" name="no_hp" class="input-control" placeholder="Contoh: 081234567xxx" required>
                </div>

                <div class="form-group">
                    <label>Agama</label>
                    <select class="input-control" name="agama" required>
                        <option value="">-- Pilih Agama --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nilai Rata-Rata Raport Keseluruhan</label>
                    <input type="number" step="0.01" name="raport" class="input-control" placeholder="Contoh: 85.50" required>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap Rumah</label>
                    <textarea class="input-control" name="alamat" placeholder="Nama jalan, RT/RW, Kecamatan, Kota/Kabupaten" required></textarea>
                </div>

                <div class="form-group">
                    <label>Sumber Informasi Pendaftaran Online</label>
                    <select class="input-control" name="sumber_informasi" required>
                        <option value="">Darimana Informasi Pendaftaran didapatkan?</option>
                        <option value="Alumni">Alumni</option>
                        <option value="Brosur">Brosur</option>
                        <option value="Spanduk">Spanduk</option>
                        <option value="Internet">Internet</option>
                        <option value="Sosial Media">Sosial Media</option>
                    </select>
                </div>

                <!-- SEKSI 3: INPUT NILAI MATA PELAJARAN -->
                <h2>Nilai Ujian Raport per Mapel</h2>
                <div class="grid-nilai">
                    <div class="form-group">
                        <label>Bahasa Indonesia</label>
                        <input type="number" name="BINDO" class="input-control" placeholder="0-100" min="0" max="100" required>
                    </div>
                    <div class="form-group">
                        <label>Matematika</label>
                        <input type="number" name="MTK" class="input-control" placeholder="0-100" min="0" max="100" required>
                    </div>
                    <div class="form-group">
                        <label>Ilmu Pengetahuan Alam (IPA)</label>
                        <input type="number" name="IPA" class="input-control" placeholder="0-100" min="0" max="100" required>
                    </div>
                    <div class="form-group">
                        <label>Bahasa Inggris</label>
                        <input type="number" name="BINGG" class="input-control" placeholder="0-100" min="0" max="100" required>
                    </div>
                </div>

                <!-- TOMBOL DAFTAR -->
                <div class="btn-container">
                    <button type="submit" name="submit" class="btn-daftar">
                        <i class="fa fa-paper-plane"></i> Kirim Pendaftaran Sekarang
                    </button>
                </div>
                
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>&copy; <?= date('Y') ?> <strong>Sistem Pendaftaran Santri Online</strong>. All Rights Reserved.</p>
    </footer>

</body>
</html>