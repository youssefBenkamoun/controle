<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employe
 *
 * @author mosab
 */
class Professeur {
    private $id;
    private $cin;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $n_drp;
    private $date_recrutement;
    private $date_naissance;
    private $photo;
    private $specialite;
    private $directeur;
    private $structure;
    private $administratif;
    private $pedagogique;
    private $scientifique;
    private $prof_ensa;
    private $point;
    private $password;
    private $attente;
    
    function __construct($id,$cin, $nom, $prenom, $email, $telephone, $n_drp, $date_recrutement, $date_naissance, $photo, $specialite, $directeur,$structure,$administratif,$pedagogique,$scientifique,$prof_ensa,$point,$password,$attente) {
        $this->id = $id;
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->n_drp = $n_drp;
        $this->date_recrutement = $date_recrutement;
        $this->date_naissance = $date_naissance;
        $this->photo = $photo;
        $this->specialite = $specialite;
        $this->directeur = $directeur;
        $this->structure = $structure;
        $this->administratif = $administratif;
        $this->pedagogique = $pedagogique;
        $this->scientifique = $scientifique;
        $this->prof_ensa = $prof_ensa;
        $this->point = $point;
        $this->password = $password;
        $this->attente = $attente;
        
    }
    
            
    function getId() {
        return $this->id;
    }
    function getCin() {
        return $this->cin;
    }
    function getNom() {
        return $this->nom;
    }
    function getPrenom() {
        return $this->prenom;
    }
    function getEmail() {
        return $this->email;
    }
    function getTelephone() {
        return $this->telephone;
    }
    function getNdrp() {
        return $this->n_drp;
    }
    function getDirecteur() {
        return $this->directeur;
    }
    function getSpecialite() {
        return $this->specialite;
    }
    function getPhoto() {
        return $this->photo;
    }
    function getNaissance() {
        return $this->date_naissance;
    }
    function getRecrutement() {
        return $this->date_recrutement;
    }
    function getPedagogique() {
        return $this->pedagogique;
    }
    function getAdministratif() {
        return $this->administratif;
    }
    function getScientifique() {
        return $this->scientifique;
    }
    function getStructure() {
        return $this->structure;
    }
    function getEnsa() {
        return $this->prof_ensa;
    }
    function getPoint() {
        return $this->point;
    }
    function getPassword() {
        return $this->password;
    }
    function getAttente() {
        return $this->attente;
    }
    

    function setCin($cin) {
        $this->cin = $cin;
    }
    function setNom($nom) {
        $this->nom = $nom;
    }
    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
    function setNdrp($n_drp) {
        $this->n_drp = $n_drp;
    }
    function setPhoto($photo) {
        $this->photo = $photo;
    }
    function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }
    function setDirecteur($directeur) {
        $this->directeur = $directeur;
    }
    function setNaissance($naissance) {
        $this->date_naissance = $naissance;
    }
    function setRecrutement($recrutement) {
        $this->date_recrutement = $recrutement;
    }
    function setPedagogique($Pedagogique) {
        $this->pedagogique = $Pedagogique;
    }
    function setAdministratif($Administratif) {
        $this->administratif = $Administratif;
    }
    function setScientifique($Scientifique) {
        $this->scientifique = $Scientifique;
    }
    function setStructure($structure) {
        $this->structure = $structure;
    }
    function setPassword($password) {
        $this->password = $password;
    }
    function setAttente($attente) {
        $this->attente = $attente;
    }

    
}
