<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','middleName', 'lastName','lastName','email', 'password','userType','classification'
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


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
    }


    public function encoding(){
        return $this->hasMany(Encoding::class);
    }


    public function trackers(){
        return $this->hasMany(Tracker::class);
    }
    public function profiles(){
        return $this->hasOne(Profile::class);
    }

    public function role(){
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRole($roles){
        if($this->role()->whereIn('name',$roles)){
            return true;
        }
        return false;
    }

    public function hasRoles($role){
        if($this->role()->where('name',$role)->first()){
            return true;
        }
        return false;
    }
}
