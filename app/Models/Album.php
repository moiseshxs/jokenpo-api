<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = ['nome_album', 'lancamento_album', 'genero_album', 'id_artista'];
    public function musicas()
    {
        return $this->hasMany(Musica::class, 'id_album');
    }

    public function artista()
    {
        return $this->belongsTo(Artista::class, 'id_artista');
    }
}
