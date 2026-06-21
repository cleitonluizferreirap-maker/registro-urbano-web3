<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $fillable = [
        'titulo',
        'endereco',
        'categoria',
        'descricao',
        'status',
        'imagem',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}