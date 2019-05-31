<?php
namespace  App;
class Autoloader
{

    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    static function autoload($class)
    {


        $className = preg_split('#\\\#',$class);
        $className = end($className);

        if(stripos($className,'Controller')===0)
        {

            include 'Controller/' . $className . '.php';
        }
        elseif (stripos($className,'View')===0)
        {
            include 'View/' . $className . '.php';
        }
        else
        {
            if(file_exists($className . '.php')) {
                include $className . '.php';
            }
            elseif(file_exists('Model/' . $className . '.php')){
                include 'Model/' . $className . '.php';
            }
        }
    }
}

