<?php

namespace BwtTest\Models;

use BwtTest\Core\InterfaceDB;

class ModelLogin extends \BwtTest\Core\Model
{
    public function login($login, $password)
    {
        $IntDB = InterfaceDB::getInstance();
        $my_hash = $IntDB->queryPasswordHashFromLogin($login);
        if (password_verify($password, $my_hash)) {
            $res = $IntDB->queryIdNameFromLogin($login);
            $_SESSION['uid'] = $res[0][0];
            $_SESSION['name'] = $res[0][1];
            return true;
        } else {
            return false;
        }
    }
    
    public function register($login, $password, $name, $soname, $email, $sex = "NULL", $birthday = "NULL")
    {
        $my_hash = password_hash($password, PASSWORD_DEFAULT);
        $IntDB = InterfaceDB::getInstance();
        return $IntDB->createNewUser($login, $my_hash, $name, $soname, $email, $sex, $birthday);
    }
}
