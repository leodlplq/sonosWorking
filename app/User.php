<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username','forename','lastname','avatar'
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



    public function chansons()
    {
        return $this->hasMany("App\Chanson", "user_id");
    }

    public function jeLesSuit(){
        return $this->belongsToMany("App\User", "connexion", "suiveur_id", "suivi_id");
    }

    public function ilsMeSuivent(){
        return $this->belongsToMany("App\User", "connexion", "suivi_id", "suiveur_id");
    }

    public function jeLike(){
        return $this->belongsToMany("App\User", "likes", "user_id", "music_id");
    }
}