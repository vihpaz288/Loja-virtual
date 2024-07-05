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
        // Encontrar o carrinho ativo do usuário ou criar um novo se não existir
        $carrinho = Carrinho::with('carrinho')->where('userId', auth()->user()->id)
                        ->where('finalizado', false)->first();
    
        if (!$carrinho) {
            $carrinho = Carrinho::create([
                'userId' => auth()->user()->id,
                'finalizado' => false,
            ]);
        }
    
        // Encontrar o produto pelo ID fornecido na requisição
        $produto = Produto::find($request->produtoId);
    
        if (!$produto) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }
    
        // Verificar se a quantidade solicitada está disponível em estoque
        if ($request->quantidade > $produto->quantidade) {
            return redirect()->back()->with('error', 'Quantidade solicitada maior do que a disponível em estoque.');
        }
    
        // Verificar se o produto já existe no carrinho do usuário
        $itemCarrinho = $carrinho->carrinho()->where('produtoId', $produto->id)->first();
    
        if ($itemCarrinho) {
            // Se já existe, atualizar a quantidade e o valor
            $novaQuantidade = $itemCarrinho->quantidade + $request->quantidade;
            $novoValor = $novaQuantidade * $produto->valor;
    
            // Verificar se a nova quantidade não ultrapassa o estoque
            if ($novaQuantidade > $produto->quantidade) {
                return redirect()->back()->with('error', 'Quantidade solicitada maior do que a disponível em estoque.');
            }
    
            $itemCarrinho->update([
                'quantidade' => $novaQuantidade,
                'valor' => $novoValor,
            ]);
        } else {
            // Se não existe, criar um novo item de carrinho
            $valorTotal = $request->quantidade * $produto->valor;
    
            ProdutoCarrinho::create([
                'carrinhoId' => $carrinho->id,
                'produtoId' => $produto->id,
                'quantidade' => $request->quantidade,
                'valor' => $valorTotal,
            ]);
        }
    
        return redirect()->route('index')->with('success', 'Produto adicionado ao carrinho com sucesso.');
    }
    public function atualizarQuantidade($itemId, Request $request) {
        $item = ProdutoCarrinho::findOrFail($itemId);

        $item->update([
            'quantidade' => $request->quantidade,
            'valor'      => $request->itemValor * $request->quantidade
        ]);
        // Retornar o valor atualizado para o JavaScript
        return response()->json(['valor' => $item->valor]); // Ajuste para o campo correto que armazena o valor total do item
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
