<?php

namespace App\Libraries;

class Helpers {
    public static function debug($value, $exit=false) {
        echo "# Debug::"; print_r($value); echo "\n";
        if ($exit) { exit; }
    }

    public static function dump($value, $exit=false) {
        echo "# Debug::"; var_dump($value); echo "\n";
        if ($exit) { exit; }
    }
}