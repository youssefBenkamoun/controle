<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["employe"]) {
    if ($_SESSION['role'] == "admin") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Candidature - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
    <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/theme.css">
    <link rel="stylesheet" href="style/main.css">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="img/<?php
                            if (isset($_SESSION['photo'])) {
                                echo $_SESSION['photo'];
                            } else
                                echo 'no-photo.png'
                                ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="auth.html"><?php
                                                    if (isset($_SESSION['nom'])) {
                                                        echo $_SESSION['nom'].' '.$_SESSION['prenom'];
                                                    }
                                                    ?></a></h1>
        <div class="nav-menu">
          <a href="logout.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Deconnexion</span></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="./admin.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Profile</span></a></li>
          <li><a href="./index.php?p=departement" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Professeurs</span></a></li>
          <li><a href="./index.php?p=fonction" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Specialite</span></a></li>
          <li><a href="./etat.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>En attente</span></a></li>
          
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" style="padding-left: 100px;">

        <div class="section-title">
          <h2>Profile Admin</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="img/<?php
                            if (isset($_SESSION['photo'])) {
                                echo $_SESSION['photo'];
                            } else
                                echo 'no-photo.png'
                                ?>" class="img-fluid" alt="">
          </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" style="padding-left: 30px" data-aos="fade-left">
            <h3>Information personnelle</h3>
            
            <div class="row">
              <div class="col-lg-6">
                <ul>
                    <li><i class=""></i></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Nom:</strong> <span><?php
                                                    if (isset($_SESSION['nom'])) {
                                                        echo $_SESSION['nom'];
                                                    }
                                                    ?></span></li>
                  
                  <li><i class="bi bi-chevron-right"></i> <strong>Prenom:</strong> <span><?php
                                                    if (isset($_SESSION['prenom'])) {
                                                        echo $_SESSION['prenom'];
                                                    }
                                                    ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>CIN:</strong> <span><?php
                                                    if (isset($_SESSION['employe'])) {
                                                        echo $_SESSION['employe'];
                                                    }
                                                    ?></span></li>
                  <li><i class=""></i></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php
                                                    if (isset($_SESSION['naissance'])) {
                                                        echo $_SESSION['naissance'];
                                                    }
                                                    ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Telephone:</strong> <span><?php
                                                    if (isset($_SESSION['telephone'])) {
                                                        echo $_SESSION['telephone'];
                                                    }
                                                    ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php
                                                    if (isset($_SESSION['email'])) {
                                                        echo $_SESSION['email'];
                                                    }
                                                    ?></span></li>
                </ul>
              </div>
              
                
            </div>
            
          </div>
            
            
            
        </div>

      </div>
        

    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>
<?php
    } else {
        header('Location:./profil.php');
    }
} else {
    header('Location:./login.php');
}
?>