<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\DadosCartao;
use App\Models\Endereco;
use App\Models\produto;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
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
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email|max:50|min:13|unique:users',
            'dataNascimento' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'telefone' => 'required|string|max:15|min:8',
            'password' => 'required|string|min:4|max:20',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.min' => 'O campo nome não pode ter menos de 3 caracteres.',
            'name.max' => 'O campo nome não pode ter mais de 30 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.max' => 'O campo email não pode ter mais de 50 caracteres.',
            'email.min' => 'O campo email não pode ter menos de 13 caracteres.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'dataNascimento.required' => 'O campo data de nascimento é obrigatório.',
            'dataNascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'dataNascimento.before_or_equal' => 'Desculpe, apenas maiores de 18 anos podem se cadastrar.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser uma string.',
            'telefone.max' => 'O campo telefone não pode ter mais de 15 caracteres.',
            'telefone.min' => 'O campo telefone não pode ter menos de 12 caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter no mínimo 4 caracteres.',
            'password.max' => 'A senha deve ter no maximo 20 caracteres.',
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
        return redirect()->route('login')->with('success', 'Parabéns! Seu cadastro foi realizado com sucesso. Agora você pode fazer login na sua conta.')->withInput();
    }
    public function login()
    {
        return view('Login');
    }
    public function logar(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:4|max:20',
        ], [
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.exists' => 'Este email não está registrado em nossa base de dados.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter no mínimo 4 caracteres.',
            'password.max' => 'A senha deve ter no máximo 20 caracteres.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('index')->withInput();
        } else {
            return redirect()->back()->withErrors(['password' => 'A senha fornecida está incorreta.'])->withInput();
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
        $request->validate([
            'nome' => 'string|min:3|max:20',
            'numero' => 'min:16|max:10',
            'vencimento' => 'required',
            'cvv' => 'required|digits:3'
        ], [
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.min' => 'O campo nome não pode ter menos de 3 caracteres.',
            'nome.max' => 'O campo nome não pode ter mais de 20 caracteres.',
            'numero.min' => 'O campo número não pode ter menos de 16 números.',
            'vencimento.required' => 'O campo vencimento é obrigatório.',
            'cvv.required' => 'O campo CVV é obrigatório.',
            'cvv.digits' => 'O campo CVV deve ter exatamente 3 dígitos.'
        ]);
        $criar = DadosCartao::create($request->all());
        return redirect()->route('dados', Auth::user()->id)->withInput();
    }
    
    public function cartaoUpdate(Request $request, $id)
    {
        $rules = [
            'nome' => 'required|min:3|max:20',
            'numero' => 'required|min:19',
            'vencimento' => [
                'required',
                'regex:/^(0[1-9]|1[0-2])\/\d{4}$/',
                function ($attribute, $value, $fail) {
                    // Verifica se o mês é válido
                    $mesAno = explode('/', $value);
                    $mes = (int)$mesAno[0];
                    $ano = (int)$mesAno[1];
                    
                    if ($mes < 1 || $mes > 12) {
                        $fail("O mês de vencimento deve ser um número entre 01 e 12.");
                    }
            
                    // Comparar com a data atual
                    $hoje = now();
                    $dataVencimento = Carbon::createFromFormat('m/Y', $value);
            
                    if ($dataVencimento->lessThan($hoje)) {
                        $fail("A data de vencimento deve ser maior ou igual ao mês e ano atuais.");
                    }
                },
            ],
            'cvv' => 'required|digits:3',
        ];
    
        // Mensagem de erro personalizada para a validação
        $messages = [
            'vencimento.required' => 'O campo data de vencimento é obrigatório.',
        ];
    
        // Valida os dados recebidos
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Verifica se há erros de validação
        if ($validator->fails()) {
            // Retorna todos os erros de validação
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    
        // Se a validação passar, atualiza os dados do cartão
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
        // Validação dos dados
        $request->validate([
            'name' => 'string|min:3|max:30',
            'email' => 'string|email|max:50|min:13|unique:users,email,' . $id,
            'dataNascimento' => 'min:10|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'telefone' => 'string|max:16|min:14',
            'password' => 'string|min:4|max:20',
        ], [
            'name.string' => 'O campo nome deve ser uma string.',
            'name.min' => 'O campo nome não pode ter menos de 3 caracteres.',
            'name.max' => 'O campo nome não pode ter mais de 30 caracteres.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.max' => 'O campo email não pode ter mais de 50 caracteres.',
            'email.min' => 'O campo email não pode ter menos de 13 caracteres.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'dataNascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'dataNascimento.before_or_equal' => 'Desculpe, apenas maiores de 18 anos podem se cadastrar.',
            'telefone.string' => 'O campo telefone deve ser uma string.',
            'telefone.max' => 'O campo telefone não pode ter mais de 15 caracteres.',
            'telefone.min' => 'O campo telefone não pode ter menos de 8 caracteres.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter no mínimo 4 caracteres.',
            'password.max' => 'A senha deve ter no máximo 20 caracteres.',
        ]);

        // Após a validação, continue com a atualização dos dados
        $dados = User::findOrFail($id);
        $dados->name = $request->input('name');
        $dados->email = $request->input('email');
        $dados->telefone = $request->input('telefone');
        $dados->dataNascimento = $request->input('dataNascimento');

        // Verifique se uma nova senha foi fornecida antes de atualizar
        if ($request->filled('password')) {
            $dados->password = bcrypt($request->input('password'));
        }

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
        $request->validate([
            'nome' => 'required|string|min:3|max:20',
            'CEP' => 'required',
            'Estado' => 'required|string|max:50',
            'numero' => 'required|string|max:10|min:1',
            'complemento' => 'nullable|string|max:50|min:1',
            'cidade' => 'required|string|max:100|min:3',
            'rua' => 'required|string|max:100|min:1',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'nome.max' => 'O campo nome não pode ter mais de 100 caracteres.',
            'CEP.required' => 'O campo CEP é obrigatório.',
            'Estado.required' => 'O campo estado é obrigatório.',
            'Estado.string' => 'O campo estado deve ser uma string.',
            'Estado.max' => 'O campo estado não pode ter mais de 50 caracteres.',
            'numero.required' => 'O campo número é obrigatório.',
            'numero.string' => 'O campo número deve ser uma string.',
            'rua.numero' => 'O campo número não pode ter menos de 1 caracteres.',
            'numero.max' => 'O campo número não pode ter mais de 10 caracteres.',
            'complemento.string' => 'O campo complemento deve ser uma string.',
            'complemento.max' => 'O campo complemento não pode ter mais de 50 caracteres.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'cidade.string' => 'O campo cidade deve ser uma string.',
            'cidade.min' => 'O campo cidade não pode ter menos de 1 caracteres.',
            'cidade.max' => 'O campo cidade não pode ter mais de 20 caracteres.',
            'rua.required' => 'O campo rua é obrigatório.',
            'rua.string' => 'O campo rua deve ser uma string.',
            'rua.max' => 'O campo rua não pode ter mais de 100 caracteres.',
            'rua.min' => 'O campo rua não pode ter menos de 1 caracteres.',
        ]);

        Endereco::create($request->all());
        return redirect()->route('dados', Auth::user()->id)->withInput();
    }
    public function enderecoUpdate(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|min:3|max:20',
            'CEP' => 'required|digits:8|numeric',
            'Estado' => 'required|string|size:2',
            'numero' => 'required|string|max:10|min:1',
            'complemento' => 'nullable|string|max:50',
            'cidade' => 'required|string|max:100|min:3',
            'rua' => 'required|string|max:100|min:1',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'nome.max' => 'O campo nome não pode ter mais de 100 caracteres.',
            'CEP.required' => 'O campo CEP é obrigatório.',
            'Estado.required' => 'O campo estado é obrigatório.',
            'Estado.string' => 'O campo estado deve ser uma string.',
            'Estado.max' => 'O campo estado não pode ter mais de 50 caracteres.',
            'numero.required' => 'O campo número é obrigatório.',
            'numero.string' => 'O campo número deve ser uma string.',
            'rua.numero' => 'O campo número não pode ter menos de 1 caracteres.',
            'numero.max' => 'O campo número não pode ter mais de 10 caracteres.',
            'complemento.string' => 'O campo complemento deve ser uma string.',
            'complemento.max' => 'O campo complemento não pode ter mais de 50 caracteres.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'cidade.string' => 'O campo cidade deve ser uma string.',
            'cidade.min' => 'O campo cidade não pode ter menos de 1 caracteres.',
            'cidade.max' => 'O campo cidade não pode ter mais de 20 caracteres.',
            'rua.required' => 'O campo rua é obrigatório.',
            'rua.string' => 'O campo rua deve ser uma string.',
            'rua.max' => 'O campo rua não pode ter mais de 100 caracteres.',
            'rua.min' => 'O campo rua não pode ter menos de 1 caracteres.',
        ]);

        
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
