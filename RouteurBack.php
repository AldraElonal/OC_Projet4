<?php

namespace App\Back;


class RouteurBack
{

    private $ctrlConnect;
    private $ctrlAdmin;

    const ADMIN = 50;

    public function __construct()
    {
        $this->ctrlConnect = new ControllerConnect;
        $this->ctrlAdmin = new ControllerAdminPage();
    }

    public function directRequest(){
        try{

            if(isset($_SESSION['role'])){

                if($_SESSION['role'] == self::ADMIN){

                    if(isset($_GET['action'])){
                        $action =  htmlspecialchars($_GET['action']);

                        if($action == "supprimerCommentaire" AND isset($_GET['id'])) {
                            $id = htmlspecialchars($_GET['id']);
                            $this->ctrlAdmin->deleteComment($id);

                        }else {
                            $this->ctrlAdmin->adminPage();
                        }

                    }else {
                        $this->ctrlAdmin->adminPage();
                    }

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
}