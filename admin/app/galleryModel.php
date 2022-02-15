<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galleryModel extends Model
{
    public $table = 'gallery';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
