<?php
require_once "Model.class.php";
require_once "Auteur.class.php";

class AuteurManager extends Model{
    private $auteurs;//tableau des auteurs

    //Ajout auteur dans le tableau
    public function ajoutAuteur($auteur){
        $this->auteurs[] = $auteur;
    }

    //Obtenir les auteurs
    public function getAuteurs(){
        return $this->auteurs;
    }

    //Charger tous les auteurs
    public function chargementAuteurs(){
        $req = $this->getBdd()->prepare("SELECT * FROM auteurs ORDER BY id DESC");
        $req->execute();
        $mesAuteurs = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesAuteurs as $auteur){
            $l = new Auteur($auteur['id'],$auteur['nom'],$auteur['prenom'],$auteur['sexe'],$auteur['age'],$auteur['specialite']);
            $this->ajoutAuteur($l);
        }
    }

    //Charger tous les livres par l'auteur
    // public function chargementLivres($id){
    //     $req = $this->getBdd()->prepare("SELECT * FROM `livres`INNER JOIN auteurs ON livres.id_auth=auteurs.id WHERE id_auth="+$id);
    //     $req->execute();
    //     $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
    //     $req->closeCursor();

    //     foreach($mesLivres as $livre){
    //         $l = new Livre($livre['id'],$livre['titre'],$livre['nbPages'],$livre['image']);
    //         $this->ajoutLivre($l);
    //     }
    // }

    //Obtenir un seul livre à partir de l'id de l'auteur dans l'URL
    public function getAuteurById($id){
        for($i=0; $i < count($this->auteurs);$i++){
            if($this->auteurs[$i]->getId() === $id){
                return $this->auteurs[$i];
            }
        }
        //Lever une erreur
        throw new Exception("La page n'existe pas");
    }

    //Fonction d'ajout d'un auteur dans la base de données avec paramètre
    public function ajoutAuteurBd($nom,$prenom,$sexe,$age,$specialite){
        $req = "
        INSERT INTO auteurs (nom,prenom,sexe,age,specialite)
        values (:nom, :prenom, :sexe,:age,:specialite)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":sexe",$sexe,PDO::PARAM_STR);
        $stmt->bindValue(":age",$age,PDO::PARAM_INT);
        $stmt->bindValue(":specialite",$specialite,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $auteur = new Auteur($this->getBdd()->lastInsertId(),$nom,$prenom,$sexe,$age,$specialite);
            //Ajout d'un auteur dans un tableau susmentionné
            $this->ajoutAuteur($auteur);
        }        
    }

    //Supprimer un auteur à partir d'un ID
    public function suppressionAuteurBD($id){
        $req = "
        DELETE FROM auteurs where id = :idAuteur
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAuteur",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $auteur = $this->getAuteurById($id);
            //Enlèver l'auteur supprimer dans le tableau
            unset($auteur);
        }
    }

    //Modifier un auteur
    public function modificationAuteurBD($id,$nom,$prenom,$sexe,$age,$specialite){
        $req = "
        update auteurs 
        set nom=:nom, prenom=:prenom,sexe=:sexe,age=:age,specialite=:specialite
        where id=:id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":sexe",$sexe,PDO::PARAM_STR);
        $stmt->bindValue(":age",$age,PDO::PARAM_INT);
        $stmt->bindValue(":specialite",$specialite,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getAuteurById($id)->setNom($nom);
            $this->getAuteurById($id)->setNom($prenom);
            $this->getAuteurById($id)->setNom($sexe);
            $this->getAuteurById($id)->setNom($age);
            $this->getAuteurById($id)->setNom($specialite);
        }
    }
    
}