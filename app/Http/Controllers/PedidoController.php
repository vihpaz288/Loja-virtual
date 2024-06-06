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

        $produtoCarrinhoIdCopy = $request->produtoCarrinhoId;
        $ultimoProdutoCarrinhoId = end($produtoCarrinhoIdCopy);
        Pedido::create([
            'enderecoId' => $request->enderecoId,
            'produtoCarrinhoId' => $ultimoProdutoCarrinhoId,
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
        $userId = auth()->user()->id;

        // $pedidos = Pedido::whereHas('produtoCarrinho.carrinho', function ($query) use ($userId) {
        //     $query->where('userId', $userId)->where('finalizado', true); 
        // })
        // ->with([
        //     'endereco', 
        //     'status', 
        //     'produtoCarrinho' => function ($query) {
        //         $query->with('produtos'); 
        //     },
        //     'produtoCarrinho.carrinho' => function ($query) use ($userId) {
        //         $query->where('userId', $userId)->where('finalizado', true); 
        //     }
        // ])
        // ->get();
        
        $pedidos = ProdutoCarrinho::with('produtos')->whereHas('carrinho', function ($query) use ($userId) {
            $query->where('userId', $userId)->where('finalizado', true);
        })->get();
        $status = Pedido::with('status')->with('produtoCarrinho.carrinho')->with('produtoCarrinho.produtos')->get();
   
        
     
        $dataAtual = date('d-m-Y H:i:s');
        return view('Pedido.relatorioCliente', compact('pedidos', 'dataAtual', 'status'));
    }

    public function relatorioVendedor()
    {
        $pedidos = Pedido::with(['endereco', 'status', 'produtoCarrinho' => function ($query) {
            $query->with('produtos');
        }])->get();
        $search = request('search');
        if ($search === '0' || $search === 'todos') {
            $pedidos = Pedido::all();
        } elseif ($search === '1') {
            $pedidos = Pedido::where('statusId', 1)->get();
        } elseif ($search === '2') {
            $pedidos = Pedido::where('statusId', 2)->get();
        } elseif ($search === '3') {
            $pedidos = Pedido::where('statusId', 3)->get();
        } else {
            $pedidos = Pedido::all();
        }
        $dataAtual = date('d-m-Y H:i:s');
        return view('Pedido.relatorioVendedor', compact('pedidos', 'dataAtual'));
    }

    public function relatorioVendas()
    {
        $produtoMaisVendido = DB::table('produtocarrinho')
            ->select('produtoId', DB::raw('SUM(quantidade) as total_vendas'))
            ->groupBy('produtoId')
            ->orderByDesc('total_vendas')
            ->first();
        $produtoIdMaisVendido = $produtoMaisVendido->produtoId;
        $totalVendasProdutoMaisVendido = $produtoMaisVendido->total_vendas;
        $produtoMaisVendidoNome = Produto::find($produtoIdMaisVendido)->nome;

        $produtoMenosVendido = DB::table('produtocarrinho')
            ->select('produtoId', DB::raw('SUM(quantidade) as total_vendas'))
            ->groupBy('produtoId')
            ->orderBy('total_vendas')
            ->first();
        $produtoIdMenosVendido = $produtoMenosVendido->produtoId;
        $totalVendasProdutoMenosVendido = $produtoMenosVendido->total_vendas;
        $produtoMenosVendidoNome = Produto::find($produtoIdMenosVendido)->nome;

        $quantidadeTotalProdutos = DB::table('produtocarrinho')
            ->sum('quantidade');
            
        return view('Pedido.relatorioVendas', compact('produtoMaisVendidoNome', 'totalVendasProdutoMaisVendido', 'produtoMenosVendidoNome', 'totalVendasProdutoMenosVendido', 'quantidadeTotalProdutos'));
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
