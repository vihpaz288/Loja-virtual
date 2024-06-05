<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório geral de vendas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>

.grafico {
    width: 700px;
    margin-left: auto;
    margin-right: auto;
    /* Adicione outras propriedades CSS conforme necessário */
}
    .container {
      max-width: 800px;
      }

    .filter-section {
      margin-bottom: 20px;
    }

    .report-table {
      width: 100%;
      border-collapse: collapse;
    }

    .report-table th,
    .report-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .report-table th {
      background-color: #f2f2f2;
    }
    ul{
      float: right;
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
        background-color: #ffffff; /* Cor da animação */
        transition: all 0.3s ease;
    }

    .navbar-nav li.nav-item:hover::after {
        width: 100%;
    }
    .navbar-nav .nav-link.active::after,
    .navbar-nav .nav-link[href="{{route('relatorio.vendas')}}"]::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ffffff; /* Cor da borda branca */
        transition: none; /* Evita a animação ao selecionar */
    }
    .filter-section p {
    font-size: 18px;
    color: #333; /* ou outra cor adequada */
    text-align: center; /* centralize o texto horizontalmente */
    margin-bottom: 10px; /* adicione um espaço abaixo do texto */
}
.filter-section {
    background-color: #f9f9f9; /* ou outra cor de sua preferência */
    padding: 20px; /* ajuste conforme necessário */
    border: 1px solid #ccc; /* ou outra cor de sua preferência */
    border-radius: 5px; /* arredonde as bordas */
    margin-bottom: 20px; /* ou ajuste conforme necessário */
}


  </style>
</head>
<body>
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
                        <a class="nav-link text-white" style="border-bottom: #ddd;" href="{{route('relatorio.vendas')}}">Relatorio</a>
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

   <div class="grafico">
    <div class="filter-section">
   <p>Produtos com maior interesse dos clientes</p>
    </div> 

    <canvas id="myChart" width="400" height="400"></canvas>
    <canvas id="myChart2" width="400" height="400"></canvas>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var produtoMaisVendidoNome = "{{ $produtoMaisVendidoNome }}";
    var totalVendasProdutoMaisVendido = "{{ $totalVendasProdutoMaisVendido }}";
    var produtoMenosVendidoNome = "{{ $produtoMenosVendidoNome }}";
    var totalVendasProdutoMenosVendido = "{{ $totalVendasProdutoMenosVendido }}";
    var quantidadeTotalProdutos = "{{ $quantidadeTotalProdutos }}";

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
              'Quantidade Total',
                'Produto Mais com interesse (' + produtoMaisVendidoNome + ')',
                'Produto Menos com interesse (' + produtoMenosVendidoNome + ')',
            ],
            datasets: [{
                label: 'Dados de vendas',
                data: [quantidadeTotalProdutos, totalVendasProdutoMaisVendido, totalVendasProdutoMenosVendido],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 205, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });
</script>


</body>
</html>
