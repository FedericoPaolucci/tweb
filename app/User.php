<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'username', 'password', 'birthday',
        'visibility', 'profile', 'img_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //un solo blog appartiene a un solo user
    public function blog() {
        return $this->hasOne('App\Models\Blog', 'id_owner');
    }

    //molti post appartengono ad un user
    public function posts() {
        return $this->hasMany('App\Models\Post', 'id_writer');
    }

    //AMICIZIA
    public function friendsTo() {
        return $this->belongsToMany('App\User', 'friendships', 'id_user1', 'id_user2')
                        ->withPivot('accepted')
                    ->wherePivot('deleted_at', null)
                        ->withTimestamps();
    }

    public function friendsFrom() {
        return $this->belongsToMany('App\User', 'friendships', 'id_user2', 'id_user1')
                        ->withPivot('accepted')
                    ->wherePivot('deleted_at', null)
                        ->withTimestamps();
    }

    public function notyetFriendsTo() {
        return $this->friendsTo()->wherePivot('accepted', false);
    }

    public function notyetFriendsFrom() {
        return $this->friendsFrom()->wherePivot('accepted', false);
    }

    public function acceptedFriendsTo() {
        return $this->friendsTo()->wherePivot('accepted', true);
    }

    public function acceptedFriendsFrom() {
        return $this->friendsFrom()->wherePivot('accepted', true);
    }

    public function friends() {
        return $this->acceptedFriendsTo->merge($this->acceptedFriendsFrom);
    }
    
    public function notyetfriends() {
        return $this->notyetFriendsTo->merge($this->notyetFriendsFrom);
    }
    
    public function isfriend($thisid){
        $myuser=$this->friends()
                ->where('id',$thisid)
                ->first();
        if($myuser === null){
            return false;
        }
        else{
            return true;
        }
    }
    
    public function ispending($thisid){
        $myuser=$this->notyetfriends()
                ->where('id',$thisid)
                ->first();
        if($myuser === null){
            return false;
        }
        else{
            return true;
        }
    }
    
    //FINE AMICIZIA
    
    //SISTEMA DI MESSAGGISTICA E NOTIFICHE
    public function messageTo() {
        return $this->belongsToMany('App\User', 'messages', 'id_sender', 'id_sent_to')
                        ->withPivot('viewed','type','body')
                    ->wherePivot('deleted_at', null)
                        ->withTimestamps();
    }

    public function messageFrom() {
        return $this->belongsToMany('App\User', 'messages', 'id_sent_to', 'id_sender')
                        ->withPivot('viewed','type','body')
                    ->wherePivot('deleted_at', null)
                        ->withTimestamps();
    }
    
    public function notyetviewedTo() {
        return $this->messageTo()->wherePivot('viewed', false);
    }

    public function notyetviewedFrom() {
        return $this->messageFrom()->wherePivot('viewed', false);
    }

    public function viewedTo() {
        return $this->messageTo()->wherePivot('viewed', true);
    }

    public function viewedFrom() {
        return $this->messageFrom()->wherePivot('viewed', true);
    }

    public function viewed() {
        return $this->viewedTo->merge($this->viewedFrom);
    }
    
    public function notyetviewed() {
        return $this->notyetviewedTo->merge($this->notyetviewedFrom);
    }
    
    public function isviewed($thisid){
        $myuser=$this->viewed()
                ->where('id',$thisid)
                ->first();
        if($myuser === null){
            return false;
        }
        else{
            return true;
        }
    }
    
    public function isnotyetviewed($thisid){
        $myuser=$this->notyetviewed()
                ->where('id',$thisid)
                ->first();
        if($myuser === null){
            return false;
        }
        else{
            return true;
        }
    }
}
