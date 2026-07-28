<?php
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PENDAFTARAN | Administrator Pesantren</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* --- PALET WARNA ULTRA LUXURY VIBRANT --- */
        :root {
            --bg-dark: #020f0d;
            --bg-card: rgba(6, 36, 33, 0.55); 
            --gold-lux: #f59e0b;
            --text-white: #ffffff;
            --text-muted: #94a3b8;
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --content-width: 1200px;
        }

        /* --- GLOBAL RESET --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        html, body {
            height: 100%;
            width: 100%;
            background-color: var(--bg-dark);
            color: var(--text-white);
            -webkit-font-smoothing: antialiased;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* --- FULL-PAGE BACKGROUND SLIDER / CAROUSEL SYSTEM --- */
        .bg-slider-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
            pointer-events: none;
        }

        .bg-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.08);
            transition: opacity 1.8s ease-in-out, transform 8s ease-out;
        }

        /* Slide Aktif */
        .bg-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        /* Overlay Gradien Ganda untuk Kontras Teks Maksimal */
        .bg-slider-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            background: linear-gradient(
                180deg, 
                rgba(2, 15, 13, 0.92) 0%, 
                rgba(6, 36, 33, 0.78) 50%, 
                rgba(1, 10, 8, 0.96) 100%
            );
            pointer-events: none;
        }

        /* Ambient Glow Effect */
        .lux-bg-glow {
            position: fixed;
            width: 50vw;
            height: 50vw;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
            top: -15vw;
            right: -15vw;
            z-index: 3;
            pointer-events: none;
            filter: blur(120px);
        }

        /* --- HEADER & NAVBAR --- */
        header {
            position: fixed;
            top: 20px;
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
            background: rgba(2, 15, 13, 0.98);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 16px max(4vw, 24px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.7);
            max-width: 100%;
        }

        nav {
            background: rgba(6, 36, 33, 0.65);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 16px 40px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition-smooth);
            width: 100%;
            max-width: var(--content-width);
        }

        .logo-area img { 
            height: 50px; 
            width: auto; 
            display: block; 
            filter: drop-shadow(0 2px 10px rgba(255,255,255,0.15));
        }
        
        .nav-links ul { 
            list-style: none; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
        }
        
        .nav-links ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 700;
            padding: 12px 24px;
            border-radius: 12px;
            transition: var(--transition-smooth);
            letter-spacing: 0.8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links ul li a:hover, .nav-links ul li.active a {
            color: var(--gold-lux);
            background: rgba(245, 158, 11, 0.15);
        }

        .nav-cta-logout {
            background: rgba(239, 68, 68, 0.12) !important;
            border: 1px solid rgba(239, 68, 68, 0.4) !important;
            color: #f87171 !important;
        }
        .nav-cta-logout:hover {
            background: #ef4444 !important;
            color: #ffffff !important;
            border-color: #ef4444 !important;
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.35) !important;
            transform: translateY(-2px);
        }

        .menu-toggle { display: none; cursor: pointer; z-index: 1010; padding: 10px; }
        .hamburger { width: 22px; height: 2px; background: var(--text-white); position: relative; transition: var(--transition-smooth); }
        .hamburger::before, .hamburger::after { content: ''; position: absolute; width: 100%; height: 100%; background: var(--text-white); transition: var(--transition-smooth); }
        .hamburger::before { top: -6px; }
        .hamburger::after { top: 6px; }

        .menu-toggle.open .hamburger { background: transparent; }
        .menu-toggle.open .hamburger::before { transform: rotate(45deg); top: 0; background: var(--gold-lux); }
        .menu-toggle.open .hamburger::after { transform: rotate(-45deg); top: 0; background: var(--gold-lux); }

        /* --- CONTAINER UTAMA --- */
        .main-wrapper {
            width: 100%;
            padding: 160px max(4vw, 24px) 60px;
            position: relative;
            z-index: 10;
            flex: 1 0 auto;
            display: flex;
            justify-content: center;
        }

        .content-container {
            width: 100%;
            max-width: var(--content-width);
        }

        .content-container h2 {
            font-size: 2.4rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--text-white) 60%, var(--gold-lux));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 30px;
            letter-spacing: -0.5px;
            border-left: 5px solid var(--gold-lux);
            padding-left: 18px;
        }

        /* Glassmorphic Box Dashboard */
        .box {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 45px;
            border-radius: 24px;
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.5);
            margin-bottom: 35px;
            position: relative;
            overflow: hidden;
        }

        .box::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(45deg, transparent, rgba(245, 158, 11, 0.03), transparent);
            pointer-events: none;
        }

        .box h3 {
            font-size: 1.5rem;
            font-weight: 500;
            color: #f1f5f9;
            line-height: 1.6;
        }
        
        .box h3 span {
            color: var(--gold-lux);
            font-weight: 800;
            position: relative;
            display: inline-block;
        }

        .dynamic-content {
            width: 100%;
            margin-top: 15px;
            overflow: visible; 
        }

        /* --- FOOTER --- */
        .footer-wrapper-outer {
            width: 100%;
            background: #010605; 
            border-top: 1px solid rgba(255, 255, 255, 0.05); 
            display: flex;
            justify-content: center;
            padding: 0 max(4vw, 24px);
            position: relative;
            z-index: 10;
            flex-shrink: 0;
        }

        .footer { 
            color: var(--text-muted); 
            padding: 50px 0 30px; 
            width: 100%;
            max-width: var(--content-width);
        }

        .footer-grid { 
            display: grid; 
            grid-template-columns: 2fr 1fr; 
            gap: 60px; 
            margin-bottom: 35px; 
        }

        .footer-brand h3 { 
            color: var(--text-white); 
            font-size: 1.6rem; 
            margin-bottom: 15px; 
            font-weight: 800; 
            letter-spacing: -0.3px;
        }

        .footer-brand p { 
            color: #cbd5e1; 
            font-size: 0.95rem; 
            line-height: 1.7; 
        }
        
        .footer-links h4 { 
            color: var(--text-white); 
            font-size: 1.1rem; 
            margin-bottom: 15px; 
            font-weight: 700; 
            border-left: 3px solid var(--gold-lux); 
            padding-left: 12px; 
        }
        
        .footer-bottom { 
            border-top: 1px solid rgba(255, 255, 255, 0.05); 
            padding-top: 25px; 
            text-align: center; 
            font-size: 0.85rem; 
            color: #64748b; 
        }

        /* --- RESPONSIVE MOBILE --- */
        @media(max-width: 992px) {
            nav { padding: 14px 25px; }
            .nav-links ul li a { padding: 10px 18px; font-size: 0.85rem; }
        }

        @media(max-width: 768px) {
            .menu-toggle { display: block; }
            .footer-grid { grid-template-columns: 1fr; gap: 35px; }
            
            nav { padding: 12px 20px; border-radius: 14px; }
            .logo-area img { height: 42px; } 
            .main-wrapper { padding-top: 140px; padding-bottom: 40px; }
            .content-container h2 { font-size: 1.9rem; margin-bottom: 20px; }
            .box { padding: 30px 24px; border-radius: 16px; }
            .box h3 { font-size: 1.2rem; }

            .nav-links {
                position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
                background: rgba(2, 15, 13, 0.98); backdrop-filter: blur(30px); -webkit-backdrop-filter: blur(30px);
                z-index: 1000; display: flex; align-items: center; justify-content: center;
                opacity: 0; pointer-events: none; transition: var(--transition-smooth);
            }

            .nav-links.active { opacity: 1; pointer-events: auto; }
            .nav-links ul { flex-direction: column; gap: 20px; width: 100%; text-align: center; padding: 0 10%; }
            .nav-links ul li { opacity: 0; transform: translateY(20px); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); width: 100%; }
            .nav-links.active ul li { opacity: 1; transform: translateY(0); }

            .nav-links.active ul li:nth-child(1) { transition-delay: 0.1s; }
            .nav-links.active ul li:nth-child(2) { transition-delay: 0.15s; }

            .nav-links ul li a { font-size: 1.3rem; font-weight: 800; display: block; padding: 14px 0; justify-content: center; border-radius: 10px; }
            .nav-cta-logout { margin-top: 10px; }
        }
    </style>
</head>
<body>

<!-- BACKGROUND IMAGE SLIDER (GAMBAR BERGESER/GANTI OTOMATIS) -->
<div class="bg-slider-container">
    <!-- Silakan ganti atau tambah path gambar sesuai gambar yang ada di folder img/ Anda -->
    <div class="bg-slide active" style="background-image: url('img/fasilitas.jpeg');"></div>
    <div class="bg-slide" style="background-image: url('img/pembelajaranMA.jpeg');"></div>
    <div class="bg-slide" style="background-image: url('img/sholat_jamaah.jpeg');"></div>
</div>

<!-- OVERLAY GRADIENT & AMBIENT GLOW -->
<div class="bg-slider-overlay"></div>
<div class="lux-bg-glow"></div>

<!-- NAVIGATION HEADER -->
<header id="mainHeader">
    <nav>
        <div class="logo-area">
            <a href="admin.php"><img src="img/logo pondok.png" alt="Logo Pondok Pesantren Riyadlus Sholihin"></a>
        </div>
        
        <div class="nav-links" id="navLinks">
            <ul>
                <li class="<?php echo (!isset($_GET['page']) || $_GET['page']=='beranda') ? 'active':''; ?>"><a href="admin.php?page=beranda"><i class="fa-solid fa-chart-pie"></i> BERANDA</a></li>
                <li class="<?php echo (isset($_GET['page']) && $_GET['page']=='daftar_peserta') ? 'active':''; ?>"><a href="admin.php?page=daftar_peserta"><i class="fa-solid fa-users-gear"></i> DAFTAR PESERTA</a></li>
                <li><a href="keluar.php" class="nav-cta-logout"><i class="fa-solid fa-right-from-bracket"></i> KELUAR</a></li>
            </ul>
        </div>

        <div class="menu-toggle" id="mobileMenuBtn" onclick="toggleMobileMenu()">
            <div class="hamburger"></div>
        </div>
    </nav>
</header>

<!-- WRAPPER UTAMA KONTEN DASHBOARD -->
<main class="main-wrapper">
    <div class="content-container">
        
        <h2 data-aos="fade-right">Panel Administrator</h2>
        
        <div class="box" data-aos="fade-up">
            <h3>Selamat Datang, <span>Administrator</span> di Portal Sistem Pendaftaran Online Pondok Pesantren Riyadlus Sholihin Al Islamy.</h3>
        </div>

        <!-- Wadah Konten PHP Include Dinamis -->
        <div class="dynamic-content" data-aos="fade-up" data-aos-delay="100">
            <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];

                switch ($page) {
                    case 'admin':
                        include "admin.php";
                        break;
                    case 'daftar_peserta':
                        include "daftar_peserta.php";
                        break;
                    case 'daftar_nilai':
                        include "daftar_nilai.php";
                        break;
                }
            }
            ?>
        </div>

    </div>
</main>

<!-- FOOTER TERINTEGRASI -->
<div class="footer-wrapper-outer">
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3>MTs Riyadlus Sholihin</h3>
                <p>Sistem Pengelola Data Penerimaan Santri Baru Terpusat. Seluruh informasi data pendaftar dilindungi oleh hak enkripsi server internal madrasah.</p>
            </div>
            <div class="footer-links">
                <h4>Otoritas Panel</h4>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6;">
                    Gunakan hak akses administrator secara bijak dan pastikan untuk selalu melakukan tindakan <strong>Keluar (Log Out)</strong> setelah selesai mengelola database pendaftaran santri.
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 MTs Riyadlus Sholihin. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </footer>
</div>

<!-- SCRIPTS & JAVASCRIPT SLIDER -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Inisialisasi AOS Animation
    AOS.init({ duration: 1000, once: true });

    // Efek Transisi Navbar Saat Scroll
    window.addEventListener('scroll', function() {
        const header = document.getElementById('mainHeader');
        if (window.scrollY > 40) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Toggle Menu Mobile
    function toggleMobileMenu() {
        const navLinks = document.getElementById('navLinks');
        const menuBtn = document.getElementById('mobileMenuBtn');
        navLinks.classList.toggle('active');
        menuBtn.classList.toggle('open');
    }

    // SLIDER BACKGROUND OTOMATIS
    const slides = document.querySelectorAll('.bg-slide');
    let currentSlide = 0;
    const slideInterval = 5000; // Berganti setiap 5 detik

    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    if(slides.length > 1) {
        setInterval(nextSlide, slideInterval);
    }
</script>

</body>
</html>