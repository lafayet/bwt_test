<?php

namespace BwtTest\Models;

use PDO;

class ModelLogin extends Model
{
    public function login($login, $password)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=bwt_test_db', 'root', '');
        $prep_req = $pdo->prepare('SELECT passwordhash FROM users WHERE login = :login');
        $prep_req->bindParam(':login', $login);
        $prep_req->execute();
        $my_hash = $prep_req->fetchColumn();
        
        if (password_verify ($password , $my_hash)) {
            session_start();
            $pdo->query('SET NAMES UTF8');
            $prep_req = $pdo->prepare('SELECT id, name FROM users WHERE login = :login');
            $prep_req->bindParam(':login', $login);
            $prep_req->execute();
            $res = $prep_req->fetchAll();
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
        $pdo = new PDO('mysql:host=localhost;dbname=bwt_test_db', 'root', '');
        $pdo->query('SET NAMES UTF8');
        $prep_req = $pdo->prepare('INSERT INTO users (Login, PasswordHash, Name, Soname, Email, Gender, DateOfBirth)
        VALUES (:login, :hash, :name, :soname, :email, :sex, :birth)');
        if (
            !$prep_req->execute(array(
            ':login' => $login,
            ':hash' => $my_hash,
            ':name' => $name,
            ':soname' => $soname,
            ':email' => $email,
            ':sex' => $sex,
            ':birth' => $birthday,))
            ) {
            return false;
        } else {
            return true;
        }
    }
}
