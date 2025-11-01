<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lelekszam extends Model
{
    protected $table = 'lelekszam';
    protected $fillable = ['varosid', 'ev', 'no', 'osszesen'];

    public function varos()
    {
        return $this->belongsTo(Varos::class, 'varosid');
    }
}