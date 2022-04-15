<?php

include_once 'classes/Departement.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class DepartementService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `professeurs`(`id`, `nom`, `prenom`, `photo`, `cin`, `n_drp`, `date_naissance`, `date_recrutement`, `email`, `telephone`, `specialite`, `prof_a_ensa`, `structure`, `directeur`, `dossier_scientifique`, `dossier_pedagogique`, `dossier_administratif`, `point`,`password`,`attente`)"
                . "VALUES (0,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'en_attente')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getPhoto(), $o->getCin(), $o->getNdrp(), $o->getNaissance(), $o->getRecrutement(), $o->getEmail(), $o->getTelephone(), $o->getSpecialite(),
                    $o->getEnsa(), $o->getStructure(), $o->getDirecteur(), $o->getScientifique(), $o->getPedagogique(), $o->getAdministratif(), $o->getPoint(), $o->getPassword())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM `professeurs` WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select e.* , f.nom as 'nomf' from `professeurs` e inner join fonction f on e.specialite = f.id ";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($cin) {
        $query = "select * from `professeurs` where cin =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $employe = new Professeur($res->id,$res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->n_drp, $res->date_recrutement, $res->date_naissance, $res->photo, $res->specialite, $res->directeur,$res->structure,$res->dossier_administratif,$res->dossier_pedagogique,$res->dossier_scientifique,$res->prof_a_ensa,$res->point,$res->password,$res->attente);
        return $employe;
    }
    public function findByCin($cin) {
        $query = "select * from `professeurs` where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $employe = new Professeur($res->id,$res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->n_drp, $res->date_recrutement, $res->date_naissance, $res->photo, $res->specialite, $res->directeur,$res->structure,$res->dossier_administratif,$res->dossier_pedagogique,$res->dossier_scientifique,$res->prof_a_ensa,$res->point,$res->password,$res->attente);
        return $employe;
    }

    public function findByAttente() {
        $query = "select * from `professeurs` where attente ='en_attente' ";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        return $s;
    }
    public function accepte($o) {
        $query = "UPDATE `professeurs` SET `attente`='accepter' where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o)) or die('Error');
    }
    public function refuser($o) {
        $query = "UPDATE `professeurs` SET `attente`='refuser' where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o)) or die('Error');
    }
    
    public function findByEmail($email) {
        $query = "select * from `professeurs` where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($s) != 0) {
            foreach ($s as $res) {
                $cin = $res->cin;
        }
            return $cin;
        } else
            return -1;
        /* $employe = new Employe($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->photo, $res->fonction, $res->departement);
          return $employe; */
    }

   
    public function update($o) {
        $query = "UPDATE `professeurs` SET `nom`=?,`prenom`=?,`photo`=?,`cin`=?,`n_drp`=?,`date_naissance`=?,`date_recrutement`=?,`email`=?,`telephone`=?,`specialite`=?,`prof_a_ensa`=?,`structure`=?,`directeur`=?,`dossier_scientifique`=?,`dossier_pedagogique`=?,`dossier_administratif`=?,`point`=?,`password`=?,`attente`=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getPhoto(), $o->getCin(), $o->getNdrp(), $o->getNaissance(), $o->getRecrutement(), $o->getEmail(), $o->getTelephone(), $o->getSpecialite(),
                    $o->getEnsa(), $o->getStructure(), $o->getDirecteur(), $o->getScientifique(), $o->getPedagogique(), $o->getAdministratif(), $o->getPoint(), $o->getPassword(),$o->getAttente(), $o->getId())) or die('Error');
    }

}
