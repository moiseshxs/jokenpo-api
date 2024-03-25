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
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cliente, 200);
        } else {
            return response()->json([
                'mensagem' => 'Cliente não encontrado :('
            ], 404);
        }
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

    public function update(Request $request, $id)
    {
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::find($id);
            $cliente->nome = is_null($request->nome) ? $cliente->nome : $request->nome;
            $cliente->senha = is_null($request->senha) ? $cliente->senha : $request->senha;
            $cliente->save();

            return response()->json([
                'mensagem' => 'Cliente atualizado com sucesso!'
            ], 200);
        } else {
            return response()->json([
                'mensagem' => 'Cliente não encontrado'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::find($id);
            $cliente->delete();
    
            return response()->json([
              'mensagem' => 'Cliente deletado'
            ], 202);
          } else {
            return response()->json([
              'mensagem' => 'Cliente não encontrado'
            ], 404);
          }
    }
}