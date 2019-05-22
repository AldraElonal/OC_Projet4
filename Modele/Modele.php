<?php
namespace Front;
use \PDO;

abstract class Modele{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=localhost;dbname=p4','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }

    protected function executerRequete($sql,$params = null){
        if($params == null){
            $requete = $this->bdd->query($sql);
            return $requete;
        }
        else {
            $requete = $this->bdd->prepare($sql);
            $requete->execute($params);
            return $requete;
        }
    }

}