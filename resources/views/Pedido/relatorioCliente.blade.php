<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .container {
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .nav {
            width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .header {
            background-color: black;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .pedido {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .pedido-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .produto-info {
            flex-grow: 1;
            margin-left: 20px;
        }

        .status {
            font-weight: bold;
        }

        .status-finalizado {
            color: green;
        }

        .status-rota {
            color: orange;
        }

        .status-entregue {
            color: blue;
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
        .navbar-nav .nav-link[href="{{route('relatorio.cliente')}}"]::after {
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
        <div class="nav">
            <a class="navbar-brand" href=""><strong>Loja virtual</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-collapse">
                <span class="navbar-toggle-icon"></span>
            </button>
            <div class="align-self-end">
                <ul class="navbar-nav">
                    @if (auth()->check())
                    @if (auth()->user()->permissaoID == 1)
                    <li class="navbar-brand">
                        <a class="nav-link text-white" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="navbar-brand">
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

    <div class="container">
        <div class="header">
            <h1>Meus Pedidos</h1>
        </div>
        <div class="pedidos">
            @foreach ($pedidos as $pedido)

            <div class="pedido">
                <div class="pedido-info">
                    <div>
                        <p>Data do Pedido:{{ $pedido->created_at }}</p>
                        <p>Status:
                            <span class="status">
                               {{$pedido->status->status}}
                            </span>
                        </p>
                    </div>
                    <div class="produto-info">
                        <p>Quantidade: {{ $pedido->produtoCarrinho->quantidade }}</p>
                        @foreach($pedido->produtoCarrinho->produtos as $produto)
                        <p>Produto: {{ $produto->nome }}</p>
                        <p>Valor produto: {{$produto->valor}} </p>
                        @endforeach
                        <p>Valor total: {{$pedido->produtoCarrinho->valor}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>
</body>

</html> -->


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos realizados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .header {
            background-color: #000000;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .pedido {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .pedido-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .produto-info {
            flex-grow: 1;
            margin-left: 20px;
        }

        .status {
            font-weight: bold;
        }

        .status-finalizado {
            color: green;
        }

        .status-rota {
            color: orange;
        }

        .status-entregue {
            color: blue;
        }

        .styled-link {
            background-color: #000000;
            color: white;
            padding: 5px 10px;
            border-radius: 10px;
            text-decoration: none;
            border: #000000;
            transition: background-color 0.3s ease;
        }

        .styled-link:hover {
            background-color: #808080;
        }

        select#status_select {
            color: black;
            border-radius: 10px;
            border: 1px solid #808080;
            padding: 5px;
        }

        select#status_select option {
            border-radius: 10px;
            color: black;
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
        .navbar-nav .nav-link[href="{{route('relatorio.vendedor')}}"]::after {
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
    <div class="container">
        <div class="header">
            <h1>Meus Pedidos</h1>
        </div>
        <form id="filterForm" method="GET" action="{{ route('relatorio.cliente') }}">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Ordenar por:</label>
                <select class="form-select" id="select2" name="search">
                    <option disabled selected>Filtrar</option>
                    <option value="0">Todos</option>
                    <option value="1">Realizados</option>
                    <option value="2">Em rota</option>
                    <option value="3">Finalizados</option>
                </select>
            </div>
        </form>
        <div class="pedidos" id="statusTable">
           
            @foreach ($pedidos as $pedido)

<div class="pedido">
    <div class="pedido-info">
        <div>
            <p>Data do Pedido:{{ $pedido->created_at }}</p>
            <p>Status:
                <span class="status">
                   {{$pedido->status->status}}
                </span>
                <p>Valor total: {{$pedido->produtoCarrinho->valor}}</p>
                <button type="button" class="styled-link" onclick="abrirModalCreate('{{ $pedido->id }}')">Detalhes do pedido</button>
            </p>
        </div>
        <div class="produto-info">
            <p>Quantidade: {{ $pedido->produtoCarrinho->quantidade }}</p>
            @foreach($pedido->produtoCarrinho->produtos as $produto)
            <p>Produto: {{ $produto->nome }}</p>
            <p>Valor produto: {{$produto->valor}} </p>
            @endforeach
        </div>
    </div>
</div>
@endforeach
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Dados da entrega</h5>
                </div>
                <div class="pedido">
                    <div class="pedido-info">
                      
                        <div class="produto-info">
                            <input type="hidden" id="id_pedido">
                            <p>Estado: <span id="valor_Estado"></span></p>
                            <p>CEP: <span id="valor_CEP"></span></p>
                            <p>Cidade: <span id="valor_cidade"></span></p>
                            <p>Rua: <span id="valor_rua"></span></p>
                            <p>Numero: <span id="valor_numero"></span></p>
                            <p>Complemento: <span id="valor_complemento"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.getElementById('select2').addEventListener('change', function() {
        document.getElementById('filterForm').submit();
    });
</script>
<script>
    const abrirModalCreate = (id_pedido) => {
        $('#exampleModalCenter').modal('show');
        $.ajax({
            url: `/relatorio/dados/${id_pedido}`, // Ajustado para id_pedido
            type: 'GET',
            success: function(response) {
                // console.log(response);
                $('#id_pedido').val(response.pedido.id);
                $('#valor_Estado').html(response.Estado.Estado);
                $('#valor_status').html(response.status.status);
                $('#valor_CEP').html(response.endereco.CEP);
                $('#valor_cidade').html(response.endereco.cidade);
                $('#valor_rua').html(response.endereco.rua); // Ajustado para response.endereco.estado
                $('#valor_numero').html(response.endereco.numero);
                $('#valor_complemento').html(response.endereco.complemento);
            }
        });
    }

    

   

</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</html>