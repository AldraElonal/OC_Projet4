<?php

namespace App\Back;


class RouteurBack
{

    private $ctrlConnect;

    const ADMIN = 50;

    public function __construct()
    {
        $this->ctrlConnect = new ControllerConnect;
    }

    public function directRequest(){
        var_dump($_SESSION['role']);
        try{
            if(isset($_SESSION['role'])){
                if($_SESSION['role'] == self::ADMIN){
                    echo 'connecté en tant que ADMIN';
                }else {
                    $this->ctrlConnect->connect();
                }
            }else {
                $this->ctrlConnect->connect();
            }
        }
        catch (\Exception $e){

        }
    }
},