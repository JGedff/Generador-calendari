<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;

    protected $fillable = [
        'dilluns',
        'dimarts',
        'dimecres',
        'dijous',
        'divendres',
        'modul_id'
    ];

    public function moduls() {
        return $this->belongsTo(Modul::class);
    }
}
