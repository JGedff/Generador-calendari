<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'cicle_id'
    ];

    public function cicles() {
        return $this->belongsTo(Cicle::class);
    }

    public function ufs() {
        return $this->hasMany(Uf::class);
    }
    
    public function dias() {
        return $this->hasMany(Dia::class);
    }
}
