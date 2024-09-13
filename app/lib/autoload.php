<?php 
namespace PHPMVC\Lib;

class Autoload 
{
    public static function autoload($className)
    {
        //Remove main namespace
        $className = str_replace('PHPMVC', '', $className);
        //Make all lower case
        $className = strtolower($className);
        //Replace {\} to {/}
        $className = str_replace('\\', '/', $className);
        //Add php extension
        $className .= '.php';
        // require files
        @include APP_PATH . $className;
    }
}

spl_autoload_register(__NAMESPACE__ . '\Autoload::autoload');