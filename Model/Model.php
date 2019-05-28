<?php
namespace App\Front;
use \PDO;

abstract class Model{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=localhost;dbname=p4','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }

    protected function executeRequest($sql,$params = null){
        if($params == null){
            $req = $this->bdd->query($sql);
            return $req;
        }
        else {
            $req = $this->bdd->prepare($sql);
            $req->execute($params);
            return $req;
        }
    }

}