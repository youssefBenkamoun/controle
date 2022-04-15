<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  if(isset($_SESSION['employe'])){

 ?>
<div class="container">
    <div class="section-title">
          <h2>Gestion des professeurs</h2>
          
        </div>

<div class="container-fluid">
    <div class="card bg-white" >
        
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="cin">CIN : </label>
                    <input class="" type="text" id="id" hidden>
                    <input class="form-control" type="text" id="cin" >

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="nom">Nom : </label>
                    <input class="form-control" type="text" id="nom" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="prenom">Prenom : </label>
                    <input class="form-control" type="text" id="prenom" >

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="email">Email : </label>
                    <input class="form-control" type="email" id="email" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="telephone">Telephone : </label>
                    <input class="form-control" type="tel" id="telephone" >

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="n_drp">N_drp : </label>
                    <input class="form-control" type="text" id="n_drp" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="naissance">Date_naissance : </label>
                    <input class="form-control" type="date" id="naissance" >

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="recrutement">Date_recrutement : </label>
                    <input class="form-control" type="date" id="recrutement" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="directeur">password : </label><br>
                    <input class="form-control" type="text" id="password" required>
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="specialite">specialite : </label><br>
                    <select id="specialite" class="custom-select" required></select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="structure">structure : </label>
                    <input class="form-control" type="text" id="structure" required>
                </div>
                <div class="col-sm-6 mb-2">
                    <label for="directeur">directeur : </label><br>
                    <input class="form-control" type="text" id="directeur" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="ensa">a_Ensa : </label><br> 
                    Oui <input type="radio" id="ensa" name="ensa" value="true" />
                    Non <input type="radio" id="ensa" name="ensa" value="false" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="photo">Photo : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="file" >
                        <label class="custom-file-label" for="photo">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="pedagogique">Dossier_Pedagogique : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pedagogique" name="file" >
                        <label class="custom-file-label" for="pedagogique">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="administratif">Dossier_administratif : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="administratif" name="file" >
                        <label class="custom-file-label" for="administratif">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="scientifique">Dossier_scientifique : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scientifique" name="file" >
                        <label class="custom-file-label" for="scientifique">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-primary mt-3 mb-3" id="btn">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="container">
            <div class="row table-responsive m-auto rounded">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr class="text-uppercase bg-light">
                            <th scope="col">Photo</th>
                            <th scope="col">id</th>
                            <th scope="col">Cin</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">naissance</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Email</th>
                            <th scope="col">n_drp</th>
                            <th scope="col">Specialite</th>
                            <th scope="col">Recrutement</th>
                            <th scope="col">structure</th>
                            <th scope="col">directeur</th>
                            <th scope="col">Pedagogique</th>
                            <th scope="col">Administratif</th>
                            <th scope="col">Scientifique</th>
                            <th scope="col">A_ENSA</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Profil</th>
                        </tr>
                    </thead>
                    <tbody id="table-content">

                    </tbody>
                </table>
            </div>
        </div>
    
</div>
<script src="script/departement.js" type="text/javascript"></script>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
