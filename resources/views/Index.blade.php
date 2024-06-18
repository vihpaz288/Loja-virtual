<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Loja virtual| Loja de eletronico</title>
</head>
<style>
    .btn:hover {
        background-color: #808080;
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
    .navbar-nav .nav-link[href="{{route('index')}}"]::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        transition: none;
    }

    #error-message {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #e4605e;
        color: #fff;
        padding: 10px 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    #error-message li {
        list-style: none;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 5px;
    }

    #success-message {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #65c368;
        color: #fff;
        padding: 10px 10px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    #success-message li {
        list-style: none;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 5px;
    }

    .hide {
        display: none;
    }
</style>

<body style="min-width: 372px;">
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
    <header class="container">
        <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="./img/slide01.jpg" class="d-none d-md-block w-100" alt="">
                    <img src="./img/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="./img/slide01.jpg" class="d-none d-md-block w-100" alt="">
                    <img src="./img/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="./img/slide01.jpg" class="d-none d-md-block w-100" alt="">
                    <img src="./img/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
    </header>
    <div class="container">
        <div class="row g-3 pt-4">
            @foreach ($produtos as $produto)
            <div class="col-md-4">
                <div class="card text-center bg-light">
                    <a href="#" class="position-absolute end-0 p-2 text-danger">
                        <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                    </a>
                    @if(isset($produto->image[0]))
                    <a href="">
                        <img src="{{ asset('storage/' . $produto->image[0]->image) }}" class="card-img-top" style="width: 250px; height: 340px;">
                    </a>
                    @endif
                    <div class="card-header">
                        R$ {{$produto->valor}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$produto->nome}}</h5>
                        <p class="card-text truncar-3l">
                            {{$produto->descricao}}
                        </p>
                    </div>
                    <div class="card-footer">
                        @if (auth()->check())
                        @if (auth()->user()->permissaoID == 1)
                        <form action="{{ route('produto.destroy', ['id' => $produto->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn mx-auto mt-2 d-block text-light" style="background-color: #000000; btn:hover: background-color: #808080;">
                                Deletar produto
                            </button>
                        </form>
                        @else
                        @if ($produto->quantidade >= 1)
                        <button type="button" class="btn mx-auto mt-2 d-block text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $produto->id }}" style="background-color: #000000; btn:hover: background-color: #808080;">
                            Adicionar ao Carrinho
                        </button>
                        @else
                        <button type="button" class="btn mx-auto mt-2 d-block text-light disabled" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $produto->id }}" style="background-color: #000000; btn:hover: background-color: #808080;">
                            Adicionar ao Carrinho
                        </button>
                        @endif
                        @endif
                        @endif
                        <div class="modal fade" id="staticBackdrop-{{ $produto->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Escolha a
                                            quantidade</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('carrinho.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="produtoId" value="{{ $produto->id }}">
                                            <input class="btn mt-2 d-block" type="number" id="quantity" name="quantidade" value="1" min="1" style="display: center;
                                                                                flex-direction: column;
                                                                                align-items: center;
                                                                                font-size: 18px;
                                                                                text-align: center;
                                                                                width: 90px;
                                                                                border: 1px solid #ccc;
                                                                                border-radius: 5px;
                                                                                padding: 5px; 
                                                                                background-color:while">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn" style="background-color: #000000; color:#FFFFFF;">Continuar</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small class="text-success"> {{$produto->quantidade}} Em estoque</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <footer class="border-top text-muted bg-ligth fixed-bottom" style="">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 cold-md-4 text-center text-md-left">
                        &copy; 2024 - Loja virtual
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script>
            setTimeout(function() {
                document.getElementById('error-message').classList.add('hide');
            }, 5000);
            setTimeout(function() {
                document.getElementById('success-message').classList.add('hide');
            }, 5000);
        </script>
</body>

</html>