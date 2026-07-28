<?php 
include 'koneksi.php';

error_reporting(0);
session_start();

// Redirect jika sudah login
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}

$email = "";

if (isset($_POST['submit'])) {
    // Escaping dasar untuk keamanan query
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbadmin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && $result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Ponpes Riyadlus Sholihin</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* --- PALET WARNA LUXURY VIBRANT --- */
        :root {
            --bg-dark: #020f0d;
            --bg-card: rgba(6, 36, 33, 0.65); 
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

        /* --- FULLPAGE VIDEO BACKGROUND --- */
        .video-bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1;
            overflow: hidden;
        }

        .video-bg-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                180deg,
                rgba(2, 15, 13, 0.85) 0%,
                rgba(6, 36, 33, 0.75) 50%,
                rgba(1, 10, 8, 0.95) 100%
            );
            z-index: 2;
        }

        /* Ambient Glow Layer */
        .lux-bg-glow {
            position: fixed;
            width: 45vw;
            height: 45vw;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
            top: -10vw;
            right: -10vw;
            z-index: 3;
            pointer-events: none;
            filter: blur(100px);
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

        /* --- MAIN LOGIN CONTAINER --- */
        .main-wrapper {
            flex: 1 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 130px max(4vw, 24px) 60px;
            position: relative;
            z-index: 10;
        }

        .container {
            background: var(--bg-card);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 40px 35px;
            width: 100%;
            max-width: 420px;
            border-radius: 24px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.6);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .login-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
            background: #ffffff;
            padding: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            transition: var(--transition-smooth);
        }

        .login-logo:hover {
            transform: scale(1.05);
        }

        .login-text {
            color: var(--text-white);
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 4px;
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin-bottom: 28px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 600;
        }

        /* --- FORM ELEMENTS --- */
        .input-group {
            position: relative;
            margin-bottom: 18px;
            width: 100%;
        }

        .input-group input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            outline: none;
            border-radius: 12px;
            font-size: 0.92rem;
            color: #ffffff;
            transition: var(--transition-smooth);
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .input-group input:focus {
            background: rgba(0, 0, 0, 0.6);
            border-color: var(--gold-lux);
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.2);
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #d97706 0%, var(--gold-lux) 100%);
            border: none;
            outline: none;
            border-radius: 12px;
            color: #020f0d;
            font-size: 0.9rem;
            font-weight: 800;
            cursor: pointer;
            transition: var(--transition-smooth);
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.25);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 5px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(245, 158, 11, 0.4);
            filter: brightness(1.1);
        }

        .login-register-text {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 25px;
        }

        .login-register-text a {
            color: var(--gold-lux);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .login-register-text a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* --- FOOTER --- */
        .footer-wrapper-outer {
            width: 100%;
            background: rgba(1, 6, 5, 0.85); 
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.08); 
            display: flex;
            justify-content: center;
            padding: 0 max(4vw, 24px);
            position: relative;
            z-index: 10;
            flex-shrink: 0;
        }

        .footer { 
            color: var(--text-muted); 
            padding: 35px 0 20px; 
            width: 100%;
            max-width: var(--content-width);
        }

        .footer-grid { 
            display: grid; 
            grid-template-columns: 2fr 1fr; 
            gap: 40px; 
            margin-bottom: 25px; 
        }

        .footer-brand h3 { 
            color: var(--text-white); 
            font-size: 1.3rem; 
            margin-bottom: 10px; 
            font-weight: 800; 
        }

        .footer-brand p { 
            color: #cbd5e1; 
            font-size: 0.88rem; 
            line-height: 1.6; 
        }

        .footer-links h4 { 
            color: var(--text-white); 
            font-size: 1rem; 
            margin-bottom: 10px; 
            font-weight: 700; 
            border-left: 3px solid var(--gold-lux); 
            padding-left: 10px; 
        }

        .footer-bottom { 
            border-top: 1px solid rgba(255, 255, 255, 0.05); 
            padding-top: 18px; 
            text-align: center; 
            font-size: 0.8rem; 
            color: #64748b; 
        }

        /* --- RESPONSIF BREAKPOINT --- */
        @media(max-width: 768px) {
            nav { padding: 10px 20px; }
            .logo-area img { height: 38px; }
            .nav-links { display: none; } /* Opsi sederhana mobile nav */
            .main-wrapper { padding-top: 110px; padding-bottom: 30px; }
            .container { padding: 30px 20px; }
            .footer-grid { grid-template-columns: 1fr; gap: 20px; }
        }
    </style>
</head>
<body>

    <!-- Latar Belakang Video Fullpage -->
    <div class="video-bg-container">
        <video autoplay loop muted playsinline poster="img/background.jpeg">
            <source src="img/video_profil.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        <div class="video-overlay"></div>
    </div>

    <!-- Radial Glow Effect -->
    <div class="lux-bg-glow"></div>

   <!-- Navigation Header -->
<header id="mainHeader">
    <nav>
        <div class="logo-area">
            <!-- ⚠️ UBAH MANUAL: File gambar Logo Madrasah Anda di folder img/ -->
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

    <!-- Content Utama: Form Login -->
    <div class="main-wrapper">
        <div class="container" data-aos="zoom-in" data-aos-duration="600">
            
            <div class="login-icon">
                <img src="img/logo pondok.png" alt="Logo" class="login-logo">
            </div>
            
            <form action="" method="POST" class="login-email">
                <p class="login-text">Selamat Datang</p>
                <p class="login-subtitle">Akses Database PPDB Pesantren</p>
                
                <div class="input-group">
                    <input type="email" placeholder="Alamat Email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
                
                <div class="input-group">
                    <input type="password" placeholder="Kata Sandi" name="password" required>
                </div>
                
                <div class="input-group" style="margin-bottom: 0;">
                    <button type="submit" name="submit" class="btn">Masuk ke Sistem</button>
                </div>
                
                <p class="login-register-text">Belum memiliki akun? <a href="register.php">Hubungi Pusat</a></p>
            </form>

        </div>
    </div>

    <!-- Footer -->
    <div class="footer-wrapper-outer">
        <footer class="footer">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Ponpes Riyadlus Sholihin Al Islamy</h3>
                    <p>Sistem Pengelola Data Penerimaan Santri Baru Terpusat. Seluruh informasi data pendaftar dilindungi oleh sistem keamanan server internal pesantren.</p>
                </div>
                <div class="footer-links">
                    <h4>Otoritas Portal</h4>
                    <p style="color: var(--text-muted); font-size: 0.85rem; line-height: 1.5;">
                        Halaman ini khusus diperuntukkan bagi panitia dan administrator resmi. Hubungi admin pusat jika Anda mengalami kendala akses.
                    </p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Ponpes Riyadlus Sholihin Al Islamy. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </footer>
    </div>

    <!-- AOS Script Initialization -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>