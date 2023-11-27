<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produto = Produto::all();
        return response()->json($produto);
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto);
    }

    public function novo(Request $request)
    {
        $novoProduto = Produto::create([
            'nome' => $request->input('nome'),
            'categoria' => $request->input('categoria'),
            'valor' => $request->input('valor'),
            'data_vencimento' => $request->input('data_vencimento'),
            'estoque' => $request->input('estoque'),
            'perecivel' => $request->input('perecivel'),
        ]);
        return response()->json(['message' => 'Produto salvo com sucesso', 'produto' => $novoProduto], 201);
    }

    public function update(Request $request, $id)
        {
           $produto = Produto::find($id);

            $request->validate([
                'nome' => 'required|string',
                'categoria' => 'required|string',
                'valor' => 'required|numeric',
                'data_vencimento' => 'required|date',
                'estoque' => 'required|integer',
                'perecivel' => 'required|boolean',
            ]);

            if (!$produto) {
                return response()->json(['message' => 'Produto não encontrado'], 404);}

            $produto = Produto::update([
                'nome' => $request->input('nome'),
                'categoria' => $request->input('categoria'),
                'valor' => $request->input('valor'),
                'data_vencimento' => $request->input('data_vencimento'),
                'estoque' => $request->input('estoque'),
                'perecivel' => $request->input('perecivel'),
            ]);

            return response()->json(['message' => 'Produto atualizado com sucesso', 'produto' => $produto]);
        }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto removido com sucesso']);
    }
}
