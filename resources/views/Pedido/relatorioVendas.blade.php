<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório geral de vendas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>

.nav{

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
  </style>
</head>
<body style="min-width: 372px;">
    <nav style="background-color: #000000;" class="navbar navbar-expand-lg navbar-dark border-bottom shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href=""><strong>Loja virtual</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-collapse">
                <span class="navbar-toggle-icon"></span>
            </button>
            <div class="">
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

   <div class="grafico">
    <div class="filter-section">
      <!-- Seção de filtro aqui, se necessário -->
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
              'Quantidade Total de vendas',
                'Produto Mais Vendido (' + produtoMaisVendidoNome + ')',
                'Produto Menos Vendido (' + produtoMenosVendidoNome + ')',
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
