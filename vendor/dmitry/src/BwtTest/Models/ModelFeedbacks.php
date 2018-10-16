<?php

namespace BwtTest\Models;

use PDO;

class ModelFeedbacks extends Model
{
    public function getData()
    {    
        return InterfaceDB::getFeedbacks();
    }
}
