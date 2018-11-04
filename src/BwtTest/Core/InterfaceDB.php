<?php

namespace BwtTest\Core;

use PDO;

class InterfaceDB
{
    private static $instance;
    private $pdo;
    private function __construct()
    {
        /* ... @return Singleton */
    }
    private function __clone()
    {
        /* ... @return Singleton */
    }
    private function __wakeup()
    {
        /* ... @return Singleton */
    }
    private function connect()
    {
        $ini = parse_ini_file(realpath('config.ini'));
        $this->pdo = new PDO(
            'mysql:host='.$ini['DBHost'].';dbname='.$ini['DBName'],
            $ini['DBLogin'],
            $ini['DBPassword']
        );
        $this->pdo->query('SET NAMES UTF8');
    }
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
            self::$instance->connect();
        }
        return self::$instance;
    }
    
    public function queryPasswordHashFromLogin($login)
    {
        $prep_req = $this->pdo->prepare('SELECT passwordhash FROM users
                                   WHERE login = :login');
        $prep_req->bindParam(':login', $login);
        $prep_req->execute();
        $hash = $prep_req->fetchColumn();
        return $hash;
    }
    
    public function queryIdNameFromLogin($login)
    {
        $prep_req = $this->pdo->prepare('SELECT id, name FROM users
                                   WHERE login = :login');
        $prep_req->bindParam(':login', $login);
        $prep_req->execute();
        $res = $prep_req->fetchAll();
        return $res;
    }
    
    public function createNewUser(
        $login,
        $password_hash,
        $name,
        $soname,
        $email,
        $sex = "NULL",
        $birthday = "NULL"
    ) {
        $prep_req = $this->pdo->prepare(
            'INSERT INTO 
            users (Login, PasswordHash, Name, Soname, Email, Gender, DateOfBirth)
            VALUES (:login, :hash, :name, :soname, :email, :sex, :birth)'
        );
        if (!$prep_req->execute(array(
            ':login' => $login,
            ':hash' => $password_hash,
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
    
    public function createNewFeedback($name, $email, $feedback, $uid)
    {
        $prep_req = $this->pdo->prepare(
            'INSERT INTO 
            feedbacks (name, email, message, userid)
            VALUES (:name, :email, :message, :uid)'
        );
        if (!$prep_req->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':message' => $feedback,
            ':uid' => $uid))
        ) {
            return false;
        } else {
            return true;
        }
    }
    
    public function getFeedbacks()
    {
        $prep_req = $this->pdo->prepare('SELECT name, message FROM feedbacks');
        $prep_req->execute();
        $data = $prep_req->fetchAll();
        return $data;
    }
}
