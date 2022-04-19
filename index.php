<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["employe"]) {
    if ($_SESSION['role'] == "admin") {
?>
<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <title>Gestion candidature</title>

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
    <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
    <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    

    <script src='vendor/jquery-3.2.1.min.js'></script>
    <script src='vendor/bootstrap-4.1/popper.min.js'></script>
    <script src='vendor/bootstrap-4.1/bootstrap.min.js'></script>
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="img/<?php
                            if (isset($_SESSION['photo'])) {
                                echo $_SESSION['photo'];
                            } else
                                echo 'no-photo.png'
                                ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php
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
          <li><a href="./admin.php" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>Profile</span></a></li>
          <li><a href="./index.php?p=departement" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Professeurs</span></a></li>
          <li><a href="./index.php?p=fonction" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Specialite</span></a></li>
          <li><a href="./etat.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>En attente</span></a></li>
          
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid" id="main-content">

                <?php
                    if( isset($_GET['p']) && $_GET['p'] != ""){
                        if($_GET['p']=="departement"){
                            include_once './pages/departement.php';
                        }elseif ($_GET['p']=="employe"){
                            include_once './pages/employe.php';
                        }elseif($_GET['p']=="fonction"){
                            include_once './pages/Fonction.php';
                        }elseif($_GET['p']=="pointage"){
                            include_once './pages/Pointage.php';
                        }elseif($_GET['p']=="historique"){
                            include_once './pages/historique.php';
                        }elseif($_GET['p']=="statistiques"){
                            include_once './pages/statistiques.php';
                        }
                    }else{
                        header('Location: ./admin.php');
                    }
                ?>
            </div>

        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="script/index.js"></script>

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