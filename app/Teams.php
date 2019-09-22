<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Teams extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'teams';
}
