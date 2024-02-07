<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'data_inici',
        'data_final'
    ];

    public function festius() {
        return $this->hasMany(Festiu::class);
    }

    public function trimestres() {
        return $this->hasMany(Trimestre::class);
    }
}
