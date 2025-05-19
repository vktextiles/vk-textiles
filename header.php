<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>VkTextiles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap");

    body {
      margin: 0;
      padding: 0;
      font-family: "Nunito", sans-serif;
    }

    .top-header {
      position: fixed;
      top: 10px;
      left: 0;
      right: 0;
      width: 80%;
      margin: 0 auto;
      background: #fff;
      z-index: 1000;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 0.7rem 1.2rem;
      border-radius: 10px;
      transition: all 0.3s ease-in-out;
    }

    /* When scrolled */
    .top-header.scrolled {
      top: 0;
      width: 99%;
      border-radius: 0 0 10px 10px;
    }

    .top-header .logo {
      width: 60%;
      border-radius: 50%;
      animation: popIn 0.8s ease-out;
    }

    .brand-name {
      font-size: 1.5rem;
      font-weight: 700;
      margin-left: 10px;
      color: rgb(11, 117, 122);
      font-family: 'Segoe UI', sans-serif;
    }

    .btn-call {
      background: rgb(11, 117, 122) !important;
      color: #fff !important;
      font-weight: 600 !important;
      padding: 8px 20px !important;
      border-radius: 30px !important;
      transition: all 0.3s ease-in-out !important;
      box-shadow: 0 0 8px rgba(13, 110, 253, 0.3) !important;
    }

    .btn-call:hover {
      background: rgb(11, 117, 122);
      transform: scale(1.05);
      color: white;
    }

    .hero-header {
      background: url('img/mainbackgroundbanner_1.webp') no-repeat center center/cover;
      height: 400px;
      padding-top: 120px;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
      position: relative;
      background-attachment: fixed;
    }

    .hero-header::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.4);
      z-index: 1;
    }

    .hero-header>* {
      z-index: 2;
      position: relative;
    }

    .display-4 {
      color: #fff;
      animation: fadeInDown 1.2s ease-in-out;
    }

    .highlight {
      padding: 0.3em 0.6em;
      border-radius: 10px;
      color: white;
    }

    .animate-subtext {
      animation: fadeInUp 1.4s ease-in-out;
      font-size: 1.25rem;
    }

    @media only screen and (max-width: 800px) {
      .top-header {
        width: 96% !important;
      }
    }

    @keyframes popIn {
      0% {
        transform: scale(0);
        opacity: 0;
      }

      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    @keyframes fadeInDown {
      0% {
        transform: translateY(-30px);
        opacity: 0;
      }

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes fadeInUp {
      0% {
        transform: translateY(30px);
        opacity: 0;
      }

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .header-btn {
      color: #fff;
      background: fixed;
      padding: 8px 16px;
      margin-bottom: 8px;
      border: none;
      border-radius: 30px;
      transition: all 0.3s ease-in-out;
      text-decoration: none;
      display: inline-block;
      font-weight: 500;
      color: rgb(11, 117, 122);
      font-size: 17px;
    }

    .header-btn:hover {
      background-color: rgb(0, 100, 44);
      color: #ffff;
      border-color: rgb(0, 100, 44);
      transform: translateX(5px);
    }

    /* Show toggle icon and hide menu on mobile */
    .menu-toggle {
      font-size: 28px;
      color: rgb(11, 117, 122);
      cursor: pointer;
      display: none;
      user-select: none;
      transition: color 0.3s ease;
    }

    /* MOBILE MENU */
    .mobile-menu {
      position: fixed;
      top: 75px;
      right: 10px;
      width: 200px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
      overflow: hidden;
      max-height: 0;
      opacity: 0;
      transition:
        max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1),
        opacity 0.4s ease,
        box-shadow 0.3s ease;
      z-index: 1500;
      display: flex;
      flex-direction: column;
    }

    .mobile-menu.show {
      max-height: 500px;
      opacity: 1;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
    }

    .mobile-menu .header-btn {
      padding: 12px 16px;
      font-weight: 600;
      color: rgb(11, 117, 122);
      border-bottom: 1px solid #eee;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .mobile-menu .header-btn:last-child {
      border-bottom: none;
    }

    .mobile-menu .header-btn:hover {
      background-color: rgb(0, 100, 44);
      color: white;
      border-radius: 0 0 12px 12px;
    }

    @media (max-width: 800px) {
      .top-header {
        width: 96% !important;
      }

      .desktop-menu {
        display: none !important;
      }

      .menu-toggle {
        display: block;
      }
    }
  </style>
</head>

<body>

  <!-- Header -->
  <div id="header" class="container top-header py-3">
    <div class="row d-flex justify-content-between align-items-center">

      <!-- Left: Logo -->
      <div class="col-8 col-sm-6 col-lg-3 d-flex align-items-center">
        <a href="index.php"><img src="img/sss.webp" alt="Logo" class="logo" /></a>
      </div>

      <!-- Right: Desktop Menu -->
      <div class="col-6 d-flex align-items-center justify-content-end desktop-menu">
        <a href="index.php" class="header-btn me-2"><i class="fas fa-home me-2"></i>Home</a>
        <a href="tel:+919885686760" class="header-btn me-2"><i class="fas fa-envelope me-2"></i>Contact</a>
        <a href="about.php" class="header-btn me-2"><i class="fas fa-info-circle me-2"></i>About Us</a>
      </div>

      <!-- Mobile Toggle Button -->
      <div class="col-4 d-flex justify-content-end d-md-none">
        <i id="menuToggle" class="fas fa-bars menu-toggle"></i>
      </div>
    </div>

    <!-- Mobile Menu Dropdown -->
  </div>

  <div id="mobileMenu" class="mobile-menu d-md-none">
    <a href="index.php" class="header-btn"><i class="fas fa-home me-2"></i>Home</a>
    <a href="tel:+919885686760" class="header-btn"><i class="fas fa-envelope me-2"></i>Contact</a>
    <a href="about.php" class="header-btn"><i class="fas fa-info-circle me-2"></i>About Us</a>
  </div>

  <!-- Hero -->

  <!-- Scroll effect script -->
  <script>
    const header = document.getElementById("header");
    window.addEventListener("scroll", () => {
      if (window.scrollY > 10) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  </script>

  <!-- Mobile menu toggle script -->
  <script>
    const menu = document.getElementById("mobileMenu");
    const toggleBtn = document.getElementById("menuToggle");

    toggleBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      menu.classList.toggle("show");

      if (menu.classList.contains("show")) {
        toggleBtn.classList.remove("fa-bars");
        toggleBtn.classList.add("fa-times");
      } else {
        toggleBtn.classList.remove("fa-times");
        toggleBtn.classList.add("fa-bars");
      }
    });

    window.addEventListener("click", () => {
      if (menu.classList.contains("show")) {
        menu.classList.remove("show");
        toggleBtn.classList.remove("fa-times");
        toggleBtn.classList.add("fa-bars");
      }
    });
  </script>

  <!-- Bootstrap and AOS scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
