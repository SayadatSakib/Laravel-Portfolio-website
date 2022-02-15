<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectsModel extends Model
{
    public $table = 'projects';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
