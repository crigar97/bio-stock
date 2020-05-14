<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SUPERADMINISTRATOR = 1;
    const ADMINISTRATOR = 2;
    const COLLABORATOR = 3;

    protected $fillable = [
        'value'
    ];
    
    public function users() {
        return $this->hasMany('App\User');
    }
}
