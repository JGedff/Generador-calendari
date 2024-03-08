<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendari extends Model
{
    use HasFactory;

    protected $fillable = [
        'cur_id',
        'cicle_id',
        'modul_id',
        'dl_days',
        'dm_days',
        'dc_days',
        'dj_days',
        'dv_days'
    ];

    public function curs() {
        return $this->belongsTo(Cur::class);
    }
    
    public function cicles() {
        return $this->belongsTo(Cicle::class);
    }

    public function moduls() {
        return $this->belongsTo(Modul::class);
    }
}
