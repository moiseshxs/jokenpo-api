<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return response()->json([
            'status' => true,
            'albums' => $albums,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album = Album::create($request->all());

        return response()->json([
            'status' => 'success',
            'mensagem' => 'Album cadastrado com sucesso!',
            'album' => $album
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Album::where('id', $id)->exists()) {
            $album = Album::with('musicas', 'musicas.artista')->find($id);
            return response()->json($album, 200);
        } else {
            return response()->json([
                'mensagem' => 'Álbum não encontrado :('
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $album->update($request->all());
        return response()->json($album, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Album::where('id', $id)->exists()) {
            $album = Album::find($id);
            $album->delete();

            return response()->json([
                'mensagem' => 'Album deletado'
            ], 202);
        } else {
            return response()->json([
                'mensagem' => 'Album não encontrado'
            ], 404);
        }
    }
}
