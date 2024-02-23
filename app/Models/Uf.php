<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'data_inici',
        'data_final',
        'modul_id'
    ];

    public function moduls() {
        return $this->belongsTo(Modul::class);
    }
}
