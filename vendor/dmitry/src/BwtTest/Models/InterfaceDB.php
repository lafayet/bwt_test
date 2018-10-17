<?php

namespace BwtTest\Models;

use PDO;

class InterfaceDB
{
    private static function connect()
    {
        //Init's connection to DB acoording to INI file
        $ini = parse_ini_file(realpath('vendor/dmitry/db_config.ini'));
        $pdo = new PDO(
            'mysql:host='.$ini['DBHost'].';dbname='.$ini['DBName'],
            $ini['DBLogin'],
            $ini['DBPassword']
        );
        $pdo->query('SET NAMES UTF8');
        return $pdo;
    }
    
    public static function queryPasswordHashFromLogin($login)
    {
        $pdo = InterfaceDB::connect();
        $prep_req = $pdo->prepare('SELECT passwordhash FROM users
                                   WHERE login = :login');
        $prep_req->bindParam(':login', $login);
        $prep_req->execute();
        $hash = $prep_req->fetchColumn();
        return $hash;
    }
    
    public static function queryIdNameFromLogin($login)
    {
        $pdo = InterfaceDB::connect();
        $prep_req = $pdo->prepare('SELECT id, name FROM users
                                   WHERE login = :login');
        $prep_req->bindParam(':login', $login);
        $prep_req->execute();
        $res = $prep_req->fetchAll();
        return $res;
    }
    
    public static function createNewUser(
        $login,
        $password_hash,
        $name,
        $soname,
        $email,
        $sex = "NULL",
        $birthday = "NULL"
    ) {
        $pdo = InterfaceDB::connect();
        $prep_req = $pdo->prepare(
            'INSERT INTO 
            users (Login, PasswordHash, Name, Soname, Email, Gender, DateOfBirth)
            VALUES (:login, :hash, :name, :soname, :email, :sex, :birth)'
        );
        if (
            !$prep_req->execute(array(
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
    
    public static function createNewFeedback($name, $email, $feedback, $uid)
    {
        $pdo = InterfaceDB::connect();
        $prep_req = $pdo->prepare(
            'INSERT INTO 
            feedbacks (name, email, message, userid)
            VALUES (:name, :email, :message, :uid)'
        );
        if (
            !$prep_req->execute(array(
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
    
    public static function getFeedbacks()
    {
        $pdo = InterfaceDB::connect();
        $prep_req = $pdo->prepare('SELECT name, message FROM feedbacks');
        $prep_req->execute();
        $data = $prep_req->fetchAll();
        return $data;
    }
}
