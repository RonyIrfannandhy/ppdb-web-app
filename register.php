<?php 

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM tbadmin WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tbadmin (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil! Silakan login.')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
        
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome 5 & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>Register Page Admin | Modern Dashboard</title>

    <style>
        /* --- RESET & BASE STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            position: relative;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #042015;
            background-image: linear-gradient(135deg, rgba(4,32,21,0.95) 0%, rgba(12,74,52,0.88) 100%), 
                              url('https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=1920&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            overflow-x: hidden;
            padding: 20px;
        }

        /* --- ORB GLOW ANIMATION IN BACKGROUND --- */
        .orb {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: linear-gradient(45deg, #e5c043, #0c4a34);
            filter: blur(100px);
            z-index: 1;
            opacity: 0.35;
            animation: floatGlow 10s ease-in-out infinite alternate;
        }
        .orb-1 { top: -10%; right: -5%; }
        .orb-2 { bottom: -10%; left: -5%; animation-delay: -5s; }

        @keyframes floatGlow {
            0% { transform: translateY(0) rotate(0deg) scale(1); }
            100% { transform: translateY(40px) rotate(45deg) scale(1.2); }
        }

        /* --- CONTAINER GLASSMORPHISM --- */
        .container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 40px 35px;
            border-radius: 24px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            animation: cardAppear 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: scale(0.94) translateY(30px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* --- BACK BUTTON (TOMBOL KEMBALI DI ATAS) --- */
        .btn-back {
            position: absolute;
            top: 25px;
            left: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            z-index: 12;
        }

        .btn-back:hover {
            background: #e5c043;
            color: #042015;
            transform: translateX(-3px);
            box-shadow: 0 0 15px rgba(229, 192, 67, 0.4);
        }

        /* --- HEADER BRANDING --- */
        .brand-section {
            text-align: center;
            margin-bottom: 25px;
            margin-top: 10px;
        }

        .brand-icon {
            font-size: 2.2rem;
            color: #e5c043;
            margin-bottom: 8px;
            text-shadow: 0 0 15px rgba(229, 192, 67, 0.4);
        }

        .login-text {
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .login-subtitle {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            margin-top: 4px;
        }

        /* --- INPUT FIELD MODERN GROUP --- */
        .input-group {
            position: relative;
            margin-bottom: 24px;
            width: 100%;
        }

        .input-group i.field-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 1rem;
            transition: all 0.3s ease;
            pointer-events: none;
            z-index: 2;
        }

        .input-group input {
            width: 100%;
            padding: 16px 45px 14px 46px;
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.12);
            outline: none;
            border-radius: 12px;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        /* Input Focus State */
        .input-group input:focus {
            border-color: #e5c043;
            background: rgba(0, 0, 0, 0.45);
            box-shadow: 0 0 15px rgba(229, 192, 67, 0.15);
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        /* Ikon Berganti Warna saat Aktif */
        .input-group input:focus ~ i.field-icon {
            color: #e5c043;
        }

        /* Fitur Intip Sandi (Toggle Password Eye) */
        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.2s ease;
            z-index: 3;
        }
        .toggle-password:hover {
            color: #e5c043;
        }

        /* --- INTERAKTIF: PASSWORD METER INDIKATOR --- */
        .password-strength-wrapper {
            margin-top: -18px;
            margin-bottom: 20px;
            padding: 0 4px;
        }
        .strength-bar {
            height: 4px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        .strength-fill {
            height: 100%;
            width: 0;
            background: transparent;
            transition: all 0.4s ease;
        }

        /* --- BUTTON PREMIUM --- */
        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #e5c043 0%, #cca325 100%);
            color: #042015;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 24px rgba(229, 192, 67, 0.25);
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(135deg, #ffd34f 0%, #e5c043 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(229, 192, 67, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* --- FOOTER TEXT & LINK KEMBALI --- */
        .login-register-text {
            color: rgba(255, 255, 255, 0.55);
            text-align: center;
            font-size: 0.88rem;
            margin-top: 25px;
        }

        .login-register-text a {
            color: #e5c043;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-left: 5px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .login-register-text a:hover {
            color: #ffd34f;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Dekorasi Latar Belakang Interaktif -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="container">
        <!-- Tombol Ikon Kembali di Pojok Kiri Kartu -->
        <a href="login.php" class="btn-back" title="Kembali ke Halaman Login">
            <i class="fas fa-arrow-left"></i>
        </a>

        <form action="" method="POST" class="login-email">
            
            <div class="brand-section">
                <i class="fas fa-user-shield brand-icon"></i>
                <p class="login-text">Create Account</p>
                <p class="login-subtitle">Registrasi Hak Akses Panel Administrasi</p>
            </div>
            
            <!-- Input Username -->
            <div class="input-group">
                <i class="fas fa-user field-icon"></i>
                <input type="text" placeholder="Username" name="username" value="<?php echo htmlspecialchars($username); ?>" required autocomplete="off">
            </div>
            
            <!-- Input Email -->
            <div class="input-group">
                <i class="fas fa-envelope field-icon"></i>
                <input type="email" placeholder="Email Address" name="email" value="<?php echo htmlspecialchars($email); ?>" required autocomplete="off">
            </div>
            
            <!-- Input Password -->
            <div class="input-group">
                <i class="fas fa-lock field-icon"></i>
                <input type="password" placeholder="Password" name="password" id="passwordField" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" required>
                <i class="fas fa-eye toggle-password" onclick="togglePass('passwordField', this)"></i>
            </div>

            <!-- Interaktif: Bar Meter Kompleksitas Sandi -->
            <div class="password-strength-wrapper">
                <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
            </div>
            
            <!-- Input Konfirmasi Password -->
            <div class="input-group">
                <i class="fas fa-check-double field-icon"></i>
                <input type="password" placeholder="Confirm Password" name="cpassword" id="cpasswordField" value="<?php echo isset($_POST['cpassword']) ? htmlspecialchars($_POST['cpassword']) : ''; ?>" required>
                <i class="fas fa-eye toggle-password" onclick="togglePass('cpasswordField', this)"></i>
            </div>
            
            <div class="input-group" style="margin-bottom: 0;">
                <button name="submit" class="btn">Register Admin</button>
            </div>
            
            <p class="login-register-text">
                Sudah punya akun? 
                <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login Sekarang</a>
            </p>
        </form>
    </div>

    <!-- SCRIPT INTERAKTIF JAVASCRIPT -->
    <script>
        // Fungsi 1: Show / Hide Password Toggle
        function togglePass(fieldId, iconElement) {
            const field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
                iconElement.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                field.type = "password";
                iconElement.classList.replace("fa-eye-slash", "fa-eye");
            }
        }

        // Fungsi 2: Realtime Password Strength Monitor
        const passwordInput = document.getElementById('passwordField');
        const strengthFill = document.getElementById('strengthFill');

        passwordInput.addEventListener('input', function() {
            const val = passwordInput.value;
            let strength = 0;

            if (val.length >= 6) strength += 30; // Panjang minimum
            if (/[A-Z]/.test(val)) strength += 25; // Mengandung huruf besar
            if (/[0-9]/.test(val)) strength += 25; // Mengandung angka
            if (/[^A-Za-z0-9]/.test(val)) strength += 20; // Karakter unik/simbol

            // Ubah lebar dan warna bar berdasarkan skor kekuatan
            strengthFill.style.width = strength + '%';
            if (strength <= 30) {
                strengthFill.style.background = '#ff4d4d'; // Merah (Lemah)
            } else if (strength <= 60) {
                strengthFill.style.background = '#ffa500'; // Oranye (Sedang)
            } else {
                strengthFill.style.background = '#2ecc71'; // Hijau (Kuat)
            }

            if(val.length === 0) strengthFill.style.width = '0%';
        });
    </script>
</body>
</html>