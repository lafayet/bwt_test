<?php

namespace BwtTest\Models;

use PDO;

class ModelFeedbacks extends Model
{
    public function getData()
    {    
        $pdo = new PDO('mysql:host=localhost;dbname=bwt_test_db', 'root', '');
        $pdo->query('SET NAMES UTF8');
        $prep_req = $pdo->prepare('SELECT name, message FROM feedbacks');
        $prep_req->execute();
        $data = $prep_req->fetchAll();
        return $data;
    }
}
