<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    //   
    use SoftDeletes;
    protected $primaryKey = 'id_owner';
    public $incrementing = false;
    const UPDATED_AT = null;
    
    protected $fillable = [
        'id_owner', 'subject', 'about',
    ];
    
    public function user(){
        return $this->belongsTo('App\User', 'id_owner');
    }
    
    public function posts(){
        return $this->hasMany('App\Models\Post','id_blog_owner','id_owner');
    }
}
