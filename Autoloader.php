<?php
namespace  App\Front;
class Autoloader
{

    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    static function autoload($class)
    {


if(preg_match('/' . __NAMESPACE__. '/',$class)==0){

    $class = str_replace(__NAMESPACE__,'',$class);
    $class = str_replace("\\",'',$class);
}
        if(stripos($class,'Controller')===0)
        {

            include 'Controller/' . $class . '.php';
        }
        elseif (stripos($class,'View')===0)
        {
            include 'View/' . $class . '.php';
        }
        else
        {
            if(file_exists($class . '.php')) {
                include $class . '.php';
            }
            elseif(file_exists('Model/' . $class . '.php')){
                include 'Model/' . $class . '.php';
            }
        }
    }
}

