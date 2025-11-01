<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Varos extends Model
{
    protected $table = 'varos';
    protected $fillable = ['nev', 'megyeid', 'megyeszékhely', 'megyejogu'];

    public function megye()
    {
        return $this->belongsTo(Megye::class, 'megyeid');
    }

    public function lelekszamok()
    {
        return $this->hasMany(Lelekszam::class, 'varosid');
    }

    public function legutolsoLelekszam()
    {
        return $this->hasOne(Lelekszam::class, 'varosid')->latest('ev');
    }
}