<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
        'value'
    ];

    public function specimens() {
        return $this->hasMany('App\Specimen');
    }
}
