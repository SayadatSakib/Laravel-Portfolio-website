<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicesModel extends Model
{
    public $table = 'services';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
