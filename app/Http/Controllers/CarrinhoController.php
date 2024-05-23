<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\ImageProduto;
use App\Models\Produto;
use App\Models\ProdutoCarrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // public function index()
    // {
    //     return view('Carrinho.index');
    // }
    public function store(Request $request)
    {

        $verificaCarrinho = Carrinho::where('userId', auth()->user()->id)->where('finalizado', false)->first();
        // dd($verificaCarrinho);
        if (!isset($verificaCarrinho)) {
            $verificaCarrinho = Carrinho::create([
                'userId' => auth()->user()->id,
                'finalizado' => false,
            ]);
        }
        // dd('a');
        $valorTotal = Produto::find($request->produtoId)->valor * $request->quantidade;

        $request->merge([
            'carrinhoId' => $verificaCarrinho->id,
            'valor' => $valorTotal,
        ]);

        $produtoCarrinho = ProdutoCarrinho::create($request->all());

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
        Carrinho::findOrFail($id)->delete();
        return redirect()->back();
    }
}
