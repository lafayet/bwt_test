<?php

namespace BwtTest\Models;

class ModelFeedbacks extends Model
{
    public function getData()
    {    
        return InterfaceDB::getFeedbacks();
    }
}
