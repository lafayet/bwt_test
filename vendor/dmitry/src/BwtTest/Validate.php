<?php

namespace BwtTest;

class Validate
{
    public static function isLenghtValid($name, $lenght)
    {
        $len = strlen($name);
        if (($len >= 3) and ($len <= $lenght)) {
            return true;
        } else {
            return false;
        }
    }
}