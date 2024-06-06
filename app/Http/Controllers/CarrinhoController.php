<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\ImageProduto;
use App\Models\Produto;
use App\Models\ProdutoCarrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function store(Request $request)
    {

        $verificaCarrinho = Carrinho::with('carrinho')->where('userId', auth()->user()->id)->where('finalizado', false)->first();

        if (!isset($verificaCarrinho)) {
            $verificaCarrinho = Carrinho::create([
                'userId' => auth()->user()->id,
                'finalizado' => false,
            ]);
        }

        $produto = Produto::find($request->produtoId);

        $verificaExistenciaDoProduto = $verificaCarrinho->carrinho->where('produtoId', '=', $produto->id)->first();
        if (isset($verificaExistenciaDoProduto)) {
            $quantidade = $verificaExistenciaDoProduto->quantidade + $request->quantidade;
            $valor =  $quantidade * $produto->valor;
            $verificaExistenciaDoProduto->update([
                'quantidade' => $quantidade,
                'valor' => $valor,
            ]);
        } else {
            $valorTotal = $request->quantidade * $produto->valor;
            $request->merge([
                'carrinhoId' => $verificaCarrinho->id,
                'valor' => $valorTotal,
            ]);
            $produtoCarrinho = ProdutoCarrinho::create($request->all());
        }

        return redirect()->route('index');
    }
    public function index()
    {
        
        $carrinho = ProdutoCarrinho::with(['produtos', 'produtos.image'])
            ->whereHas('carrinho', function ($query) {
                $query->where('userId', auth()->user()->id)
                    ->where('finalizado', false);
            })->get();
        return view('Carrinho.index', compact('carrinho'));
    }

    public function destroy($id)
    {
        ProdutoCarrinho::findOrFail($id)->delete();
        return redirect()->back();
    }
}
