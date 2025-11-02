<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzenet extends Model
{
    use HasFactory;

    protected $table = 'uzenetek';  // Ha nem default név

    protected $fillable = [
        'nev',
        'email',
        'varos',
        'kor',
        'uzenet',
    ];
}