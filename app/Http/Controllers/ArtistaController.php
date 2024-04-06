<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artistas = Artista::all();
        return response()->json([
            'status' => true,
            'artistas' => $artistas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artista = Artista::create($request->all());

        return response()->json([
            'status' => 'success',
            'mensagem' => 'artista cadastrado com sucesso!',
            'artista' => $artista
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Artista::where('id', $id)->exists()) {
            $artista = Artista::with('albums', 'musicas')->findOrFail($id);
            return response()->json($artista, 200);
        } else {
            return response()->json([
                'mensagem' => 'Artista não encontrado :('
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $artista = Artista::findOrFail($id);
        $artista->update($request->all());
        return response()->json($artista, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Artista::where('id', $id)->exists()) {
            $artista = Artista::find($id);
            $artista->delete();

            return response()->json([
                'mensagem' => 'artista deletado'
            ], 202);
        } else {
            return response()->json([
                'mensagem' => 'artista não encontrado'
            ], 404);
        }
    }
}
