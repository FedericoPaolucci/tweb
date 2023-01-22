<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    // 
    protected $primarykey = ['id_user1', 'id_user2'];
    public $incrementing = false;
    //protected $keyType = 'unsignedBigInteger';
}
