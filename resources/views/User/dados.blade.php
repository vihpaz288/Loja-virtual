<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</style>

<body style="min-width: 372px;">
    <nav style="background-color: #000000;" class="navbar navbar-expand-lg navbar-dark border-bottom shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href=""><strong>Loja virtual</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-collapse">
                <span class="navbar-toggle-icon"></span>
            </button>
            <div class="align-self-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">{{ Auth::user()->name }}</a>
                    </li>
                    @if (auth()->check())
                    @if (auth()->user()->permissaoID == 1)
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('index')}}">Home</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('create.produto')}}">Produtos</a>
                
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('relatorio.vendedor')}}">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('relatorio.vendedor')}}">Relatorio</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Home</a>
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
                        <button type="button" id='botao_salvar{{ $dados->id }}' class="btn btn-link btn-sm btn-rounded"  onclick='salvar_registro({{ $dados->id }})' style="display: none; color:#000000">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                            </svg>
                        </button>
                        @if (auth()->check())
                                @if (auth()->user()->permissaoID == 2)

                        <button type="button" class="btn btn-link btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg>
                        </button>
                        <button class="btn btn-link btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#staticBackdropEnd">
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
                <a href="{{route('cartao')}}"> Endereço</a>
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
                                <td><button type='button' id='botao_editar{{ $cartao->id }}' class="btn btn-link btn-sm btn-rounded" onclick='editar_registroCart({{ $cartao->id }})'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button>
                                    <button type='button' id='botao_salvar{{ $cartao->id }}' class="btn btn-link btn-sm btn-rounded" onclick='salvar_registroCart({{ $cartao->id }})' style="display: none;"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                                        </svg></button>
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded" onclick="deletarCartao({{$cartao->id}})">
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center;">Endereço cadastrado</h5>
                <a href="{{route('endereco')}}"> Endereço</a>
                <div class="modal-header">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Nome</th>
                                <th>Estado</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>Rua</th>
                                <th>Numero</th>
                                <th>Complemento</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enderecos as $endereco)
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <tr>
                                <td id="valor_nomeEnd{{$endereco->id}}">{{$endereco->nome}}</td>
                                <td id="valor_Estado{{$endereco->id}}">{{$endereco->Estado}}</td>
                                <td id="valor_CEP{{$endereco->id}}">{{$endereco->CEP}}</td>
                                <td id="valor_cidade{{$endereco->id}}">{{$endereco->cidade}}</td>
                                <td id="valor_rua{{$endereco->id}}">{{$endereco->rua}}</td>
                                <td id="valor_numeroEnd{{$endereco->id}}">{{$endereco->numero}}</td>
                                <td id="valor_complemento{{$endereco->id}}">{{$endereco->complemento}}</td>
                                <td> <button type='button' id='botao_editar{{ $endereco->id }}' class="btn btn-link btn-sm btn-rounded" onclick='editar_registroEnd({{ $endereco->id }})'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></button>
                                    <button type='button' id='botao_salvar{{ $endereco->id }}' class="btn btn-link btn-sm btn-rounded" onclick='salvar_registroEnd({{ $endereco->id }})' style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                                        </svg></button>
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded" onclick="deletarEndereco({{$endereco->id}})">
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function editar_registro(id) {
        $(`#botao_salvar${id}`).show();
        $(`#botao_editar${id}`).hide();

        // var name = $(`#valor_name${id}`).html();
        // name.html(`<input type='text' id='name_text${id}' value='${name.html()}'>`);

        var name = document.getElementById("valor_name" + id);
        var email = document.getElementById("valor_email" + id);
        var telefone = document.getElementById("valor_telefone" + id);
        var dataNascimento = document.getElementById("valor_dataNascimento" + id);
        var password = document.getElementById("valor_password" + id);
        name.innerHTML = "<input type='text' id='name_text" + id + "' value='" + name.innerHTML + "'>";
        email.innerHTML = "<input type='text' id='email_text" + id + "' value='" + email.innerHTML + "'>";
        telefone.innerHTML = "<input type='text' id='name_text" + id + "' value='" + telefone.innerHTML + "'>";
        dataNascimento.innerHTML = "<input type='text' id='name_text" + id + "' value='" + dataNascimento.innerHTML + "'>";

        password.innerHTML = "<input type='text' id='password_text" + id + "' value='" + password.innerHTML + "'>";
    }

    function salvar_registro(id) {
        const name = $(`#name_text${id}`).val();
        const email = $(`#email_text${id}`).val();
        const telefone = $(`#telefone_text${id}`).val();
        const dataNascimento = $(`#dataNascimento_text${id}`).val();
        const password = $(`#password_text${id}`).val();
        const _token = $('#_token').val();
        document.getElementById("valor_name" + id).innerHTML = name;
        document.getElementById("valor_email" + id).innerHTML = email;
        document.getElementById("valor_telefone" + id).innerHTML = telefone;
        document.getElementById("valor_dataNascimento" + id).innerHTML = dataNascimento;

        document.getElementById("valor_password" + id).innerHTML = password;
        console.log(name);
        $.ajax({
            type: "put",
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
                console.log(response)
                iziToast.success({
                    title: 'Atualizado',
                    message: response.msg,
                });
            }
        });
        $(`#botao_salvar${id}`).hide();
        $(`#botao_editar${id}`).show();
    }


    const deletarCartao = (id_cartao) => {
        $.ajax({
            type: "delete",
            url: `/cartao/delete/${id_cartao}`,
            data: {
                _token: '{{ csrf_token() }}' // Certifique-se de que está definido corretamente
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
        var nome = document.getElementById("valor_nome" + id);
        var numero = document.getElementById("valor_numero" + id);
        var vencimento = document.getElementById("valor_vencimento" + id);
        var cvv = document.getElementById("valor_cvv" + id);


        nome.innerHTML = "<input type='text' id='nome_text" + id + "' value='" + nome.innerHTML + "'>";
        numero.innerHTML = "<input type='text' id='numero_text" + id + "' value='" + numero.innerHTML + "'>";
        vencimento.innerHTML = "<input type='text' id='vencimento_text" + id + "' value='" + vencimento.innerHTML +
            "'>";
        cvv.innerHTML = "<input type='text' id='cvv_text" + id + "' value='" + cvv.innerHTML + "'>";


    }

    function salvar_registroCart(id) {
        const nome = $(`#nome_text${id}`).val();
        const numero = $(`#numero_text${id}`).val();
        const vencimento = $(`#vencimento_text${id}`).val();
        const cvv = $(`#cvv_text${id}`).val();

        const _token = $('#_token').val();
        document.getElementById("valor_nome" + id).innerHTML = nome;
        document.getElementById("valor_numero" + id).innerHTML = numero;
        document.getElementById("valor_vencimento" + id).innerHTML = vencimento;
        document.getElementById("valor_cvv" + id).innerHTML = cvv;


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
                console.log(response)
                iziToast.success({
                    title: 'Atualizado',
                    message: response.message,
                });

            }
        });
        $(`#botao_salvar${id}`).hide();
        $(`#botao_editar${id}`).show();
    }

    const deletarEndereco = (id_endereco) => {
        $.ajax({
            type: "delete",
            url: `/endereco/delete/${id_endereco}`,
            data: {
                _token: '{{ csrf_token() }}' // Certifique-se de que está definido corretamente
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
        $(`#botao_salvar${id}`).show();
        $(`#botao_editar${id}`).hide();
        var nome = document.getElementById("valor_nomeEnd" + id);
        var Estado = document.getElementById("valor_Estado" + id);
        var CEP = document.getElementById("valor_CEP" + id);
        var cidade = document.getElementById("valor_cidade" + id);
        var rua = document.getElementById("valor_rua" + id);
        var numero = document.getElementById("valor_numeroEnd" + id);
        var complemento = document.getElementById("valor_complemento" + id);


        nome.innerHTML = "<input type='text' id='nomeEnd_text" + id + "' value='" + nome.innerHTML + "'>";
        Estado.innerHTML = "<input type='text' id='Estado_text" + id + "' value='" + Estado.innerHTML + "'>";
        CEP.innerHTML = "<input type='text' id='CEP_text" + id + "' value='" + CEP.innerHTML +
            "'>";
        cidade.innerHTML = "<input type='text' id='cidade_text" + id + "' value='" + cidade.innerHTML + "'>";
        rua.innerHTML = "<input type='text' id='rua_text" + id + "' value='" + rua.innerHTML + "'>";
        numero.innerHTML = "<input type='text' id='numeroEnd_text" + id + "' value='" + numero.innerHTML + "'>";
        complemento.innerHTML = "<input type='text' id='complemento_text" + id + "' value='" + complemento.innerHTML + "'>";


    }

    function salvar_registroEnd(id) {
        const nome = $(`#nome_text${id}`).val();
        const Estado = $(`#Estado_text${id}`).val();
        const CEP = $(`#CEP_text${id}`).val();
        const cidade = $(`#cidade_text${id}`).val();
        const rua = $(`#rua_text${id}`).val();
        const numero = $(`#numero_text${id}`).val();
        const complemento = $(`#complemento_text${id}`).val();


        const _token = $('#_token').val();
        document.getElementById("valor_nome" + id).innerHTML = nome;
        document.getElementById("valor_Estado" + id).innerHTML = Estado;
        document.getElementById("valor_CEP" + id).innerHTML = CEP;
        document.getElementById("valor_cidade" + id).innerHTML = cidade;
        document.getElementById("valor_rua" + id).innerHTML = rua;
        document.getElementById("valor_numero" + id).innerHTML = numero;
        document.getElementById("valor_complemento" + id).innerHTML = complemento;



        $.ajax({
            type: "put",
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
                console.log(response)
                iziToast.success({
                    title: 'Atualizado',
                    message: response.message,
                });

            }
        });
        $(`#botao_salvar${id}`).hide();
        $(`#botao_editar${id}`).show();
    }
</script>

</html>