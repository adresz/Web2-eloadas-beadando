<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lelekszam extends Model
{
    protected $table = 'lelekszam';

    protected $fillable = ['varosid', 'ev', 'no', 'osszesen'];

    // Férfiak száma (kiszámolt mező)
    public function getFerfiAttribute()
    {
        return $this->osszesen - $this->no;
    }
}