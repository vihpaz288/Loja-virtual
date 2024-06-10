<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\DadosCartao;
use App\Models\Endereco;
use App\Models\produto;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'dataNascimento' => 'required|date|before_or_equal:'.now()->subYears(18)->format('d-m-y'),
            'telefone' => 'required|string|max:100|min:12',
            'password' => 'required|string|min:4',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.max' => 'O campo email não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'dataNascimento.required' => 'O campo data de nascimento é obrigatório.',
            'dataNascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'dataNascimento.before_or_equal' => 'Desculpe, apenas maiores de 18 anos podem se cadastrar.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser uma string.',
            'telefone.max' => 'O campo telefone não pode ter mais de 12 caracteres.',
            'telefone.min' => 'O campo telefone não pode ter menos de 12 caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter no mínimo 4 caracteres.',
        ]);
        
        $senha = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'permissaoID' => $request->permissaoID,
            'telefone' => $request->telefone,
            'dataNascimento' => $request->dataNascimento,
            'password' => $senha,
        ]);
        return redirect()->route('login')->with('success', 'Parabéns! Seu cadastro foi realizado com sucesso. Agora você pode fazer login na sua conta.');    }
    public function login()
    {
        return view('Login');
    }
    public function logar(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:4',
        ], [
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.exists' => 'Este email não está registrado em nossa base de dados.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter no mínimo 4 caracteres.',
        ]);
        
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
