<?php
session_start();
$message = "";
if (isset($_POST['btn_submit'])) {
    if ($_POST['email'] != '' && $_POST['password'] != '') {
        include_once 'classes/Departement.php';
        include_once 'services/DepartementService.php';
        $es = new DepartementService();
        $cin = $es->findByEmail($_POST['email']);
        $em = $es->findById($cin);
        if ($em->getPassword() == md5($_POST['password'])) {
            $_SESSION['employe'] = $em->getCin();
            $_SESSION['photo'] = $em->getPhoto();
            $_SESSION['nom'] = $em->getNom();
            $_SESSION['prenom'] = $em->getPrenom();
            $_SESSION['role'] = $em->getPoint();
            $_SESSION['n_drp'] = $em->getNdrp();
            $_SESSION['telephone'] = $em->getTelephone();
            $_SESSION['naissance'] = $em->getNaissance();
            $_SESSION['recrutement'] = $em->getRecrutement();
            $_SESSION['directeur'] = $em->getDirecteur();
            $_SESSION['structure'] = $em->getStructure();
            $_SESSION['specialite'] = $em->getSpecialite();
            $_SESSION['prof_ensa'] = $em->getEnsa();
            $_SESSION['id'] = $em->getId();
            $_SESSION['password'] = $em->getPassword();
            $_SESSION['pedagogique'] = $em->getPedagogique();
            $_SESSION['administratif'] = $em->getAdministratif();
            $_SESSION['scientifique'] = $em->getScientifique();
            $_SESSION['email'] = $em->getEmail();
            header('Location:./index.php');
        }
        else{
          header('Location:./login.php?error=invalid');
        }
    } else {
        header('Location:./login.php?error=vide');
    }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Candidature</title>
    <link rel="stylesheet" href="style\style1.css">
  </head>
  <body>
  <form action="" method="post">
<div class="login-box">
  <h1>login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
        <input type="text" id="email" name="email" placeholder="Email">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" id="password" name="password" placeholder="Password">
  </div>

  <!--<input type="button" class="btn" name="connecter" value="Sign in">-->
  <button id="connect" name="btn_submit" class="btn" type="submit">Connexion</button>
  </form>
  <button class="btn"><a href="./verification.php" style="color: white;text-decoration: none">Register</a></button>
  <div class="float-lg-start">
        <label>
            <a href="./forget.php" style="text-decoration: none"><p style="color: white;">Mot de passe oublié !!</p></a>
        </label>
    </div>
</div>

  </body>
</html>
