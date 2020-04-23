<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomie extends Model
{
    protected $fillable = [
        'subfamily',
        'tribe',
        'genus',
        'subgenre',
        'complex',
        'specie',
        'subspecie',
        'author'
    ];

    public function specimen() {
        return $this->belongsTo('App\Specimen');
    }
}
