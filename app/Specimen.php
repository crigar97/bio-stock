<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specimen extends Model
{
    protected $fillable = [
        'taxonomie_id',
        'collection_id',
        'code',
        'collection_notes',
        'correction_notes'
    ];

    public function taxonomie() {
        return $this->hasOne('App\Taxonomie');
    }

    public function collection() {
        return $this->hasOne('App\Collection');
    }

    public function curatorial() {
        return $this->hasOne('App\Curatorial');
    }

    public function caste() {
        return $this->hasOne('App\Caste');
    }

    public function code() {
        return $this->belongsTo('App\Code');
    }

    public function getCatalogNumberAttribute()
    {
        return "{$this->code->value}00000000{$this->id}";
    }
}
