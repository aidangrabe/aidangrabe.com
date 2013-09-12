<?php

class App {
    
    private static $path = "";
    private static $props = array();
    private static $root = "";

    private static $resPath = "";
    private static $incPath = "";

    private static function autoload($class) {
        $class = self::joinPaths(self::$incPath, "{$class}.php");
        if (is_readable($class)) {
            require $class;
        } else {
            throw new Exception("Class not found <b>{$class}</b>.");
        }
    }

    public static function d() {
        echo "<pre>";
            $args = func_get_args();
            foreach ($args as $arg) {
                var_dump($arg);
            }
        echo "</pre>";
    }

    public static function get($key) {
        return self::$props[$key];
    }

    public static function getInclude($inc) {
        return self::joinPaths(self::$incPath, $inc);
    }

    public static function getIncludePath() {
        return self::$incPath;
    }

    public static function getPath() {
        return self::$path;
    }

    public static function getResource($path) {
        return self::joinPaths(self::$resPath, $path);
    }

    public static function getRoot() {
        return self::$root;
    }

    public static function joinPaths() {
        $args = func_get_args();
        $paths = array();
        for ($i = 1; $i < count($args); $i++) {
            $paths[] = trim($args[$i], '/');
        }
        return rtrim($args[0], '/') . DIRECTORY_SEPARATOR
            . join(DIRECTORY_SEPARATOR, $paths);
    }

    public static function set($key, $value) {
        self::$props[$key] = $value;
    }

    public static function setIncludePath($file, $incPath) {
        self::$incPath = self::joinPaths(dirname($file), $incPath);
        spl_autoload_register("self::autoload");
    }

    public static function setPath($path) {
        self::$path = $path;
    }

    public static function setResourcePath($resPath) {
        self::$resPath = self::joinPaths(self::$root, $resPath);
    }

    public static function setRoot($root) {
        self::$root = $root;
    }

}

?>
