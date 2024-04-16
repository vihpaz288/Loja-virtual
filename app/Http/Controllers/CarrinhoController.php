<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\ImageProduto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // public function index()
    // {
    //     return view('Carrinho.index');
    // }
    public function store(Request $request)
    {
       Carrinho::create([
          'produtoID' => $request->produtoID,
          'userId' => auth()->user()->id,
          'quantidade' => $request->quantidade,
       ]);

       return redirect()->route('index');
    }
    public function index()
    {
        $itens = Carrinho::with('produtos.image')
                         ->where('userId', auth()->user()->id)
                         ->get();

                        //  dd(ImageProduto::get());

        $valorTotal = [];
        foreach ($itens as $item) {
            if ($item->produtos) {
                $valor = $item->produtos->valor * $item->quantidade;
                array_push($valorTotal, $valor);
            }
        }

        $total = array_sum($valorTotal);

        return view('Carrinho.index', compact('itens', 'total'));
    }

    public function destroy($id)
    {
        Carrinho::findOrFail($id)->delete();
        return redirect()->back();
    }


}
