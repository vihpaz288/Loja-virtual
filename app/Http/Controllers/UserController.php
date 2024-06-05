<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\DadosCartao;
use App\Models\Endereco;
use App\Models\produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;

class UserController extends Controller
{
    public function politica()
    {
        return view('Politica');
    }
    public function termo()
    {
        return view('Uso');
    }
    public function create()
    {
        return view('Create');
    }
    public function store(Request $request)
    {
        $senha = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'permissaoID' => $request->permissaoID,
            'telefone' => $request->telefone,
            'dataNascimento' => $request->dataNascimento,
            'password' => $senha,
        ]);
        return redirect()->route('login');
    }
    public function login()
    {
        return view('Login');
    }
    public function logar(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        }
    }
    public function sair()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function index()
    {
        $produtos = Produto::with('image')->get();
        // if (auth()->check()) {
        //     $itens = Carrinho::with('produtos')->where('userId', auth()->user()->id)->where('finalizado', 'false')->get();
        // } else {
        //     $itens = 0;
        // }
        $search = request('search');
        return view('Index', compact('produtos'));
    }
    public function cartao()
    {
        return view('User.createCartao');
    }
    public function storeCartao(Request $request)
    {
        $criar = DadosCartao::create($request->all());
        return redirect()->route('dados', Auth::user()->id);
    }
    public function cartaoUpdate(Request $request, $id)
    {
        $dados = DadosCartao::findOrFail($id);
        $dados->nome = $request->input('nome');
        $dados->numero = $request->input('numero');
        $dados->vencimento = $request->input('vencimento');
        $dados->cvv = $request->input('cvv');
        $dados->save();
        return response()->json([
            'message' => 'Dados atualizados com sucesso.',
            'data' => $dados,
        ]);
    }
    public function destroyCartao($id)
    {
        $cartao = DadosCartao::Find($id);
        if (!$cartao) {
            $response['erro']   = true;
            $response['msg']    = 'Cartão não encontrada!';
            return response()->json($response, 404);
        }
        if (isset($cartao) && $cartao->delete()) {
            $response['erro']  = false;
            $response['msg']    = 'Cartão deletado com sucesso!';
            return response()->json($response, 200);
        }
        $response['erro']   = true;
        $response['msg']    = 'Erro ao deletar conta';
        $response['conta']  = $cartao;
        return response()->json($response, 500);
    }
    public function dados($id)
    {
        $user = Auth::user();
        $dados = User::findOrFail($id);
        $cartoes = DadosCartao::where('userId', $user->id)->get();
        $enderecos = Endereco::where('userId', $user->id)->get();
        return view('User.dados', compact('dados', 'cartoes', 'enderecos'));
    }
    public function updateDados(Request $request, $id)
    {
      
    
        $dados = User::findOrFail($id);
        $dados->name = $request->input('name');
        $dados->email = $request->input('email');
        $dados->password = bcrypt($request->input('password'));
        $dados->save();
        return response()->json([
            'message' => 'Dados atualizados com sucesso.',
            'data' => $dados,
        ]);
    }
    public function endereco()
    {
        return view('User.createEndereco');
    }
    public function storeEndereco(Request $request)
    {
        Endereco::create($request->all());
        return redirect()->route('dados', Auth::user()->id);
    }
    public function enderecoUpdate(Request $request, $id)
    {
        $dados = Endereco::findOrFail($id);
        $dados->nome = $request->input('nome');
        $dados->Estado = $request->input('Estado');
        $dados->CEP = $request->input('CEP');
        $dados->cidade = $request->input('cidade');
        $dados->rua = $request->input('rua');
        $dados->numero = $request->input('numero');
        $dados->complemento = $request->input('complemento');
        $dados->save();
        return response()->json([
            'message' => 'Dados atualizados com sucesso.',
            'data' => $dados,
        ]);
    }
    public function destroyEndereco($id)
    {
        $endereco = Endereco::Find($id);
        if (!$endereco) {
            $response['erro']   = true;
            $response['msg']    = 'Endereço não encontrada!';
            return response()->json($response, 404);
        }
        if (isset($endereco) && $endereco->delete()) {
            $response['erro']  = false;
            $response['msg']    = 'Endereço deletado com sucesso!';
            return response()->json($response, 200);
        }
        $response['erro']   = true;
        $response['msg']    = 'Erro ao deletar conta';
        $response['conta']  = $endereco;
        return response()->json($response, 500);
    }
}
