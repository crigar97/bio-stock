<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'country',
        'state',
        'municipality',
        'locality',
        'site',
        'latitude',
        'longitude',
        'altitude',
        'collected_at',
        'method',
        'habitat',
        'microhabitat',
        'collector_1',
        'collector_2',
        'relation'
    ];

    public function specimen() {
        return $this->belongsTo('App\Specimen');
    }
}
