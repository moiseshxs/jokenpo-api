<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json([
            'status' => true,
            'clientes' => $clientes,
        ]);
    }

    // Método para exibir detalhes de um usuário
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    // Método para armazenar um novo usuário
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());

        return response()->json([
            'status' => 'success',
            'mensagem' => 'Cliente cadastrado com sucesso!',
            'cliente' => $cliente
        ], 200);
    }
}
