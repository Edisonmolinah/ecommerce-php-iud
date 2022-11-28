<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'post_id',
        'titulo',
        'descripcion',
        'estado',
        'contenido',
    ];
    
    public function autor() {
        return $this->belongsTo(Autor::class);
    }
}
