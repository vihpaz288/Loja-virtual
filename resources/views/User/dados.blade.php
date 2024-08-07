<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    a.underlineHover:after {
        display: block;
        left: 0;
        bottom: -10px;
        width: 0;
        height: 2px;
        background-color: #808080;
        content: "";
        transition: width 0.2s;
    }

    a.underlineHover:hover {
        color: #808080;
    }

    a.underlineHover:hover:after {
        width: 100%;
        color: #808080;
    }

    .navbar-nav li.nav-item {
        position: relative;
        transition: all 0.3s ease;
    }

    .navbar-nav li.nav-item::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 0%;
        height: 2px;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    .navbar-nav li.nav-item:hover::after {
        width: 100%;
    }

    .navbar-nav .nav-link.active::after,
    .navbar-nav .nav-link[href="{{route('dados', Auth::user()->id)}}"]::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        transition: none;
    }

    .link {
        color: black;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .link:hover {
        color: #808080;
    }
</style>
@if(session('error'))
<div id="error-message">
    <p>{{session('error')}}</p>
</div>
@endif

@if(session('success'))
<div id="success-message">
    <p>{{session('success')}}</p>
</div>
@endif

<body style="min-width: 372px;">
    <nav style="background-color: #000000;" class="navbar navbar-expand-lg navbar-dark border-bottom shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href=""><strong>Loja virtual</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-collapse">
                <span class="navbar-toggle-icon"></span>
            </button>
            <div class="align-self-end">
                <ul class="navbar-nav">
                    @if (auth()->check())
                    @if (auth()->user()->permissaoID == 1)
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dados', Auth::user()->id) }}">Dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('create.produto')}}">Produtos</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('relatorio.vendedor')}}">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('relatorio.vendas')}}">Relatorio</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dados', Auth::user()->id) }}">Dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('relatorio.cliente')}}">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('index.carrinho') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708" />
                            </svg>
                        </a>
                    </li>
                    @endif
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('sair') }}">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data de nascimento</th>
                <th>Senha</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <tr>
                <td id="valor_name{{$dados->id}}">{{$dados->name}}</td>
                <td id="valor_email{{$dados->id}}">{{$dados->email}}</td>

                <td id="valor_telefone{{$dados->id}}">{{$dados->telefone}}</td>
                <td id="valor_dataNascimento{{$dados->id}}">{{$dados->dataNascimento}}</td>
                <td id="valor_password{{$dados->id}}">
                </td>
                <td>
                    <button class="btn btn-link btn-sm btn-rounded" id='botao_editar{{ $dados->id }}' class="btn btn-link btn-sm btn-rounded" style="color:#000000;" onclick='editar_registro({{ $dados->id }})'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                        <button type="button" id='botao_salvar{{ $dados->id }}' class="btn btn-link btn-sm btn-rounded" onclick='salvar_registro({{ $dados->id }})' style="display: none; color:#000000">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                            </svg>
                        </button>
                        @if (auth()->check())
                        @if (auth()->user()->permissaoID == 2)

                        <button type="button" class="btn btn-link btn-sm btn-rounded" data-bs-toggle="modal" style="color:#000000;" data-bs-target="#staticBackdrop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg>
                        </button>
                        <button class="btn btn-link btn-sm btn-rounded" style="color:#000000;" data-bs-toggle="modal" data-bs-target="#staticBackdropEnd">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                            </svg>
                        </button>
                </td>
                @endif
                @endif
            </tr>

        </tbody>
    </table>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center;">Cartão cadastrado</h5>
                <a class="link" href="{{route('cartao')}}"> Deseja cadastrar novo cartão? Clique aqui</a>
                <div class="modal-header">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Banco</th>
                                <th>Numero</th>
                                <th>Vencimento</th>
                                <th>Cvv</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartoes as $cartao)
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <tr>
                                <td id="valor_nome{{$cartao->id}}">{{ $cartao->nome }}</td>
                                <td id="valor_numero{{$cartao->id}}">{{ $cartao->numero }}</td>
                                <td id="valor_vencimento{{$cartao->id}}">{{ $cartao->vencimento }}</td>
                                <td id="valor_cvv{{$cartao->id}}">{{$cartao->cvv}}</td>
                                <td><button type='button' id='botao_editar{{ $cartao->id }}' class="btn btn-link btn-sm btn-rounded" style="color:#000000;" onclick='editar_registroCart({{ $cartao->id }})'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button>
                                    <button type='button' id='botao_salvar{{ $cartao->id }}' class="btn btn-link btn-sm btn-rounded" style="color:#000000; display:none;" onclick='salvar_registroCart({{ $cartao->id }})' style="display: none;"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                                        </svg></button>
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded" style="color:#000000;" onclick="deletarCartao({{$cartao->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                </td>
                                <td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdropEnd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center;">Endereço cadastrado</h5>
                <a class="link" href="{{route('endereco')}}">Deseja cadastrar novo endereço? Clique aqui</a>

                <div class="modal-header">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Nome</th>
                                <th>Estado</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>Rua</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enderecos as $endereco)
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <tr>
                                <td id="valor_nomeEnd{{$endereco->id}}">{{$endereco->nome}}</td>
                                <td id="valor_CEP{{$endereco->id}}">{{$endereco->CEP}}</td>
                                <td id="valor_Estado{{$endereco->id}}">{{$endereco->Estado}}</td>
                                <td id="valor_cidade{{$endereco->id}}">{{$endereco->cidade}}</td>
                                <td id="valor_rua{{$endereco->id}}">{{$endereco->rua}}</td>
                                <td id="valor_numeroEnd{{$endereco->id}}">{{$endereco->numero}}</td>
                                <td id="valor_complemento{{$endereco->id}}">{{$endereco->complemento}}</td>
                                <td>
                                    <button type='button' id='botao_editar{{ $endereco->id }}' class="btn btn-link btn-sm btn-rounded" style="color:#000000;" onclick='editar_registroEnd({{ $endereco->id }})'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button>
                                    <button type='button' id='botao_salvar{{ $endereco->id }}' class="btn btn-link btn-sm btn-rounded" style="color:#000000; display:none" onclick='salvar_registroEnd({{ $endereco->id }})'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                                        </svg></button>
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded" style="color:#000000;" onclick="deletarEndereco({{$endereco->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
    function editar_registro(id) {
        $(`#botao_salvar${id}`).show();
        $(`#botao_editar${id}`).hide();

        var name = $(`#valor_name${id}`).html();
        $(`#valor_name${id}`).html(`<input type='text' id='name_text${id}' value='${name}'>`);

        var email = $(`#valor_email${id}`).html();
        $(`#valor_email${id}`).html(`<input type='text' id='email_text${id}' value='${email}'>`);

        var telefone = $(`#valor_telefone${id}`).html();
        $(`#valor_telefone${id}`).html(`<input type='text' id='telefone_text${id}' value='${telefone}'>`);

        var dataNascimento = $(`#valor_dataNascimento${id}`).html();
        $(`#valor_dataNascimento${id}`).html(`<input type='text' id='dataNascimento_text${id}' value='${dataNascimento}'>`);

        var password = $(`#valor_password${id}`).html();
        $(`#valor_password${id}`).html(`<input type='text' id='password_text${id}' value='${password}'>`);
    }

    function salvar_registro(id) {
        const name = $(`#name_text${id}`).val();
        const email = $(`#email_text${id}`).val();
        const telefone = $(`#telefone_text${id}`).val();
        const dataNascimento = $(`#dataNascimento_text${id}`).val();
        const password = $(`#password_text${id}`).val();
        const _token = $('#_token').val();

        $.ajax({
            type: "PUT",
            url: `/dado/update/${id}`,
            data: {
                name,
                email,
                telefone,
                dataNascimento,
                password,
                _token,
            },
            success: function(response) {
                console.log(response);
                $('#valor_name' + id).html(name);
                $('#valor_email' + id).html(email);
                $('#valor_telefone' + id).html(telefone);
                $('#valor_dataNascimento' + id).html(dataNascimento);
                $('#valor_password' + id).html(password);

                iziToast.success({
                    title: 'Atualizado',
                    message: response.message,
                });

                $(`#botao_salvar${id}`).hide();
                $(`#botao_editar${id}`).show();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                // Se houver erros de validação, exiba as mensagens de erro
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    iziToast.error({
                        title: 'Erro de Validação',
                        message: xhr.responseJSON.message.join('<br>'),
                        message: xhr.responseJSON.message.join('<br>'),
                    });
                } else {
                    // Se não forem erros de validação, exiba uma mensagem genérica
                    iziToast.error({
                        title: 'Erro',
                        message: 'Erro ao atualizar dados.',
                    });
                }
            }
        });
    }




    const deletarCartao = (id_cartao) => {
        $.ajax({
            type: "delete",
            url: `/cartao/delete/${id_cartao}`,
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $(`.tr-cartao-${id_cartao}`).remove();

                iziToast.success({
                    title: 'Sucesso!',
                    message: response.msg
                });

                setTimeout(() => {
                    location.reload();
                }, "1000");
            },
            error: function(response) {
                console.log(response);
                iziToast.warning({
                    title: 'Ops!',
                    message: response.responseJSON.message,
                });
            }
        });
    }


    function editar_registroCart(id) {
    $(`#botao_salvar${id}`).show();
    $(`#botao_editar${id}`).hide();

    // Aguarde o documento estar pronto antes de aplicar as máscaras
    $(document).ready(function() {
        // Máscara para o número do cartão
        $('#numero_text' + id).mask('0000 0000 0000 0000');
        
        // Máscara para o CVV
        $('#cvv_text' + id).mask('000');
        
        // Máscara para a data de vencimento (MM/YY)
        $('#vencimento_text' + id).mask('00/0000');
    });

    var nome = $(`#valor_nome${id}`).html();
    $(`#valor_nome${id}`).html(`<input type='text' id='nome_text${id}' value='${nome}'>`);

    var numero = $(`#valor_numero${id}`).html();
    $(`#valor_numero${id}`).html(`<input type='text' id='numero_text${id}' value='${numero}'>`);

    var vencimento = $(`#valor_vencimento${id}`).html();
    $(`#valor_vencimento${id}`).html(`<input type='text' id='vencimento_text${id}' value='${vencimento}'>`);

    var cvv = $(`#valor_cvv${id}`).html();
    $(`#valor_cvv${id}`).html(`<input type='text' id='cvv_text${id}' value='${cvv}'>`);
}

function salvar_registroCart(id) {
    const nome = $(`#nome_text${id}`).val();
    const numero = $(`#numero_text${id}`).val();
    const vencimento = $(`#vencimento_text${id}`).val();
    const cvv = $(`#cvv_text${id}`).val();
    const _token = $('#_token').val();

    $.ajax({
        type: "put",
        url: `/cartao/update/${id}`,
        data: {
            nome,
            numero,
            vencimento,
            cvv,
            _token,
        },
        success: function(response) {
            console.log(response);

            $('#valor_nome' + id).html(nome);
            $('#valor_numero' + id).html(numero);
            $('#valor_vencimento' + id).html(vencimento);
            $('#valor_cvv' + id).html(cvv);

            iziToast.success({
                title: 'Atualizado',
                message: response.message,
            });
            $(`#botao_salvar${id}`).hide();
            $(`#botao_editar${id}`).show();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);

            // Verifica se há erros de validação
            if (xhr.responseJSON && xhr.responseJSON.error) {
                iziToast.error({
                    title: 'Erro de Validação',
                    message: xhr.responseJSON.message.join('<br>'),
                });
            } else {
                // Se não forem erros de validação, exibe mensagem genérica
                iziToast.error({
                    title: 'Erro',
                    message: 'Erro ao atualizar dados.',
                });
            }
        }
    });
}
const deletarEndereco = (id_endereco) => {
        $.ajax({
            type: "delete",
            url: `/endereco/delete/${id_endereco}`,
            data: {
                _token: '{{ csrf_token() }}' 
            },
            success: function(response) {
                $(`.tr-endereco-${id_endereco}`).remove();

                iziToast.success({
                    title: 'Sucesso!',
                    message: response.msg
                });

                setTimeout(() => {
                    location.reload();
                }, "1000");
            },
            error: function(response) {
                console.log(response);
                iziToast.warning({
                    title: 'Ops!',
                    message: response.responseJSON.message,
                });
            }
        });
    }




    function editar_registroEnd(id) {
    // Mostrar botão de salvar e ocultar botão de editar
    $(`#botao_salvar${id}`).show();
    $(`#botao_editar${id}`).hide();

    // Capturar os valores atuais dos campos e substituir por inputs de texto
    $(`#valor_nomeEnd${id}`).html(`<input type='text' id='nome_text${id}' value='${$(`#valor_nomeEnd${id}`).text()}'>`);
    $(`#valor_CEP${id}`).html(`<input type='text' id='CEP_text${id}' value='${$(`#valor_CEP${id}`).text()}'>`);
    $(`#valor_Estado${id}`).html(`<input type='text' id='Estado_text${id}' value='${$(`#valor_Estado${id}`).text()}'>`);
    $(`#valor_cidade${id}`).html(`<input type='text' id='cidade_text${id}' value='${$(`#valor_cidade${id}`).text()}'>`);
    $(`#valor_rua${id}`).html(`<input type='text' id='rua_text${id}' value='${$(`#valor_rua${id}`).text()}'>`);
    $(`#valor_numeroEnd${id}`).html(`<input type='text' id='numero_text${id}' value='${$(`#valor_numeroEnd${id}`).text()}'>`);
    $(`#valor_complemento${id}`).html(`<input type='text' id='complemento_text${id}' value='${$(`#valor_complemento${id}`).text()}'>`);
    $(`#valor_bairro${id}`).html(`<input type='text' id='bairro_text${id}' value='${$(`#valor_bairro${id}`).text()}'>`);

    // Adicionar evento para buscar informações do CEP ao digitar
    $(`#CEP_text${id}`).on('keyup', function() {
        const cep = $(this).val().replace(/\D/g, ''); // Remover caracteres não numéricos do CEP

        if (cep.length === 8) { // Verificar se o CEP está completo
            $.ajax({
                url: `https://viacep.com.br/ws/${cep}/json/`,
                dataType: 'json',
                success: function(data) {
                    // Preencher os campos de estado, cidade, bairro e rua com os dados recebidos
                    $(`#Estado_text${id}`).val(data.uf);
                    $(`#cidade_text${id}`).val(data.localidade);
                    $(`#bairro_text${id}`).val(data.bairro);
                    $(`#rua_text${id}`).val(data.logradouro);
                    $(`#valor_nomeEnd${id}`).val(data.logradouro); // Atribuir o nome do logradouro se disponível na API
                },
                error: function() {
                    console.error('Erro ao consultar o serviço do ViaCEP.');
                    limparCamposEndereco(id); // Limpar campos se houver erro na consulta
                }
            });
        } else {
            limparCamposEndereco(id); // Limpar campos se o CEP não estiver completo
        }
    });

    // Função para limpar campos de endereço
    function limparCamposEndereco(id) {
        $(`#Estado_text${id}`).val('');
        $(`#cidade_text${id}`).val('');
        $(`#bairro_text${id}`).val('');
        $(`#rua_text${id}`).val('');
        $(`#valor_nomeEnd${id}`).val('');
    }
}


function salvar_registroEnd(id) {
    // Recuperar os novos valores dos inputs
    const nome = $(`#nome_text${id}`).val();
    const Estado = $(`#Estado_text${id}`).val();
    const CEP = $(`#CEP_text${id}`).val();
    const cidade = $(`#cidade_text${id}`).val();
    const rua = $(`#rua_text${id}`).val();
    const numero = $(`#numero_text${id}`).val();
    const complemento = $(`#complemento_text${id}`).val();
    const _token = $('#_token').val(); // Recuperar o token CSRF

    // Enviar os dados via AJAX para atualização no backend
    $.ajax({
        type: "PUT",
        url: `/endereco/update/${id}`,
        data: {
            nome,
            Estado,
            CEP,
            cidade,
            rua,
            numero,
            complemento,
            _token,
        },
        success: function(response) {
            // Exibir mensagem de sucesso e atualizar os dados na interface
            console.log(response);
            iziToast.success({
                title: 'Atualizado',
                message: response.message,
            });
            atualizarDados(id, nome, Estado, CEP, cidade, rua, numero, complemento);
            // Esconder botão de salvar e mostrar botão de editar novamente
            $(`#botao_salvar${id}`).hide();
            $(`#botao_editar${id}`).show();
        },
        error: function(xhr, status, error) {
            // Exibir mensagem de erro em caso de falha
            console.error(xhr.responseText);
            let errorMessage = 'Ocorreu um erro ao atualizar o registro.';
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                errorMessage = Object.values(xhr.responseJSON.errors).join('<br>');
            }
            iziToast.error({
                title: 'Erro',
                message: errorMessage,
            });
            // Manter o botão de salvar visível para permitir correções
            $(`#botao_salvar${id}`).show();
            $(`#botao_editar${id}`).hide();
        }
    });
}


function atualizarDados(id, nome, Estado, CEP, cidade, rua, numero, complemento) {
    // Atualizar os dados na interface após a edição
    $(`#valor_nomeEnd${id}`).text(nome);
    $(`#valor_CEP${id}`).text(CEP);
    $(`#valor_Estado${id}`).text(Estado);
    $(`#valor_cidade${id}`).text(cidade);
    $(`#valor_rua${id}`).text(rua);
    $(`#valor_numeroEnd${id}`).text(numero);
    $(`#valor_complemento${id}`).text(complemento);
}

</script>

</html>