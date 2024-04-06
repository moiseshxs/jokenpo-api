<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musicas = Musica::all();
        return response()->json([
            'status' => true,
            'musicas' => $musicas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $musica = Musica::create($request->all());

        return response()->json([
            'status' => 'success',
            'mensagem' => 'musica cadastrada com sucesso!',
            'musica' => $musica
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Musica::where('id', $id)->exists()) {
            $musica = Musica::with('album', 'artista')->findOrFail($id);
            return response()->json($musica, 200);
        } else {
            return response()->json([
                'mensagem' => 'Música não encontrada :('
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $musica = Musica::findOrFail($id);
        $musica->update($request->all());
        return response()->json($musica, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Musica::where('id', $id)->exists()) {
            $musica = Musica::find($id);
            $musica->delete();

            return response()->json([
                'mensagem' => 'musica deletado'
            ], 202);
        } else {
            return response()->json([
                'mensagem' => 'musica não encontrado'
            ], 404);
        }
    }
}
