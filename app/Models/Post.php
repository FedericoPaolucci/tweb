<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id_writer', 'id_blog_owner', 'body',
    ];
    
    const CREATED_AT = 'posted_at';
    const UPDATED_AT = null;

    public function blog(){
        return $this->belongsTo('App\Models\Blog', 'id_blog_owner', 'id_owner');
    }
    
    public function user(){
        return $this->belongsTo('App\User', 'id_writer');
    }
}
