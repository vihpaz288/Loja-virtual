<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form-upload {
            background: #333;
            display: block;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            width: 350px;
        }

        .input-personalizado {
            cursor: pointer;
        }

        .input-file {
            display: none;
        }

        .btn {
            background-color: #000000;
            border: none;
            color: white;
            padding: 15px 80px;
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

        .btn:after {
            display: block;
            left: 0;
            bottom: -10px;
            width: 0;
            height: 2px;
            background-color: #808080;
            content: "";
            transition: width 0.2s;
        }

        .btn {
            -moz-transform: scale(0.95);
            -webkit-transform: scale(0.95);
            -o-transform: scale(0.95);
            -ms-transform: scale(0.95);
            transform: scale(0.95);
        }

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
            /* Cor da animação */
            transition: all 0.3s ease;
        }

        .navbar-nav li.nav-item:hover::after {
            width: 100%;
        }

        .navbar-nav .nav-link.active::after,
        .navbar-nav .nav-link[href="{{route('create.produto')}}"]::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #ffffff;
            /* Cor da borda branca */
            transition: none;
            /* Evita a animação ao selecionar */
        }
    </style>
</head>

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
                        <a class="nav-link text-white" href="">Home</a>
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
    <main class="flex-fill border border-top-0 p-5">
        <div class="container">
            {{-- <hr class="mt-3"> --}}

            <div class="row mt-5">

                <div class="col">
                    <form action="{{ route('store.produto') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="inputAddress" placeholder="Digite aqui o nome do produto">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Valor</label>
                            <input type="input" name="valor" id="valor" class="form-control input-valor" placeholder="Valor produto R$:" onkeyup="formatarMoeda(this)">
                        </div>

                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Quantidade</label>
                            <input type="number" name="quantidade" class="form-control" id="inputZip" placeholder="Quantidade de produto em estoque">
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label2">Foto 1
                                    <div class="input-group">
                                        <input class="input-group-text form-control" name="file1[]" type="file" accept="image/*" id="formFile1" multiple>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                            <textarea class="form-control" name="descrição" id="exampleFormControlTextarea1" rows="3" placeholder="Digite aqui detalhes do produto"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn mt-3 d-block">Cadastrar</button>
                        </div>
                    </form>

                    <script>
                        function formatarMoeda(input) {
                            // Remove todos os caracteres não numéricos
                            var valorNumerico = input.value.replace(/\D/g, "");

                            // Transforma em número com duas casas decimais
                            var valorFloat = parseFloat(valorNumerico / 100).toFixed(2);

                            // Atualiza o valor do campo com o formato correto
                            input.value = valorFloat;
                        }
                    </script>

                </div>
    </main>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</script>

</html>