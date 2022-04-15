<?php

chdir('..');
include_once 'services/DepartementService.php';
extract($_POST);

$es = new DepartementService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $es->create(new Professeur(0,$cin, $nom, $prenom, $email, $telephone, $n_drp, $date_recrutement, $date_naissance, $photo, $specialite, $directeur,$structure,$administratif,$pedagogique,$scientifique,$prof_a_ensa,'prof',md5($password),'en_attente'));
    } elseif ($op == 'update') {
        $es->update(new Professeur($id,$cin, $nom, $prenom, $email, $telephone, $n_drp, $date_recrutement, $date_naissance, $photo, $specialite, $directeur,$structure,$administratif,$pedagogique,$scientifique,$prof_a_ensa,'prof',md5($password),'en_attente'));
    } elseif ($op == 'delete') {
        $es->delete($es->delete($id));
    } elseif ($op == 'refuser') {
        $es->refuser($id);
        header('Content-type: application/json');
        echo json_encode($es->findByAttente());
        $r = false;
    } elseif ($op == 'accepter') {
        $es->accepte($id);
        header('Content-type: application/json');
        echo json_encode($es->findByAttente());
        $r = false;
    } elseif ($op == 'attente') {
        header('Content-type: application/json');
        echo json_encode($es->findByAttente());
        $r = false;
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($es->findById($cin));
        $r = false;
    }
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($es->findAll());
}

