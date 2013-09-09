<?php

namespace controller;

use
    \controller\interfaces\Controller;

class _404Controller implements Controller {
    
    public static function main() {
        echo "That's a 404. :/";
    }

}

?>
