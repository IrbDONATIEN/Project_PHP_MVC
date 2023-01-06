<?php
class Auteur{
    private $id;
    private $nom;
    private $prenom;
    private $sexe;
    private $age;
    private $specialite;

    public function __construct($id,$nom,$prenom,$sexe,$age,$specialite)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->sexe=$sexe;
        $this->age=$age;
        $this->specialite=$specialite;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}

    public function getPrenom(){return $this->prenom;}
    public function setPrenom($prenom){$this->prenom = $prenom;}

    public function getSexe(){return $this->sexe;}
    public function setSexe($sexe){$this->sexe = $sexe;}

    public function getAge(){return $this->age;}
    public function setAge($age){$this->age = $age;}

    public function getSpecialite(){return $this->specialite;}
    public function setSpecialite($specialite){$this->specialite = $specialite;}

    
}