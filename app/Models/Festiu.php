<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festiu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'cur_id',
        'data_inici',
        'data_final',
        'vacances'
    ];

    public function curs() {
        return $this->belongsTo(Cur::class);
    }
}
