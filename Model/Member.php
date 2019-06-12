<?php

namespace App;


 class  Member extends Model
{


    public function checkUser($pseudo, $password)
    {
        $req = $this->executeRequest('Select * FROM users WHERE pseudo = ? AND password = ? ', array($pseudo, $password));
        $req = $req->fetchAll();
        if (count($req) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getUser($pseudo, $password)
    {
        $req = $this->executeRequest('Select * FROM users WHERE pseudo = ? AND password = ? ', array($pseudo, $password));
        $req = $req->fetchAll();
        return $req[0];
    }
}


