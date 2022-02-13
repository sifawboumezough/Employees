<?php

session_start();

require_once './bootstrap.php';

spl_autoload_register("autoLoader");
    function autoLoader($className){
        $paths = array(
            'database/',
            'app/classes/',
            'models/',
            'controllers/'
        );
        
        $extention = explode('\\', $className);
        $name = array_pop($extention);

        foreach($paths as $path){
            $file = sprintf($path."%s.php",$name);
            if(is_file($file)){
                include_once $file;
            }
        }
    }


?>