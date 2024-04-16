<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\DadosCartao;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function finalizar()
    {
        $produtos = Carrinho::where('userId', auth()->user()->id)->get();
        $cartaos = DadosCartao::where('userId', auth()->user()->id)->get();
        $enderecos = Endereco::where('userId', auth()->user()->id)->get();
        return view('Pedido.finalizar', compact('cartaos', 'enderecos', 'produtos'));
    }
    // public function store(Request $request)
    // {
    //     $pedido = Pedido::create($request->all());
    //     return redirect()->route('index');
    // }

    public function store(Request $request)
{
    // dd($request->all());
    // Valide os dados do formulário, se necessário

DB::beginTransaction();
    $pedido = Pedido::create([
        'enderecoId' => $request->enderecoId,
        'carrinhoId' => $request->carrinhoId,
        'cartaoId' => $request->cartaoId,
    ]);
$carrinho = Carrinho::with('produtos')->find($request->carrinhoId);
$carrinho->update(['finalizado' => true]);
dd($carrinho);
foreach ($carrinho as $key => $value) {
}
DB::rollBack();
    return redirect()->route('index');
}

}
