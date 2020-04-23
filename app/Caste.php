<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caste extends Model
{
    protected $fillable = [
        'specimen_id',
        'workers',
        'soldiers',
        'queens',
        'males'
    ];

    public function specimen() {
        return $this->belongsTo('App\Specimen');
    }
}
