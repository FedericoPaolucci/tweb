<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    // 
    protected $primaryKey = ['id'];
    
    protected $fillable = [
        'id_user1', 'id_user2',
    ];
            
    
    
}
