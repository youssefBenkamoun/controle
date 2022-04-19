<?php
//$y=$_GET['id'];
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
  if(isset($_SESSION['employe'])){
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Candidature - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <link rel='stylesheet' href='../vendor/bootstrap-4.1/bootstrap.min.css'>
    <link rel='stylesheet' href='../vendor/font-awesome-5/css/fontawesome-all.min.css'>
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/theme.css">
    <link rel="stylesheet" href="../style/main.css">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

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
        <img src="../img/<?php
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
          <a href="../logout.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Deconnexion</span></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="../profil.php" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>Home</span></a></li>
          
          <li><a href="pages/setting.php?id=<?php echo $_SESSION['employe']; ?>" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Modifier</span></a></li>
          
          
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  

  <main id="main">

   <div class="container-fluid">
    <div class="card bg-white" >
        <div class="card-header card-color">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Modifier les données</p>
        </div>
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="cin" class="control-label"><strong>CIN : </strong></label>
                    <input class="" type="text" id="id" value="<?php echo $_SESSION['id'];?>" hidden>
                    <input class="form-control" type="text" id="cin" value="<?php echo $_SESSION['employe'];?>">

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="nom" class="control-label"><strong>Nom :</strong> </label>
                    <input class="form-control" type="text" id="nom" value="<?php echo $_SESSION['nom'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="prenom"><strong>Prenom : </strong></label>
                    <input class="form-control" type="text" id="prenom" value="<?php echo $_SESSION['prenom'];?>">

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="email"><strong>Email : </strong></label>
                    <input class="form-control" type="email" id="email" value="<?php echo $_SESSION['email'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="telephone"><strong>Telephone : </strong></label>
                    <input class="form-control" type="tel" id="telephone" value="<?php echo $_SESSION['telephone'];?>">

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="n_drp"><strong>N_drp :</strong> </label>
                    <input class="form-control" type="text" id="n_drp" value="<?php echo $_SESSION['n_drp'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="naissance"><strong>Date_naissance :</strong> </label>
                    <input class="form-control" type="date" id="naissance" value="<?php echo $_SESSION['naissance'];?>">

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="recrutement"><strong>Date_recrutement : </strong></label>
                    <input class="form-control" type="date" id="recrutement" value="<?php echo $_SESSION['recrutement'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="directeur"><strong>password : </strong></label><br>
                    <input class="form-control" type="text" id="password" required value="<?php echo $_SESSION['password'];?>">
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="specialite"><strong>specialite :</strong> </label><br>
                    <input class="" type="text" id="help" value="<?php echo $_SESSION['photo'];?>" hidden>
                    <select id="specialite" class="custom-select"  required></select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="structure"><strong>structure : </strong></label>
                    <input class="form-control" type="text" id="structure" value="<?php echo $_SESSION['structure'];?>" required>
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="directeur"><strong>directeur : </strong></label><br>
                    <input class="form-control" type="text" id="directeur" value="<?php echo $_SESSION['directeur'];?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="ensa" class=""><strong>a_Ensa : </strong></label><br> 
                    Oui <input type="radio" id="ensa" name="ensa" value="true" />
                    Non <input type="radio" id="ensa" name="ensa" value="false" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="photo"><strong>Photo : </strong></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="file" value="<?php echo $_SESSION['photo'];?>">
                        <label class="custom-file-label" for="photo">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="pedagogique"><strong>Dossier_Pedagogique : </strong></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pedagogique" name="file" value="<?php echo $_SESSION['pedagogique'];?>">
                        <label class="custom-file-label" for="pedagogique">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="administratif"><strong>Dossier_administratif :</strong> </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="administratif" name="file" value="<?php echo $_SESSION['administratif'];?>">
                        <label class="custom-file-label" for="administratif">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="scientifique"><strong>Dossier_scientifique : </strong></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scientifique" name="file" value="<?php echo $_SESSION['scientifique'];?>">
                        <label class="custom-file-label" for="scientifique">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Modifier</button>
                    <a href="../profil.php"><button type="button" class="btn btn-outline-success mt-3 mb-3" id="">profil</button></a>
                </div>
            </div>
            
        </div>
    </div>
</div>

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/typed.js/typed.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src='../vendor/jquery-3.2.1.min.js'></script>
<script src="../script/setting.js" type="text/javascript"></script>
</body>

</html>
<?php

}else{
  header("Location: ../index.php");
}
 ?>