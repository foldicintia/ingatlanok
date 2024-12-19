<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingatlanok extends Model
{
    /** @use HasFactory<\Database\Factories\IngatlanokFactory> */
    use HasFactory;

    protected $fillable = [
        'leiras',
        'hirdetesDatum',
        'tehermentes',
        'ar',
        'kepUrl'
    ];

}
