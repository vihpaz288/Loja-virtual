    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Index</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <style>
        .wrapper {
            min-height: 100vh;
        }

        a.houver {
            cursor: pointer;
            background: red;
        }
    </style>

    <body>
        <div class="d-flex flex-column wrapper">

            <nav class="navbar navbar-expand-lg navbar-dark  border-bottom shadow-sm mb-3"
                style="background-color: #04044c;">
                <div class="container">
                    <a class="navbar-brand" href="#"><b>Loja Virtual</b></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            {{-- <li class="nav-item">
                                <span class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>
                                <a href="" class="nav-link text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                    </svg>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <span class="badge rounded-pill bg-light text-danger position-absolute"><small
                                        style="color: #04044c;">{{ count($itens) }}</small></span>
                                <a href="{{ route('index.carrinho') }}" class="nav-link text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#sidebar">
                            Menu
                        </button>
                    </div>
                </div>
            </nav>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Bem vindo {{ Auth::user()->name }}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- Conteúdo do menu lateral -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('dados', Auth::user()->id) }}">Dados do usuario</a>
                        </li>
                        @if (auth()->check())
                            @if (auth()->user()->permissaoID == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('create.produto') }}">Novo produto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('relatorio.cliente')}}">Pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cartoes') }}">Relatorios</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('relatorio.cliente')}}">Pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('enderecos') }}">Endereço</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cartoes') }}">Cartão</a>
                                </li>
                            @endif
                        @endif

                        <!-- Adicione mais links conforme necessário -->
                    </ul>
                    <ul class="nav flex-column"> <!-- Adicione a classe "mt-auto" para mover para a parte inferior -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sair') }}">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="flex-fill">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <form action="{{ route('buscar') }}" method="GET" role="search"
                                class="justify-content-center justify-content-md-start mb-3 mb-md" action="">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Digite aqui o que procura">
                                    <button class="btn"
                                        style="background-color: #04044c; color:white;">Buscar</button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="search-box">
                            <form action="" method="get" role="search">
                                <div class="search-container">
                                    <input type="text" id="searchInput" name="search" placeholder="Buscar produtos">
                                    <button id="searchButton" aria-label="Pesquisar">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </button>
                                </div>
                        </div> --}}
                        {{-- <div class="col-12 col-md-7">
                            <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                                <form action="{caminho/do/seu/formulario}" class="d-inline-block">
                                    <select name="ordenar" id="ordenar" class="form-select form-select-sm">
                                        <option value="nome">Ordenar pelo nome</option>
                                        <option value="menor-preco">Ordenar pelo menor preço</option>
                                        <option value="maior-preco">Ordenar pelo maior preço</option>
                                    </select>
                                </form>
                            </div>
                        </div> --}}
                        <hr class="mt-3">
                        <div class="row g-3">
                            @foreach ($produtos as $produto)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                    <div class="card text-center bg-light">
                                        @if (auth()->check())
                                            @if (auth()->user()->permissaoID == 1)
                                                <a href="{{ route('edit.produto', $produto->id) }}"
                                                    class="position-absolute end-0 p-2 text-danger"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg></a>
                                            @else
                                                <a href="" class="position-absolute end-0 p-2 text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                                    </svg>
                                                </a>
                                            @endif
                                        @endif
                                        <a href="{{ route('detalhes.produto', $produto->id) }}">
                                            <img src="{{ asset('storage/' . $produto->image[0]->image) }}"
                                                class="card-img-top" alt="..."
                                                style="width: 100%; height: 150px;">
                                        </a>
                                        <div class="card-header">
                                            R$: {{ $produto->valor }}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $produto->nome }}</h5>
                                            <p class="card-text"
                                                style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 1;
                                            -webkit-box-orient: vertical; ">
                                                {{ $produto->descrição }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <!-- Button trigger modal -->
                                            @if (auth()->check())
                                                @if (auth()->user()->permissaoID == 1)
                                                    <form
                                                        action="{{ route('produto.destroy', ['id' => $produto->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn mt-2"
                                                            style="background-color: #04044c; color:white;">Deletar
                                                            Produto</button>
                                                    </form>
                                                @else
                                                @if ($produto->quantidade >= 1)

                                                <button type="button" class="btn mt-2 d-block"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop-{{ $produto->id }}"
                                                    style="background-color: #04044c; color:white;">
                                                    Adicionar ao carrinho
                                                </button>
                                                </form>
                                                @else
                                                <button type="button" class="btn mt-2 d-block disabled"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop-{{ $produto->id }}"
                                                    style="background-color: #04044c; color:white;">
                                                    Adicionar ao carrinho
                                                </button>
                                                @endif

                                                @endif
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop-{{ $produto->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Escolha a
                                                                quantidade</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('carrinho.store') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="produtoId"
                                                                    value="{{ $produto->id }}">
                                                                <input class="class="btn btn-danger mt-2 d-block""
                                                                    type="number" id="quantity" name="quantidade"
                                                                    value="1" min="1"
                                                                                style="display: center;
                                                                                flex-direction: column;
                                                                                align-items: center;
                                                                                font-size: 18px;
                                                                                text-align: center;
                                                                                width: 90px;
                                                                                border: 1px solid #ccc;
                                                                                border-radius: 5px;
                                                                                padding: 5px; ">
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-danger ">Continuar</button>
                                                        </form>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-success">{{ $produto->quantidade }} em estoque</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
        <hr class="mt-3">
        </main>
        <div class="row pb-3">
            <div class="col-12 ">
                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                    <nav class="d-inline-block me-3">
                        <ul class="pagination pagination-sm my-0">
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <footer class="border-top text-muted bg-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center">
                        © 2024 Loja - Todos os direitos reservados.
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="{{ route('politica') }}" class="text-decoration-none text-dark">Politica de
                            privacidade</a><br>
                        <a href="{{ route('termo') }}" class="text-decoration-none text-dark">Termo de Uso</a>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="" class="text-decoration-none text-dark">Contato</a><br>
                        E-mail: <a href="" class="text-decoration-none text-dark">email@email.com</a><br>
                        Telefone: <a href="" class="text-decoration-none text-dark">(87) 222222</a><br>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </body>
    <!-- Scripts do Bootstrap (se não estiverem incluídos ainda) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    </html>
