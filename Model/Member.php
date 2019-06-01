<?php

namespace App\Back;

use App;

class Member extends App\Model {

    public function checklogin($pseudo,$password){
        $req = $this->executeRequest("Select * FROM utilisateurs WHERE pseudo = ? AND password = ? ", array($pseudo,$password));
        $req = $req->fetchAll();
        if(count($req) == 1){
        return true;
    }else{
        return false;
    }
    }
}