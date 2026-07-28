<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponpes Riyadlus Sholihin Al Islamy</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* --- CONFIGURASI PALET WARNA ULTRA LUXURY VIBRANT (DIEMAS & DICERAHKAN) --- */
        :root {
            --bg-dark: #031412;        /* Diubah dari #010a09 ke emerald gelap yang lebih hidup/cerah */
            --bg-card: rgba(6, 36, 33, 0.6); /* Lebih kontras dan cerah */
            --primary-glow: #0ea5e9;   
            --emerald-light: #10b981;  /* Penambahan aksen hijau terang */
            --gold-lux: #f59e0b;       /* Emas yang lebih cerah dan premium (Amber Gold) */
            --text-white: #ffffff;
            --text-muted: #cbd5e1;     /* Teks deskripsi dibuat lebih putih/cerah agar mudah dibaca */
            --transition-bounce: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --content-width: 1200px;
        }

        /* --- GLOBAL RESET & CENTER STRUCTURE --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            color: var(--text-white);
            background-color: var(--bg-dark);
            overflow-x: hidden;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        /* Ambient Aura Latar Belakang (Dibuat Lebih Terang) */
        .lux-bg-glow, .lux-bg-glow-2 {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
            filter: blur(100px);
        }
        .lux-bg-glow {
            width: 45vw;
            height: 45vw;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
            top: -10vw;
            right: -10vw;
        }
        .lux-bg-glow-2 {
            width: 55vw;
            height: 55vw;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.12) 0%, transparent 70%);
            bottom: -15vw;
            left: -15vw;
        }

        /* --- TATA LETAK SEIMBANG --- */
        .section-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 0 max(4vw, 24px);
        }

        section {
            padding: 100px 0 80px;
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: var(--content-width);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--text-white) 30%, var(--gold-lux));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .section-header .line-divider {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold-lux), transparent);
            margin: 18px auto 0;
            position: relative;
        }
        
        .section-header .line-divider::after {
            content: '❖';
            color: var(--gold-lux);
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--bg-dark);
            padding: 0 6px;
            font-size: 0.75rem;
        }

        .section-desc {
            color: var(--text-muted);
            margin-top: 20px;
            font-size: 1.1rem;
            max-width: 620px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 400;
        }

        /* Grid Sistem Sempurna & Proporsional */
        .grid-layout {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            width: 100%;
        }

        /* Tombol Premium */
        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #000000;
            background: linear-gradient(135deg, var(--gold-lux), #fcd34d);
            padding: 18px 42px;
            font-size: 1rem;
            font-weight: 800;
            border-radius: 14px;
            transition: var(--transition-bounce);
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
            letter-spacing: 0.5px;
            border: 1px solid transparent;
        }

        .hero-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(245, 158, 11, 0.5);
            color: var(--gold-lux);
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid var(--gold-lux);
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

        /* --- PROGRAM STUDI CARDS --- */
        .course-card {
            background: var(--bg-card);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 30px;
            transition: var(--transition-bounce);
            border: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            flex-direction: column;
        }

        .course-card .card-icon {
            width: 60px; height: 60px; background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08); border-radius: 12px;
            display: flex; align-items: center; justify-content: center; margin-bottom: 25px; transition: var(--transition-smooth);
        }

        .course-card .card-icon i { font-size: 1.8rem; color: var(--gold-lux); }
        .course-card h3 { font-size: 1.45rem; margin-bottom: 14px; font-weight: 700; letter-spacing: -0.5px; }
        .course-card p { color: var(--text-muted); font-size: 1rem; line-height: 1.6; font-weight: 400; }

        .course-card:hover {
            transform: translateY(-10px);
            border-color: rgba(245, 158, 11, 0.5);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            background: rgba(6, 45, 41, 0.8);
        }
        .course-card:hover .card-icon { background: var(--gold-lux); box-shadow: 0 0 20px rgba(245, 158, 11, 0.4); }
        .course-card:hover .card-icon i { color: #000000; }

        /* --- SEKTOR KAMPUS CARDS --- */
        .campus-card {
            position: relative; height: 380px; border-radius: 20px; overflow: hidden;
            border: 1px solid rgba(255,255,255,0.08);
        }
        .campus-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1); }
        
        .campus-card .gradient-overlay {
            position: absolute; inset: 0; background: linear-gradient(to top, #031412 12%, rgba(3, 20, 18, 0) 70%);
            display: flex; flex-direction: column; justify-content: flex-end; padding: 30px; transition: var(--transition-smooth);
        }

        .campus-card h3 { font-size: 1.6rem; font-weight: 800; }
        .campus-card h3 span { display: block; font-size: 0.85rem; color: var(--gold-lux); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 4px; font-weight: 700; }

        .campus-card:hover img { transform: scale(1.1); }
        .campus-card:hover .gradient-overlay { background: linear-gradient(to top, rgba(16, 185, 129, 0.8) 0%, rgba(3, 20, 18, 0.2) 100%); }
        .campus-card:hover h3 { color: #000000; }
        .campus-card:hover h3 span { color: var(--text-white); }

        /*==================================
        GALLERY SLIDER
==================================*/

.gallery-slider-wrapper{

    position:relative;

    width:100%;

    margin-top:50px;

}

.grid-layout{

    display:grid;

    grid-auto-flow:column;

    grid-auto-columns:calc((100% - 40px)/3);

    gap:20px;

    overflow-x:auto;

    scroll-behavior:smooth;

    scrollbar-width:none;

    padding:10px;

}

.grid-layout::-webkit-scrollbar{

    display:none;

}

/*==============================*/

.slider-btn{

    position:absolute;

    top:45%;

    transform:translateY(-50%);

    width:55px;

    height:55px;

    border:none;

    border-radius:50%;

    background:#0b6b4a;

    color:#fff;

    cursor:pointer;

    font-size:22px;

    z-index:20;

    transition:.3s;

    box-shadow:0 10px 20px rgba(0,0,0,.15);

}

.slider-btn:hover{

    background:#14855d;

    transform:translateY(-50%) scale(1.08);

}

.slider-btn.prev{

    left:-25px;

}

.slider-btn.next{

    right:-25px;

}

/*==============================*/

.facility-card{

    background:#fff;

    border-radius:18px;

    overflow:hidden;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

    transition:.35s;

}

.facility-card:hover{

    transform:translateY(-8px);

    box-shadow:0 20px 35px rgba(0,0,0,.15);

}

.facility-img-wrapper{

    overflow:hidden;

    height:230px;

}

.facility-img-wrapper img{

    width:100%;

    height:100%;

    object-fit:cover;

    transition:.5s;

}

.facility-card:hover img{

    transform:scale(1.08);

}

.facility-card h3{

    padding:20px 20px 10px;

}

.facility-card p{

    padding:0 20px 20px;

}

/* ===========================
   GALERI KEGIATAN
=========================== */

.grid-layout{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(350px,1fr));

    gap:30px;

    margin-top:50px;

}

.facility-card{

    background:#fff;

    border-radius:20px;

    overflow:hidden;

    display:flex;

    flex-direction:column;

    box-shadow:0 12px 30px rgba(0,0,0,.08);

    transition:.35s ease;

    height:100%;

}

.facility-card:hover{

    transform:translateY(-8px);

    box-shadow:0 20px 40px rgba(0,0,0,.18);

}

.facility-img-wrapper{

    width:100%;

    height:260px;

    overflow:hidden;

}

.facility-img-wrapper img{

    width:100%;

    height:100%;

    object-fit:cover;

    transition:.5s;

}

.facility-card:hover img{

    transform:scale(1.08);

}

.facility-card h3{

    padding:22px 22px 10px;

    color:#0A6847;

    font-size:24px;

    font-weight:700;

}

.facility-card p{

    padding:0 22px 25px;

    color:#666;

    line-height:1.8;

    font-size:15px;

    flex-grow:1;

}

@media(max-width:992px){

.grid-layout{

grid-template-columns:repeat(2,1fr);

}

}

@media(max-width:768px){

.grid-layout{

grid-template-columns:1fr;

}

}
        /* --- FASILITAS CARDS --- */
        .facility-card { 
            background: var(--bg-card); 
            border-radius: 20px; 
            overflow: hidden; 
            border: 1px solid rgba(255,255,255,0.05); 
            transition: var(--transition-smooth); 
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .facility-img-wrapper { position: relative; overflow: hidden; height: 240px; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .facility-img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: var(--transition-smooth); }
        .facility-card h3 { padding: 25px 25px 12px; font-size: 1.35rem; font-weight: 700; letter-spacing: -0.5px; }
        .facility-card p { padding: 0 25px 30px; color: var(--text-muted); font-size: 1rem; font-weight: 400; line-height: 1.6; }
        
        .facility-card:hover { 
            transform: translateY(-6px); 
            border-color: rgba(16, 185, 129, 0.4); 
            box-shadow: 0 25px 50px rgba(0,0,0,0.6); 
            background: rgba(6, 45, 41, 0.8);
        }
        .facility-card:hover .facility-img-wrapper img { transform: scale(1.05); }

        /* --- TESTIMONIAL SYSTEM --- */
        .testimonial-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; width: 100%; }
        .testimonial-card { background: var(--bg-card); border-radius: 20px; padding: 40px; border: 1px solid rgba(255,255,255,0.05); position: relative; }
        .quote-icon { position: absolute; top: 30px; right: 40px; font-size: 2.8rem; color: rgba(245, 158, 11, 0.08); }
        .profile-area { display: flex; align-items: center; gap: 20px; margin-bottom: 25px; }
        .profile-area img { width: 65px; height: 65px; border-radius: 14px; object-fit: cover; border: 2px solid var(--gold-lux); box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2); }
        .profile-area h3 { font-size: 1.25rem; font-weight: 700; }
        .profile-area span { font-size: 0.9rem; color: #fde047; display: block; margin-top: 2px; font-weight: 600; }
        .testimonial-card p { color: #f1f5f9; font-style: italic; font-size: 1.05rem; font-weight: 400; line-height: 1.7; }

        /* --- GRAND CALL TO ACTION --- */
        .cta-wrapper-outer {
            width: 100%;
            background-position: center; 
            background-size: cover;
            display: flex;
            justify-content: center;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .cta {
            text-align: center; 
            padding: 120px max(4vw, 24px); 
            max-width: var(--content-width);
            width: 100%;
        }
        .cta h2 { font-size: 3rem; font-weight: 800; margin-bottom: 35px; line-height: 1.3; text-shadow: 0 4px 20px rgba(0,0,0,0.6); }


        /*=============================
          FOOTER
=============================*/

.footer{

background:

linear-gradient(rgba(5,20,15,.96),

rgba(5,20,15,.96)),

url(img/footer-bg.jpg);

background-size:cover;

background-position:center;

color:#fff;

margin-top:120px;

}

.footer-top{

padding:80px 8% 40px;

position:relative;

}

.footer-wave{

position:absolute;

top:-60px;

left:0;

width:100%;

height:60px;

background:

url("img/wave.svg");

background-size:cover;

}

.footer-container{

display:grid;

grid-template-columns:

2fr 1fr 1fr 1.5fr;

gap:50px;

}

.footer-logo{

width:90px;

margin-bottom:20px;

filter:drop-shadow(0 0 12px rgba(255,255,255,.25));

}

.footer h2{

font-size:30px;

margin-bottom:15px;

}

.footer h3{

margin-bottom:25px;

font-size:22px;

color:#D9B95B;

}

.footer p{

line-height:1.9;

color:#ddd;

}

.footer ul{

padding:0;

margin:0;

list-style:none;

}

.footer li{

margin-bottom:14px;

}

.footer a{

color:#ddd;

text-decoration:none;

transition:.3s;

}

.footer a:hover{

color:#D9B95B;

padding-left:8px;

}

.footer-program i{

color:#D9B95B;

margin-right:10px;

}

.footer-contact p{

display:flex;

gap:10px;

margin-bottom:18px;

align-items:flex-start;

}

.footer-contact i{

color:#D9B95B;

width:20px;

margin-top:4px;

}

.social-media{

display:flex;

gap:15px;

margin-top:30px;

}

.social-media a{

width:48px;

height:48px;

border-radius:50%;

display:flex;

justify-content:center;

align-items:center;

background:rgba(255,255,255,.08);

font-size:20px;

transition:.35s;

}

.social-media a:hover{

background:#D9B95B;

color:#053126;

transform:translateY(-8px) rotate(360deg);

}

.footer-stat{

display:grid;

grid-template-columns:repeat(4,1fr);

padding:40px 8%;

background:rgba(255,255,255,.05);

text-align:center;

}

.footer-stat h2{

font-size:40px;

color:#D9B95B;

}

.footer-stat span{

color:#ddd;

}

.footer-map{

padding:50px 8%;

}

.footer-map iframe{

width:100%;

height:300px;

border:none;

border-radius:20px;

}

.footer-bottom{

display:flex;

justify-content:space-between;

align-items:center;

padding:25px 8%;

border-top:1px solid rgba(255,255,255,.08);

color:#aaa;

flex-wrap:wrap;

}

/*=====================
Responsive
=====================*/

@media(max-width:1100px){

.footer-container{

grid-template-columns:1fr 1fr;

}

.footer-stat{

grid-template-columns:repeat(2,1fr);

gap:25px;

}

}

@media(max-width:768px){

.footer-container{

grid-template-columns:1fr;

}

.footer-stat{

grid-template-columns:1fr;

}

.footer-bottom{

flex-direction:column;

gap:10px;

text-align:center;

}

}

        /* --- FOOTER --- */
        .footer-wrapper-outer {
            width: 100%;
            background: #010a08; 
            border-top: 1px solid rgba(255,255,255,0.05); 
            display: flex;
            justify-content: center;
            padding: 0 max(4vw, 24px);
        }
        .footer { 
            color: var(--text-muted); 
            padding: 90px 0 30px; 
            width: 100%;
            max-width: var(--content-width);
        }
        .footer-grid { display: grid; grid-template-columns: 1.8fr 1.2fr 1.5fr; gap: 60px; margin-bottom: 60px; }
        .footer-brand h3 { color: var(--text-white); font-size: 1.9rem; margin-bottom: 20px; font-weight: 800; letter-spacing: -0.5px; }
        .footer-brand p { color: #cbd5e1; font-size: 1rem; margin-bottom: 25px; font-weight: 400; line-height: 1.7; }
        
        .footer-links h4 { color: var(--text-white); font-size: 1.15rem; margin-bottom: 25px; font-weight: 700; border-left: 3px solid var(--gold-lux); padding-left: 12px; }
        .footer-links ul { list-style: none; }
        .footer-links ul li { margin-bottom: 14px; color: #f1f5f9; font-size: 1rem; font-weight: 400; display: flex; align-items: center; gap: 10px; }
        .footer-links ul li i { color: var(--gold-lux); font-size: 0.85rem; }
        
        .footer-bottom { border-top: 1px solid rgba(255, 255, 255, 0.05); padding-top: 30px; text-align: center; font-size: 0.9rem; color: #94a3b8; }

        /* --- BREAKPOINT RESPONSIF --- */
        @media(max-width: 1100px) {
            .grid-layout { grid-template-columns: repeat(2, 1fr); gap: 24px; }
            .text-box h1 { font-size: 3rem; }
            header { top: 16px; }
        }

        @media(max-width: 768px) {
            .menu-toggle { display: block; }
            .grid-layout, .testimonial-grid, .footer-grid { grid-template-columns: 1fr; gap: 35px; }
            
            nav { padding: 12px 24px; }
            .logo-area img { height: 46px; } 

            .text-box { padding: 40px 24px; border-radius: 20px; }
            .text-box h1 { font-size: 2.3rem; letter-spacing: -1px; }
            .text-box p { font-size: 1.05rem; margin-bottom: 30px; }
            .hero-section { padding-top: 140px; padding-bottom: 60px; }
            
            .section-header h2 { font-size: 2.2rem; }
            .cta h2 { font-size: 2rem; }

            .nav-links {
                position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
                background: rgba(3, 20, 18, 0.99); backdrop-filter: blur(25px); -webkit-backdrop-filter: blur(25px);
                z-index: 1000; display: flex; align-items: center; justify-content: center;
                opacity: 0; pointer-events: none; transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .nav-links.active { opacity: 1; pointer-events: auto; }
            .nav-links ul { flex-direction: column; gap: 25px; width: 100%; text-align: center; padding: 0 10%; }
            .nav-links ul li { opacity: 0; transform: translateY(20px); transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1); width: 100%; }
            .nav-links.active ul li { opacity: 1; transform: translateY(0); }

            .nav-links.active ul li:nth-child(1) { transition-delay: 0.1s; }
            .nav-links.active ul li:nth-child(2) { transition-delay: 0.15s; }
            .nav-links.active ul li:nth-child(3) { transition-delay: 0.2s; }

            .nav-links ul li a { font-size: 1.4rem; font-weight: 800; display: block; padding: 12px 0; }
            .nav-cta { margin-left: 0 !important; margin-top: 15px; }
        }
    </style>
</head>
<body>

<div class="lux-bg-glow"></div>
<div class="lux-bg-glow-2"></div>

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

<!-- Hero Section -->
<div class="hero-wrapper-outer">
    <section class="hero-section">
        <!-- ⚠️ UBAH MANUAL: Ganti poster gambar dan url video mp4 latar belakang hero (jika ada) -->
        <div class="hero-video-wrapper" style="background-image: url('img/banner.jpg');">
            <video autoplay loop muted playsinline poster="img/background.jpeg">
                <source src="img/video-pesantren.mp4" type="video/mp4">
            </video>
            <div class="hero-overlay"></div>
        </div>

        <div class="text-box">
            <span class="sub-badge" data-aos="fade-right">Penerimaan Santri Baru</span>
            <h1 data-aos="fade-up" data-aos-delay="150">Ponpes<br>Riyadlus Sholihin Al Islamy Semarang</h1>
            <p data-aos="fade-up" data-aos-delay="300">Pendidikan teladan, berkah dan berkualitas dalam mencetak generasi muslim yang berilmu, berakhlaq dan beramal berdasarkan Al-Qur'an dan As-sunnah sesuai manhaj salafunal aslah ahlus sunnah wal jamaah.</p>
            <a href="daftar.php" class="hero-btn" data-aos="zoom-in" data-aos-delay="450">
                MULAI PENDAFTARAN SEKARANG <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>    
    </section>
</div>

<!-- Program Unggulan -->
<div class="section-wrapper" id="profil">
    <section class="course">
        <div class="section-header">
            <div class="line-divider"></div>
            <h2 data-aos="fade-up">Selayang pandang</h2>
            <p class="section-desc" data-aos="fade-up" data-aos-delay="150">Pondok Pesantren Riyadlus Sholihin merupakan pondok pesantren salaf (salafiyah) modern di Kota Semarang dan terpadu dengan pendidikan sekolah. Pondok Pesantren Riyadlus Sholihin Al-Islamy berada di Kota Semarang tepatnya di Ds.Bibis Rt/Rw 01/02 Kelurahan Ngijo, Kecamatan Gunungpati Kota Semarang.</p>
        </div>

        <div class="grid-layout">
            <div class="course-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                <h3>Visi</h3>
                <p>Menjadi lembaga pendidikan teladan, berkah, dan berkualitas dalam mencetak generasi Muslim yang berilmu, berakhlaq, dan beramal berdasarkan Al-Qur'an dan As-Sunnah sesuai Manhaj Salafunal Aslah Ahlussunnah wal Jamaah.</p>
            </div>
            <div class="course-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-icon"><i class="fa-solid fa-quran"></i></div>
                <h3>Misi</h3>
                <p>Mendidik generasi Islam agar beraqidah, berakhlaq, dan jama'ah. Beribadah berdasarkan Al-Qur'an & As-Aunnah, sesuai Manhaj Salafunal Aslah Ahlussunnah wal Jamaah, Membentuk karakter Muslim teladan, sholeh, cendekia, mandiri, disiplin, dan sederhana, Membentuk pribadi Muslim yang senantiasa menyertai Al-Qur'an dan As-Sunnah sesuai pemahaman para sahabat Rasulullah.</p>
            </div>
            <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h3>Program Unggulan</h3>
                <p>Tahfidzul Qur'an dan Kajian Kitab Salaf Seperti menghafalkan kitab Aqidatul Awaam, Jurumiyah, Imrity, Alfiyah Ibn Malik serta pembacaan kitab kuning gundulan.</p>
            </div>
        </div>
    </section>
</div>

<!-- Sektor Kampus -->
<div class="section-wrapper" id="fasilitas">
    <section class="campus">
        <div class="section-header">
            <h2 data-aos="fade-up">Fasilitas Pondok Pesantren</h2>
            <div class="line-divider"></div>
            <p class="section-desc" data-aos="fade-up" data-aos-delay="150">Kawasan asrama dan ruang belajar terpisah secara total demi menjaga privasi, ketertiban, dan kenyamanan ibadah.</p>
        </div>

        <div class="grid-layout">
            <!-- ⚠️ UBAH MANUAL: Ganti foto asrama putra di folder img/asrama-putra.jpg -->
            <div class="campus-card" data-aos="zoom-in" data-aos-delay="100">
                <img src="img/asrama dan masjid.png" alt="Asrama Putra">
                <div class="gradient-overlay">
                    <h3><span>Asrama & Masjid Jami' Pesantren</span>ASRAMA SANTRI PUTRA</h3>
                </div>
            </div>
            <!-- ⚠️ UBAH MANUAL: Ganti foto gedung madrasah di folder img/gedung-madrasah.jpg -->
            <div class="campus-card" data-aos="zoom-in" data-aos-delay="200">
                <img src="img/gedungma1.jpeg" alt="Gedung Madrasah">
                <div class="gradient-overlay">
                    <h3><span>Gedung Madrasah </span>GEDUNG SEKOLAH</h3>
                </div>
            </div>
            <!-- ⚠️ UBAH MANUAL: Ganti foto asrama putri di folder img/asrama-putri.jpg -->
            <div class="campus-card" data-aos="zoom-in" data-aos-delay="300">
                <img src="img/asrama putri.jpeg" alt="Asrama Santri Putri">
                <div class="gradient-overlay">
                    <h3><span>Kawasan Asrama Putri </span>ASRAMA SANTRI PUTRI</h3>
                </div>
            </div>
            <!-- ⚠️ UBAH MANUAL: Ganti foto asrama putri di folder img/asrama-putri.jpg -->
            <div class="campus-card" data-aos="zoom-in" data-aos-delay="300">
                <img src="img/fasilitas.jpeg" alt="Asrama Santri Putri">
                <div class="gradient-overlay">
                    <h3><span>Pembelajaran Moderen </span>Fasilitas Lab Komputer</h3>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Fasilitas -->
<div class="section-wrapper" id="galeri">
    <section class="facilities">
        <div class="section-header">
            <h2 data-aos="fade-up">Galeri Kegiatan Pondok Pesantren</h2>
            <div class="line-divider"></div>
            <p class="section-desc" data-aos="fade-up" data-aos-delay="150">Beberapa kegiatan rutinan pondok pesantren sebagai implementasi penyebaran ajaran ahlus sunnah wal jamaah.</p>
        </div>

        <div class="gallery-slider-wrapper">

    <button class="slider-btn prev">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <div class="grid-layout" id="gallerySlider">
            <!-- ⚠️ UBAH MANUAL: Ganti foto masjid di folder img/masjid.jpg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="100">
                <div class="facility-img-wrapper"><img src="img/kajian kitab salaf.jpeg" alt="Kajian"></div>
                <h3>Kajian Kitab Salaf</h3>
                <p>Kajian Kitab Salaf merupakan kegiatan rutin yang bertujuan untuk memperdalam pemahaman santri terhadap kitab-kitab klasik karya para ulama terdahulu, dimulai dari mempelajari ilmu akidah, fikih, akhlak, tafsir, dan hadis dan masih banyak lagi.</p>
            </div>
            <!-- ⚠️ UBAH MANUAL: Ganti foto asrama di folder img/khotmil quran.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="200">
                <div class="facility-img-wrapper"><img src="img/khotmil quran.jpeg" alt="Khotmil Qur'an"></div>
                <h3>Khotmil Qur'an Putra & Putri</h3>
                <p>Khotmil Qur'an adalah kegiatan yang dilaksanakan sebagai bentuk rasa syukur atas selesainya pembacaan Al-Qur'an secara keseluruhan oleh para santri. Acara ini diisi dengan pembacaan doa khatmil Qur'an, dzikir, serta tausiyah.</p>
            </div>
            <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/Pengajian.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Pengajian Akbar & Haul Abuya</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
             <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/upacara.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Upacara Memperingati Hari Santri</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
             <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/lomba.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Lomba Madrasah Diniyah</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
             <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/pramuka.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Kegiatan Ekstrakurikuler Pramuka</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
             <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/sholat_jamaah.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Kegiatan Sholat Berjamaah</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
             <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/santri_putri.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Kajian Kitab Santri Putri</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
             <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/pembelajaranMA.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Kegiatan Pembelajaran Madrasah</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
             <!-- ⚠️ UBAH MANUAL: Ganti foto laboratorium di folder img/Pengajian.jpeg -->
            <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-img-wrapper"><img src="img/fasilitas.jpeg" alt="Pengajian Akbar & Haul Abuya"></div>
                <h3>Fasilitas Lab Komputer</h3>
                <p>Pengajian Akbar merupakan kegiatan dakwah yang diselenggarakan oleh Pondok Pesantren Riyadlus Sholihin Al Islamy yang dihadiri para ulama, habaib, dan kyai. Kegiatan ini diikuti oleh wali santri dan masyarakat.</p>
            </div>
         <button class="slider-btn next">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

</div>
    </section>
</div>

<!-- Testimonials -->
<div class="section-wrapper">
    <section class="testimonials">
        <div class="section-header">
            <h2 data-aos="fade-up">Testimonial</h2>
            <div class="line-divider"></div>
        </div>

        <div class="testimonial-grid">
            <!-- ⚠️ UBAH MANUAL: Ganti foto wajah user1 di folder img/user1.jpg -->
            <div class="testimonial-card" data-aos="fade-right" data-aos-delay="100">
                <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <div class="profile-area">
                    <img src="img/alumni.jpeg" alt="Testimoni">
                    <div>
                        <h3>Al Habib Abbas Bin Abu bakar Al Hadad</h3>
                        <span>Alumni - Mahad Darullughah Wadda'wah Bangil Surabaya</span>
                    </div>
                </div>
                <p>"Pondok Pesantren Riyadlus Sholihin Al Islamy merupakan lembaga pendidikan yang istiqamah dalam membimbing para santri untuk mencintai Al-Qur'an, mempelajari ilmu agama, dan meneladani akhlak Rasulullah SAW. Semoga Allah SWT senantiasa melimpahkan keberkahan, kemudahan, serta menjadikan pondok ini sebagai tempat lahirnya generasi yang saleh, berilmu, dan bermanfaat bagi umat."</p>
            </div>
            <!-- ⚠️ UBAH MANUAL: Ganti foto wajah user2 di folder img/user2.jpg -->
            <div class="testimonial-card" data-aos="fade-left" data-aos-delay="200">
                <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <div class="profile-area">
                    <img src="img/alumni1.jpeg" alt="Testimoni">
                    <div>
                        <h3>Al Habib Musthofa Bin Abdullah AlAydrus</h3>
                        <span>Pimpinan Majlis Ratib AlAydrus Jakarta</span>
                    </div>
                </div>
                <p>"Pendidikan di Pondok Pesantren Riyadlus Sholihin Al Islamy tidak hanya berfokus pada ilmu pengetahuan, tetapi juga pada pembentukan karakter dan akhlak yang luhur. Semoga Allah SWT senantiasa menjaga, memberkahi, dan memajukan pondok ini agar terus menjadi pusat dakwah dan pendidikan Islam yang membawa rahmat bagi umat."</p>
            </div>
        </div>
    </section>
</div>

<!-- Grand Call To Action -->
<!-- ⚠️ UBAH MANUAL: Ganti latar belakang banner2 di folder img/banner2.jpg (opsional jika ingin kustomisasi gambar) -->
<div class="cta-wrapper-outer" style="background-image: linear-gradient(135deg, rgba(3, 20, 18, 0.95), rgba(16, 185, 129, 0.4)), url('img/asrama dan masjid.png');">
    <section class="cta" data-aos="zoom-in">
        <h2>Penerimaan Santri Baru</h2>
        <a href="daftar.php" class="hero-btn">
            AMBIL FORMULIR ONLINE SEKARANG <i class="fa-solid fa-user-shield"></i>
        </a>
    </section>
</div>

<!--======================
        FOOTER
=======================-->

<footer class="footer" id="kontak">

<div class="footer-top">

<div class="footer-wave"></div>

<div class="footer-container">

<!-- Logo -->

<div class="footer-about">

<img src="img/logo pondok.png" class="footer-logo">

<h2>Ponpes Riyadlus Sholihin Al Islamy</h2>

<p>

Mencetak generasi muslim yang beriman,
berilmu, berakhlakul karimah,
serta istiqomah di atas Al-Qur'an
dan As Sunnah Ahlussunnah Wal Jama'ah.

</p>

<div class="social-media">

<a href="https://wa.me/6281234567890" target="_blank">

<i class="fab fa-whatsapp"></i>

</a>

<a href="https://www.instagram.com/riyadlussholihin.alislamy?igsh=MTA0cmdwMGFqMmx1NQ==" target="_blank">

<i class="fab fa-instagram"></i>

</a>

<a href="https://www.youtube.com/@riyadlussholihinalislamy" target="_blank">

<i class="fab fa-youtube"></i>

</a>

</div>

</div>

<!-- Menu -->

<div class="footer-menu">

<h3>Menu Cepat</h3>

<ul>

<li><a href="#">Beranda</a></li>

<li><a href="index.php#profil">Profil</a></li>

<li><a href="daftar.php">PPDB</a></li>

<li><a href="index.php#galeri">Galeri</a></li>

<li><a href="login.php">Admin</a></li>

</ul>

</div>

<!-- Program -->

<div class="footer-program">

<h3>Program Unggulan</h3>

<ul>

<li><i class="fas fa-check-circle"></i> Tahfidz Qur'an</li>

<li><i class="fas fa-check-circle"></i> Kajian Kitab Salaf</li>

<li><i class="fas fa-check-circle"></i> Madrasah Diniyah</li>

<li><i class="fas fa-check-circle"></i> Bahasa Arab</li>

<li><i class="fas fa-check-circle"></i> Dakwah Islamiyah</li>

</ul>

</div>

<!-- Kontak -->

<div class="footer-contact">

<h3>Hubungi Kami</h3>

<p>

<i class="fas fa-location-dot"></i>

Desa Blibis RT 01 RW 02

Ngijo, Gunungpati

Semarang

</p>

<p>

<i class="fas fa-phone"></i>

<a href="tel:+6281234567890">

0812-3456-7890

</a>

</p>

<p>

<i class="fab fa-whatsapp"></i>

<a href="https://wa.me/6281234567890">

WhatsApp Admin

</a>

</p>

<p>

<i class="fas fa-envelope"></i>

<a href="mailto:ppdb@riyadlussholihin.sch.id">

ppdb@riyadlussholihin.sch.id

</a>

</p>

<p>

<i class="fas fa-map-location-dot"></i>

<a target="_blank"

href="https://maps.app.goo.gl/HvwXpd1SpQ699eik8">

Lihat Google Maps

</a>

</p>

</div>

</div>

</div>

<!-- Statistik -->

<div class="footer-stat">

<div>

<h2>1500+</h2>

<span>Santri</span>

</div>

<div>

<h2>25+</h2>

<span>Tahun Berdiri</span>

</div>

<div>

<h2>50+</h2>

<span>Pengajar</span>

</div>

<div>

<h2>30+</h2>

<span>Program</span>

</div>

</div>

<!-- MAP -->

<div class="footer-map">

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3959.4628826031376!2d110.3816037!3d-7.0722085!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70897d16f7bbe3%3A0xc2f45a290bb4a3d9!2sPondok%20Pesantren%20Riyadlus%20Sholihin!5e0!3m2!1sid!2sid!4v1785092751674!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>

</div>

<!-- Bottom -->

<div class="footer-bottom">

<p>

© 2026 Pondok Pesantren Riyadlus Sholihin Al Islamy

</p>

<p>

GUNUNG PATI, SEMARANG

</p>

</div>

</footer>

<!-- AOS Script & Hamburger Logic -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    // Header scroll background effect
    window.addEventListener('scroll', function() {
        const header = document.getElementById('mainHeader');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Mobile Menu Toggle
    function toggleMobileMenu() {
        const navLinks = document.getElementById('navLinks');
        const menuBtn = document.getElementById('mobileMenuBtn');
        navLinks.classList.toggle('active');
        menuBtn.classList.toggle('open');
    }
</script>
<script>

const slider=document.getElementById("gallerySlider");

const next=document.querySelector(".slider-btn.next");

const prev=document.querySelector(".slider-btn.prev");

next.addEventListener("click",()=>{

    slider.scrollBy({

        left:slider.clientWidth,

        behavior:"smooth"

    });

});

prev.addEventListener("click",()=>{

    slider.scrollBy({

        left:-slider.clientWidth,

        behavior:"smooth"

    });

});

</script>
</body>
</html>