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
        $produtos = ProdutoCarrinho::with('carrinho')->get();
        $cartaos = DadosCartao::where('userId', auth()->user()->id)->get();
        $enderecos = Endereco::where('userId', auth()->user()->id)->get();

        return view('Pedido.finalizar', compact('cartaos', 'enderecos', 'produtos'));
    }

    public function store(Request $request)
    {

        $carrinho = Carrinho::with('carrinho.produtos')->where('userId', auth()->user()->id)->where('finalizado', 0)->first();
        if (!$carrinho) {
            return redirect()->back()->with('error', 'Carrinho não encontrado.');
        }
        // Acesso direto aos produtos associados ao carrinho
        foreach ($carrinho->carrinho as $produtoCarrinho) {
                        $produtoFind = Produto::find($produtoCarrinho->produtoId);

            if ($produtoFind) {
                $novaQuantidadeEstoque = $produtoFind->quantidade - $produtoCarrinho->quantidade;
                if ($novaQuantidadeEstoque >= 0) {
                    $produtoFind->update(['quantidade' => $novaQuantidadeEstoque]);
                } else {
                }
            } else {
                // Tratar o caso em que o produto não é encontrado
            }
        }
        Pedido::create([
            'enderecoId' => $request->enderecoId,
            'produtoCarrinhoId' => $request->produtoCarrinhoId[0],
            'cartaoId' => $request->cartaoId,
            'statusId' => $request->statusId,
        ]);
       
        $update = $carrinho->update(['finalizado' => true]);

        if ($update) {
            return redirect()->route('index');
        }
        
    }


    public function relatorioCliente()
    {
        $pedidos = ProdutoCarrinho::with('carrinho')->with('produtos')
            ->whereHas('carrinho', function ($query) {
                $query->where('userId', auth()->user()->id)->where('finalizado', true);
            })
            ->get();
        $status = Pedido::with('status')->get();

        $dataAtual = date('d-m-Y H:i:s');
        return view('Pedido.relatorioCliente', compact('pedidos', 'dataAtual', 'status'));
    }
    public function relatorioVendedor()
    {
        $pedidos = Pedido::with('endereco.user')->with('status')->get();
        $dadosPedido = ProdutoCarrinho::with('produtos')->get();
        // dd($dadosPedido);
        // $status = Pedido::with('status')->with('carrinho.user')->with('cartao.user')->with('endereco.user')->get();
        // dd($status);
        // $dados = Pedido::with('carrinho.user')->with('cartao.user')->with('endereco.user')->find($id);
        $dataAtual = date('d-m-Y H:i:s');
        return view('Pedido.relatorioVendedor', compact('pedidos', 'dataAtual', 'dadosPedido'));
    }
    public function relatorioVendas()
    {
        $produtoMaisVendido = DB::table('produtocarrinho')
            ->select('produtoId', DB::raw('COUNT(*) as total_vendas'))
            ->groupBy('produtoId')
            ->orderByDesc('total_vendas')
            ->first();

        // Agora você pode acessar o produto mais vendido e o número de vendas
        $produtoIdMaisVendido = $produtoMaisVendido->produtoId;
        $totalVendasProdutoMaisVendido = $produtoMaisVendido->total_vendas;

        // Você pode recuperar mais detalhes do produto, se necessário
        $produtoMaisVendidoDetalhes = Produto::find($produtoIdMaisVendido);

        $produtoMenosVendido = DB::table('produtocarrinho')
            ->select('produtoId', DB::raw('COUNT(*) as total_vendas'))
            ->groupBy('produtoId')
            ->orderBy('total_vendas')
            ->first();

        // Agora você pode acessar o produto menos vendido e o número de vendas
        $produtoIdMenosVendido = $produtoMenosVendido->produtoId;
        $totalVendasProdutoMenosVendido = $produtoMenosVendido->total_vendas;

        // Você pode recuperar mais detalhes do produto, se necessário
        $produtoMenosVendidoDetalhes = Produto::find($produtoIdMenosVendido);

        $quantidadeTotal = DB::table('produto')->sum('quantidade');

        return view('Pedido.relatorioVendas', compact('produtoIdMaisVendido', 'totalVendasProdutoMaisVendido', 'produtoMaisVendidoDetalhes', 'produtoIdMenosVendido', 'totalVendasProdutoMenosVendido', 'produtoMenosVendidoDetalhes', 'quantidadeTotal'));
    }
    public function relatorioDados($id)

    {
        $dados = Pedido::with('carrinho.user')->with('cartao.user')->with('endereco.user')->find($id);
        // dd($dados);
        return redirect()->route('relatorio.vendedor', compact('dados'));
    }

    public function edit(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->statusId = $request->statusId;
        $pedido->save();

        $response['msg'] = 'Atualizado com sucesso!';
        return response()->json($response, 200);
    }
}
