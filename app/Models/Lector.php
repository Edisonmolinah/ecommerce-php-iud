<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    protected $table = 'Lector';

    protected $fillable = [
        'id',
        'name',
    ];
}
