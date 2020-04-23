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

    public static function generateCode($code) {
        try {
            $lastId = Specimen::latest()->first()->id;
            $zeros = '';
            for ($i = 0; $i < 10 - strlen($lastId); $i++) { 
                $zeros .= '0';
            }
            return ($code . $zeros . ($lastId + 1));
        } catch (\Exception $e) {
            return ($code . '0000000001');
        }
    }
}
