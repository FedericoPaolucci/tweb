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

    //amicizia
    public function friendsTo() {
        return $this->belongsToMany('App\User', 'friendships', 'id_user1', 'id_user2')
                        ->withPivot('accepted')
                        ->withTimestamps();
    }

    public function friendsFrom() {
        return $this->belongsToMany('App\User', 'friendships', 'id_user2', 'id_user1')
                        ->withPivot('accepted')
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

}
