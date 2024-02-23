<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'cur_id'
    ];

    public function curs() {
        return $this->belongsTo(Cur::class);
    }

    public function moduls() {
        return $this->hasMany(Modul::class);
    }
}
