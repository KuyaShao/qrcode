<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function healthDeclaration(){
        return $this->hasOne(HealthDeclaration::class);
    }
}
