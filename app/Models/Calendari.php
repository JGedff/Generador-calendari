<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendari extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'cur_id'
    ];
}
