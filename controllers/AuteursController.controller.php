<?php
require_once "models/AuteurManager.class.php";

class AuteursController{
    private $auteurManager;

    public function __construct(){
        $this->auteurManager = new AuteurManager;
        $this->auteurManager->chargementAuteurs();
    }

    //Afficher tous les auteurs
    public function afficherAuteurs(){
        $auteurs = $this->auteurManager->getAuteurs();
        require "views/auteurs.view.php";
    }

    //Rechercher un auteur par ID
    public function afficherAuteur($id){
        $auteur = $this->auteurManager->getAuteurById($id);
        require "views/afficherAuteur.view.php";
    }
    
    //Ajouter un auteur
    public function ajoutAuteur(){
        require "views/ajoutAuteur.view.php";
    }

    //Supprimer un auteur sur base de l'ID renseigner
    public function suppressionAuteur($id){
        $this->auteurManager->suppressionAuteurBD($id);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression Réalisée"
        ];
        header('Location: '. URL . "auteurs");
    }

    //Sélection d'un ID auteur
    public function modificationAuteur($id){
        $auteur = $this->auteurManager->getAuteurById($id);
        require "views/modifierAuteur.view.php";
    }

    //Validation de la modification d'un auteur
    public function modificationAuteurValidation(){
        $this->auteurManager->modificationAuteurBD($_POST['identifiant'],$_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['age'],$_POST['specialite']);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "modification Réalisée"
        ];
        header('Location: '. URL . "auteurs");
    }

    //Validation d'ajout auteur dans la base de données
    public function ajoutAuteurValidation(){
        $this->auteurManager->ajoutAuteurBd($_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['age'],$_POST['specialite']);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout Réalisé"
        ];
        header('Location: '. URL . "auteurs");
    }
    
}