<?php

require 'ClassLoaderInterface.php';

class ClassLoader implements ClassLoaderInterface {

    private function autoLoad($class) {
        $class = self::getClassFromNamespace($class);
        if (is_readable($class)) {
            require $class;
        } else {
            die("<b>{$class}</b> not found.");
        }
    }

    public static function getClassFromPath($path) {
        return "\\" . str_replace("/", "\\", ltrim($path, "/"));
    }

    public static function getClassFromNamespace($class) {
        $class = ltrim($class, "\\") . '.php';
        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        $class =  __DIR__ . DIRECTORY_SEPARATOR . $class;
        return $class;
    }

    public function register() {
        spl_autoload_register("self::autoload");
    }

}

?>
