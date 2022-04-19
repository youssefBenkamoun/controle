<?php 
$uri = $_SERVER['REQUEST_URI']; 

$url_components = parse_url($uri);

parse_str($url_components['query'], $params);
      
if(isset($params['email'])){
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Candidature - Login</title>

        <!-- Fontfaces CSS-->
        <link href="style/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="style/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition" style="">
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container" >
                    <div class="login-wrap" style="padding-top: 0px;">
                        <div class="login-content" style="padding-top: 10px;">
                            <div class="login-logo" style="padding-bottom: 0px;">
                                <a href="./">
                                    <span class="h2 text-dark">Register</span>
                                </a>
                            </div>
                            <div class="login-form" id="opa">
                                <div id="login-form"></div>
                                
                                
                                    <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 mb-2">
                                            <label for="prenom">Prenom : </label>
                                            <input class="form-control" type="text" id="prenom" required placeholder="prenom">

                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <label for="nom">Nom : </label>
                                            <input class="form-control" type="text" id="nom" required placeholder="nom">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 mb-2">
                                            <label for="cin">CIN : </label>
                                            <input class="form-control" type="text" id="cin"  placeholder="cin" required>

                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <label for="naissance">Date_naissance : </label>
                                            <input class="form-control" type="date" id="naissance" required >
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="specialite">specialite : </label>
                                        <select id="specialite" class="custom-select" required></select>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="form-control" type="text" id="lala" value="<?php echo $params['email']; ?>"  readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" id="password" required name="password" placeholder="Password">
                                    </div>
                                    <div class=" float-right">
                                        <label>
                                            <a href="./login.php">authentification</a>
                                        </label>
                                    </div>
                                    <button id="register" name="btn_submit" class="btn au-btn--block btn-outline-success" type="submit">Valider</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>


        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="script/main.js" type="text/javascript"></script>
        <script src="script/register.js" type="text/javascript"></script>
    </body>

</html>
<!-- end document-->
<?php
}else{
    header('Location: login.php');
}
?>