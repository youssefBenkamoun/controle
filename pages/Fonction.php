<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  if(isset($_SESSION['employe'])){

 ?>
<div class="container">

        <div class="section-title">
          <h2>Gestion des spécialités</h2>
          
        </div>

        

    <div class="" >
        
        <div class="card-body container-fluid" >
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label for="code">Code : </label>
                    <input class="" type="text" id="id" hidden>
                    <input class="form-control" type="text" id="code" required>

                </div>
                <div class="col-sm-6 mb-2">
                    <label for="nom">Nom : </label>
                    <input class="form-control" type="text" id="nom" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Ajouter</button>
                </div>
            </div>
            <div class="">
                <table class="table">
                    <thead class="table-primary">
                        <tr class="text-uppercase bg-light">
                            <th scope="col">Id</th>
                            <th scope="col">Code</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Modifier</th>
                        </tr>
                    </thead>
                    <tbody id="table-content">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script src="script/fonction.js" type="text/javascript"></script>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
