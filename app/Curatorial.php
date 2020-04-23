<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curatorial extends Model
{
    protected $fillable = [
        'specimen_id',
        'prepared_by',
        'prepared_at',
        'determined_by',
        'determined_at',
        'life_stage_sex',
        'medium',
        'owned_by',
        'located_at',
        'notes',
        'collection_code'
    ];

    public function specimen() {
        return $this->belongsTo('App\Specimen');
    }
}
