<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendari extends Model
{
    use HasFactory;

    protected $fillable = [
        'curs',
        'cicle_modul',
        'dl_days',
        'dm_days',
        'dc_days',
        'dj_days',
        'dv_days',
        'ufName',
        'ufDays'
    ];
}
