<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = 'artistas';

    protected $fillable = ['nome_artista'];
    public function albums()
    {
        return $this->hasMany(Album::class, 'id_artista', 'id');
    }

    public function musicas()
    {
        return $this->hasManyThrough(
            Musica::class,
            Album::class,
            'id_artista', // Foreign key on Album table
            'id_album',   // Foreign key on Musica table
            'id',         // Local key on Artista table
            'id'          // Local key on Album table
        );
    }
}
