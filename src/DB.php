<?php

class DB {

    private $mysqli;
    
    public function __construct() {
    }

    public function connect() {
        $this->mysqli = new mysqli(
            DBconf::HOST,
            DBconf::USER,
            DBconf::PASS,
            DBconf::NAME
        );
        if ($this->mysqli->connect_errno)
            throw new Exception("mysqli connection error");
        return $this->mysqli;
    }

    public function close() {
        $this->mysqli->close();
    }

    public function escape($str) {
        return $this->mysqli->escape_string($str);
    }

    public function query($sql) {
        $res = $this->mysqli->query($sql);
        if (!$res) throw new Exception("mysqli exception");
        return $res;
    }

}

?>
