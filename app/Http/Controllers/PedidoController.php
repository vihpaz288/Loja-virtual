<?php

    namespace App\Http\Controllers;

    use App\Models\Carrinho;
    use App\Models\DadosCartao;
    use App\Models\Endereco;
    use App\Models\Pedido;
    use App\Models\Produto;
    use App\Models\ProdutoCarrinho;
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
            $carrinho = Carrinho::with('produtos')->where('id', $request->carrinhoId)->first();
            // $carrinho = Carrinho::with('produtos')->where('id', 1)->first();


            foreach ($carrinho->produtos as $produto) {
                $produtoFind = Produto::where('id', '=', $produto->produtoId);

                $qtdTotal = $produtoFind->first();

                $newQtd = ($qtdTotal->quantidade - intval( $produto->quantidade));

                $produtoFind->update(['quantidade' => $newQtd]);

                // $produto>decrement('quantidade', $produto->quantidade);
            }

            $pedido = Pedido::create([
                'enderecoId' => $request->enderecoId,
                'carrinhoId' => $request->carrinhoId,
                'cartaoId' => $request->cartaoId,
            ]);

            $carrinho = Carrinho::with('produtos')->find($request->carrinhoId);
            $carrinho->update(['finalizado' => true]);

            return redirect()->route('index');
        }
        public function relatorioCliente()
        {
            $pedidos = ProdutoCarrinho::with('carrinho')->where('carrinho.userId', auth()->user()->id)->get();
            $dataAtual = date('d-m-Y H:i:s');
        return view('Pedido.relatorioCliente', compact('pedidos', 'dataAtual'));
        }
    }
