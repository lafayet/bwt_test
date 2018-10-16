<?php

namespace BwtTest\Models;

use PDO;

class ModelLogin extends Model
{
    public function login($login, $password)
    {
        $my_hash = InterfaceDB::queryPasswordHashFromLogin($login);        
        if (password_verify ($password , $my_hash)) {
            session_start();
            $res = InterfaceDB::queryIdNameFromLogin($login); 
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
        return InterfaceDB::createNewUser($login, $my_hash, $name, $soname, $email, $sex, $birthday);
    }
}
