<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $table = 'musicas';

    protected $fillable = ['nome_musica', 'duracao_musica', 'id_album', 'id_artista'];
    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album', 'id');
    }
    public function artista()
    {
        return $this->belongsTo(Artista::class, 'id_artista', 'id');
    }
}
