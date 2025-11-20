<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="Web site created using create-react-app">
    <title>Fortezza Quartz - Home</title>
    <link rel="icon" href="/favi.png">
    <link rel="apple-touch-icon" href="/favi.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('resources/css/coante.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/coante.css') }}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
    <!--<< Magnific popup.css >>-->
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('/css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('/css/swiper-bundle.min.css') }}">
    <!--<< NiceSelect.css >>-->
    <link rel="stylesheet" href="{{ asset('/css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/project.css') }}">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <!--<< Favcion >>-->
  
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

        :root {
            --qc-dark-bg: #1a1a1a;
            --qc-text-color: #f0f0f0;
            --qc-accent-color: #e09145;
            --qc-light-accent: #f0a055;
            --qc-card-bg: #2a2a2a;
            --qc-border-color: #444;
        }

        /* Basic reset, if not already present in your main CSS */
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--qc-dark-bg);
            /* Use if this is the only section on dark background */
            color: var(--qc-text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .qc-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .qc-quartz-collection-section {
            background: linear-gradient(to right, #1a1a1a 0%, #1a1a1a 50%, #2e2e2e 100%);
            padding: 60px 0;
            background-image: url('assets/images/bg/introBg2_2.jpg');
            /* Replace with your actual dark marble texture */
            background-size: cover;
            background-position: center;
        }

        .qc-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .qc-header-left {
            flex: 1;
            min-width: 300px;
        }

        .qc-header-left p {
            font-size: 0.9em;
            color: var(--qc-accent-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .qc-header-left h1 {
            font-size: 2.8em;
            font-weight: 700;
            margin: 0;
            line-height: 1.1;
        }

        .qc-header-right {
            display: flex;
            gap: 15px;
        }

        .qc-nav-button {
            background-color: transparent;
            border: 2px solid #fff;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: var(--qc-dark-bg);
            font-size: 1.2em;
        }

        .qc-nav-button:hover {
            background-color: #fff;
        }

        /* --- Carousel Specific Styles --- */
        .qc-carousel-wrapper {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-bottom: 20px;
        }

        .qc-collections-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            will-change: transform;
        }

        .qc-collection-card {
            min-width: 280px;
            flex: 0 0 auto;
            margin-right: 30px;
            background-color: var(--qc-card-bg);
            border: 1px solid var(--qc-border-color);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .qc-collection-card:last-child {
            margin-right: 0;
        }

        .qc-collection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        .qc-card-header-icon {
            background-color: #3a3a3a;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid var(--qc-border-color);
            height: 60px;
        }

        .qc-card-header-icon img {
            max-width: 33px;
            height: auto;
            /* filter: invert(1); */
        }

        .qc-card-header-icon span {
            font-size: 1.2em;
            font-weight: 600;
            margin-left: 10px;
            text-transform: uppercase;
        }

        .qc-card-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .qc-card-footer {
            background-color: #3a3a3a;
            padding: 15px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-top: 1px solid var(--qc-border-color);
        }

        .qc-card-footer .qc-arrow-button {
            /* Updated child selector */
            background-color: transparent;
            border: 2px solid #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: var(--qc-dark-bg);
            font-size: 1em;
        }

        .qc-card-footer .qc-arrow-button:hover {
            background-color: transparent;
        }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .qc-collections-track {
                margin-left: 20px;
                margin-right: 20px;
            }
        }

        @media (max-width: 992px) {
            .qc-collection-card {
                min-width: 300px;
            }
        }

        .cataloo-btn{
                margin-left: 22px;
            }
        @media (max-width: 768px) {
            .cataloo-btn{
                margin-left: 5px;
            }
            .nav-container {
  display: flex;
  justify-content: space-between;
}
            .main-content {
                 min-height: 100vh;
     background-image: url('assets/images/shop-prod/valtheris-1.webp');
     background-repeat: no-repeat;
 }
            .qc-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .qc-header-left h1 {
                font-size: 2.2em;
            }

            .qc-header-right {
                margin-top: 20px;
            }

            .qc-collection-card {
                min-width: calc(100% - 40px);
                margin-left: 20px;
                margin-right: 20px;
            }

            .qc-collections-track {
                margin-left: 0;
                margin-right: 0;
            }
        }

        @media (max-width: 480px) {
            .mobi-pd{
                padding: 62px;
            }
            .qc-header-left h1 {
                font-size: 1.8em;
            }

            .qc-nav-button {
                width: 40px;
                height: 40px;
                font-size: 1em;
            }

            .qc-collection-card {
                min-width: calc(100% - 40px);
            }
        }
        /* Basic nav styles */
.nav-container {
  display: flex;
  /* justify-content: space-between; */
  align-items: center;
  padding: 15px 30px;
  background: #000;
  color: #fff;
  position: relative;
  z-index: 1000;
  gap: 168px;
}

.mobile-menu-button button {
  background: none;
  border: none;
  font-size: 28px;
  color: #fff;
  cursor: pointer;
}

/* Fullscreen Menu */
.mobile-menu {
  position: fixed;
  top: 0;
  right: -100%;
  width: 100%;
  height: 100vh;
  background: #111;
  color: #fff;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: right 0.4s ease;
  z-index: 999;
  
}

.mobile-menu.active {
  right: 0;
}

.close-btn {
  position: absolute;
  top: 25px;
  right: 30px;
  background: none;
  border: none;
  font-size: 36px;
  color: #fff;
  cursor: pointer;
}

/* Menu Links */
.mobile-menu-links {
  list-style: none;
  padding: 0;
  text-align: center;
}

.mobile-menu-links li {
  margin: 15px 0;
}

.mobile-menu-links a {
  color: #fff;
  font-size: 22px;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s;
}

.mobile-menu-links a:hover {
  color: #b59a6b; /* Fortezza gold tone */
}

/* Get a Quote Button */
.quote-btn {
  background: #ffffff;
  color: #000000;
  padding: 12px 30px;
  border-radius: 30px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s;
}

.quote-btn:hover {
  background: #a0845c;
}


/* Desktop menu visible by default on large screens */
.desktop-menu {
  display: flex;
  gap: 20px;
  list-style: none;
}

.mobile-menu-button,
.mobile-menu {
  display: none; /* hide mobile menu on desktop */
}

/* Mobile styles */
@media (max-width: 992px) {
  .desktop-menu {
    display: none; /* hide desktop menu on mobile */
  }
  .mobile-menu-button {
    display: block;
  }
}
.mobile-menu {
  display: none; /* hidden by default */
  position: fixed;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.95);
  z-index: 9999;
  overflow-y: auto;
  
  padding-top: 50px;
}

.mobile-menu-links {
  list-style: none;
  text-align: center;
}

.mobile-menu-links li {
  margin: 20px 0;
}

.mobile-menu-links a {
  color: white;
  text-decoration: none;
  font-size: 20px;
}











.arrow-svg{
    width: 5%;
}
    </style>
</head>

<body>