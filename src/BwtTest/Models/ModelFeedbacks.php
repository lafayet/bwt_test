<?php

namespace BwtTest\Models;

class ModelFeedbacks extends \BwtTest\Core\Model
{
    public function getData()
    {
        $IntDB = \BwtTest\Core\InterfaceDB::getInstance();
        return $IntDB->getFeedbacks();
    }
}
