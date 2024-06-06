<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
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
    .navbar-nav .nav-link[href="{{route('index.carrinho')}}"]::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        transition: none;
    }

    .finalizar {
        background-color: #000000;
        border: none;
        color: white;
        padding: 10px 50px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        font-size: 15px;
        -webkit-box-shadow: 0 10px 30px 0 rgba(128, 128, 128);
        box-shadow: 0 10px 30px 0 rgba(128, 128, 128);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
        margin: 5px 20px 40px 20px;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .finalizar:after {
        display: block;
        left: 0;
        bottom: -10px;
        width: 0;
        height: 2px;
        background-color: #808080;
        content: "";
        color: white;
        transition: width 0.2s;
    }

    .finalizar {
        -moz-transform: scale(0.95);
        -webkit-transform: scale(0.95);
        -o-transform: scale(0.95);
        -ms-transform: scale(0.95);
        transform: scale(0.95);
    }

    .finalizar:hover {
        background-color: #808080;
        color: white;

    }
</style>

<body style="background-color: #eee;">

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
                            <a class="nav-link text-white" href="">Dados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="">Pedidos</a>
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
        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Seu carrinho</h3>
                        </div>
                        @if (isset($carrinho))
                        <?php $total = 0 ?>
                        @foreach ($carrinho as $item1)

                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        @foreach ($item1->produtos as $produto)
                                        <img src="{{ asset('storage/' . $produto->image[0]->image) }}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $produto->nome }}</p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                      
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" style="color: #000000;" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
                                                </svg>
                                            </button>
                                            <input id="form1" min="0" name="quantidade" value="{{ $item1->quantidade }}" type="number" class="form-control form-control-sm" />
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" style="color: #000000;" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                                </svg>
                                            </button>
                                      
                                    </div>
                                   
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">${{ $item1->valor}}</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">

                                        <form action="{{ route('carrinho.destroy', $item1->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" style="color: #000000; " viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <?php $total += $item1->valor ?>
                        @endforeach
                        <div class="card mb-4">
                            <div class="card-body p-4 d-flex flex-row">
                                <div data-mdb-input-init class="form-outline flex-fill">
                                    <p id="form1" class="form-control form-control-lg"> Valor total: {{ $total }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('finalizar') }}" data-mdb-button-init data-mdb-ripple-init class="finalizar">Finalizar compra</a>
                            </div>
                        </div>
                        @else
                        <p>Você não possui itens no carrinho</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </body>

</html>