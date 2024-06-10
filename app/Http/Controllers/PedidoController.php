<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\DadosCartao;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\ProdutoCarrinho;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

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

        foreach ($carrinho->carrinho as $produtoCarrinho) {
            $produtoFind = Produto::find($produtoCarrinho->produtoId);

            if ($produtoFind) {
                $novaQuantidadeEstoque = $produtoFind->quantidade - $produtoCarrinho->quantidade;
                if ($novaQuantidadeEstoque >= 0) {
                    $produtoFind->update(['quantidade' => $novaQuantidadeEstoque]);
                } else {
                }
            } else {
            }
        }

        foreach ($carrinho->carrinho as $produtoCarrinho) {
            // Criar um novo pedido para cada ProdutoCarrinho
            Pedido::create([
                'enderecoId' => $request->enderecoId,
                'produtoCarrinhoId' => $produtoCarrinho->id,
                'cartaoId' => $request->cartaoId,
                'statusId' => $request->statusId,
            ]);
        }
        $update = $carrinho->update(['finalizado' => true]);
        if ($update) {
            return redirect()->route('index');
        }
    }

    public function relatorioCliente()
    {
        $pedido = Pedido::all();
        $userId = auth()->user()->id;
        $pedidos = Pedido::whereHas('produtoCarrinho.carrinho', function ($query) use ($userId) {
            $query->where('userId', $userId);
        })->with('produtoCarrinho', 'produtoCarrinho.produtos', 'status')->get();
        $search = request('search');
        if ($search === '0' || $search === 'todos') {
            $pedidos = Pedido::whereHas('produtoCarrinho.carrinho', function ($query) use ($userId) {
                $query->where('userId', $userId);
            })->with('produtoCarrinho', 'produtoCarrinho.produtos', 'status')->get();
        } elseif (in_array($search, ['1', '2', '3'])) {
            $pedidos = Pedido::whereHas('produtoCarrinho.carrinho', function ($query) use ($userId) {
                $query->where('userId', $userId);
            })->where('statusId', $search)->with('produtoCarrinho', 'produtoCarrinho.produtos', 'status')->get();
        } else {
            // Se o usuário selecionar uma opção inválida, mostrar todos os pedidos
            $pedidos = Pedido::whereHas('produtoCarrinho.carrinho', function ($query) use ($userId) {
                $query->where('userId', $userId);
            })->with('produtoCarrinho', 'produtoCarrinho.produtos', 'status')->get();
        }

        $dataAtual = date('d-m-Y H:i:s');
        return view('Pedido.relatorioCliente', compact('pedidos', 'dataAtual'));
    }

    public function relatorioVendedor()
    {
        $pedido = Pedido::all();
        $pedidos = Pedido::with(['endereco', 'status', 'produtoCarrinho' => function ($query) {
            $query->with('produtos');
        }])->get();
        $search = request('search');
        if ($search === '0' || $search === 'todos') {
            $pedidos = Pedido::with('produtoCarrinho', 'produtoCarrinho.produtos', 'status')->get();
        } elseif (in_array($search, ['1', '2', '3'])) {
            $pedidos = Pedido::where('statusId', $search)->with('produtoCarrinho', 'produtoCarrinho.produtos', 'status')->get();
        } else {

            $pedidos = Pedido::with('produtoCarrinho', 'produtoCarrinho.produtos', 'status')->get();
        }
        $dataAtual = date('d-m-Y H:i:s');
        return view('Pedido.relatorioVendedor', compact('pedido', 'pedidos', 'dataAtual'));
    }

    public function relatorioVendas()
    {
        $pedidos = Pedido::all();
        $produtoMaisVendido = DB::table('pedido')
            ->join('produtocarrinho', 'pedido.produtoCarrinhoId', '=', 'produtocarrinho.id')
            ->select('produtocarrinho.produtoId', DB::raw('SUM(produtocarrinho.quantidade) as total_vendas'))
            ->groupBy('produtocarrinho.produtoId')
            ->orderByDesc('total_vendas')
            ->first();

        if ($produtoMaisVendido) {
            $produtoIdMaisVendido = $produtoMaisVendido->produtoId;
            $totalVendasProdutoMaisVendido = $produtoMaisVendido->total_vendas;
            $produtoMaisVendidoNome = Produto::find($produtoIdMaisVendido)->nome;
        } else {
            $produtoMaisVendidoNome = "Nenhum pedido realizado ainda";
            $totalVendasProdutoMaisVendido = 0;
        }

        $produtoMenosVendido = DB::table('pedido')
            ->join('produtocarrinho', 'pedido.produtoCarrinhoId', '=', 'produtocarrinho.id')
            ->select('produtocarrinho.produtoId', DB::raw('SUM(produtocarrinho.quantidade) as total_vendas'))
            ->groupBy('produtocarrinho.produtoId')
            ->orderBy('total_vendas')
            ->first();

        if ($produtoMenosVendido) {
            $produtoIdMenosVendido = $produtoMenosVendido->produtoId;
            $totalVendasProdutoMenosVendido = $produtoMenosVendido->total_vendas;
            $produtoMenosVendidoNome = Produto::find($produtoIdMenosVendido)->nome;
        } else {
            $produtoMenosVendidoNome = "Nenhum pedido realizado ainda";
            $totalVendasProdutoMenosVendido = 0;
        }


        $quantidadeTotalProdutos = DB::table('produtocarrinho')
            ->sum('quantidade');

        return view('Pedido.relatorioVendas', compact('pedidos', 'produtoMaisVendidoNome', 'totalVendasProdutoMaisVendido', 'produtoMenosVendidoNome', 'totalVendasProdutoMenosVendido', 'quantidadeTotalProdutos'));
    }

    public function relatorioDados($id)
    {
        $pedido = Pedido::findOrFail($id);
        $endereco = $pedido->endereco;
        $status = $pedido->status;
        return response()->json([
            'pedido' => $pedido,
            'endereco' => $endereco,
            'status' => $status,
        ]);
    }
    public function edit(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->statusId = $request->statusId;
        $pedido->save();
        $response['msg'] = 'Atualizado com sucesso!';
        return response()->json($response, 200);
    }
    public function getStatus(Request $request)
    {
        $option = $request->input('option');
        if ($option == 0) {
            $status = Status::all();
        } else {
            $status = Status::where('status_id', $option)->get();
        }
        return view('Pedido.relatorioVendedor', compact('status'));
    }
}
