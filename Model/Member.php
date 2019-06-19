<?php

namespace App;


 class  Member extends Model
{
    const ADMIN = 50;

    public function checkUser($pseudo, $password)
    {
        $req = $this->executeRequest('Select * FROM users WHERE pseudo = ? ', array($pseudo));
        $user = $req->fetchAll();
        if (password_verify($password,$user[0]['password'])) {

            return true;
        } else {
            return false;
        }
    }

    public function getUser($pseudo)
    {
        $req = $this->executeRequest('Select * FROM users WHERE pseudo = ?', array($pseudo));
        $req = $req->fetchAll();
        return $req[0];
    }
}


