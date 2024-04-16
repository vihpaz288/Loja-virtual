<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\PedidoController;
use App\Models\pedido;
use Illuminate\Support\Facades\Route;



// Vai estar dentro de user( recuperação de senha,)
Route::get('politica', [UserController::class, 'politica'])->name('politica');
Route::get('termo', [UserController::class, 'termo'])->name('termo');
Route::get('create/user', [UserController::class, 'create'])->name('create.user');
Route::post('store/user', [UserController::class, 'store'])->name('store.user');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('logar/user', [UserController::class, 'logar'])->name('logar');
Route::get('sair', [UserController::class, 'sair'])->name('sair');
Route::get('index', [UserController::class, 'index'])->name('index');
Route::get('dados/{id}', [UserController::class, 'dados'])->name('dados');
Route::put('dado/update/{id}', [UserController::class, 'updateDados'])->name('update.dado');
Route::get('enderecos', [UserController::class, 'enderecos'])->name('enderecos');
Route::get('endereco', [UserController::class, 'endereco'])->name('endereco');
Route::post('storeEndereco', [UserController::class, 'storeEndereco'])->name('store.endereco');
Route::put('endereco/update/{id}', [UserController::class, 'enderecoUpdate'])->name('update.endereco');
Route::delete('endereco/delete/{id}', [UserController::class, 'destroyEndereco'])->name('cartao.endereco');
Route::get('cartoes', [UserController::class, 'cartoes'])->name('cartoes');
Route::get('cartao', [UserController::class, 'cartao'])->name('cartao');
Route::post('storeCartao', [UserController::class, 'storeCartao'])->name('store.cartao');
Route::put('cartao/update/{id}', [UserController::class, 'cartaoUpdate'])->name('cartao.update');
Route::delete('cartao/delete/{id}', [UserController::class, 'destroyCartao'])->name('cartao.destroy');

// Vai esta dentro de produto (criar, detalhes, editar, deletar, filtrar)

Route::get('create/produto', [produtoController::class, 'create'])->name('create.produto');
Route::post('store/produto', [produtoController::class, 'store'])->name('store.produto');
Route::get('detalhes/{id}', [produtoController::class, 'detalhes'])->name('detalhes.produto');
Route::get('buscar', [produtoController::class, 'buscar'])->name('buscar');
Route::delete('/produto/{id}', [produtoController::class, 'destroy'])->name('produto.destroy');
Route::get('produto/edit/{id}', [ProdutoController::class, 'edit'])->name('edit.produto');
Route::put('produto/update/{id}', [ProdutoController::class, 'update'])->name('update.produto');


// Vai estar dentro de carrinho (criar, ver o que tem dentro, remover itens)

Route::get('index/carrinho', [CarrinhoController::class, 'index'])->name('index.carrinho');
Route::post('/carrinho/store', [CarrinhoController::class, 'store'])->name('carrinho.store');
Route::delete('carrinho/destroy/{id}', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');


// Vai estar dentro de pedido (Finalizar comprar, ver quantidade total de produtos, pedidos efetuados, ver produtos mais vendidos e menos vendidos, ver quantidade de usuarios cadastrados, remover quantidade a cada compra efetuada)

Route::get('finaliza', [PedidoController::class, 'finalizar'])->name('finalizar');
Route::post('store/pedido', [PedidoController::class, 'store'])->name('store.pedido');







