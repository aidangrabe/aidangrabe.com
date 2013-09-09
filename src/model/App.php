<?php

namespace model;

class App {
    
    private static $path = "";
    private static $props = array();
    private static $root = "";

    public static function get($key) {
        return self::$props[$key];
    }

    public static function getPath() {
        return self::$path;
    }

    public static function getResource($path) {
        $path = "/res/{$path}";
        return self::getRoot() . str_replace(array("\\", "/"),
            DIRECTORY_SEPARATOR, $path);
    }

    public static function getRoot() {
        return self::$root;
    }

    public static function set($key, $value) {
        self::$props[$key] = $value;
    }

    public static function setPath($path) {
        self::$path = $path;
    }

    public static function setRoot($root) {
        self::$root = $root;
    }

}

?>
