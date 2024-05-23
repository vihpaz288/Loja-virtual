<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #04044c;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .container {
      margin: 20px auto;
      max-width: 800px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
  </style>
</head>
<body>
  <div class="header">
    <h1>Relatório De pedidos realizados</h1>
  </div>

  <div class="container">
    <div class="filter-section">
      <!-- Seção de filtro aqui, se necessário -->
    </div>

    <canvas id="myChart" width="400" height="400"></canvas>
    <canvas id="myChart2" width="400" height="400"></canvas>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Aqui você precisa passar os dados necessários para os gráficos antes de iniciar a renderização

    // Exemplo de como você pode passar os dados para o gráfico
    var produtoMaisVendidoId = "{{ $produtoIdMaisVendido }}";
    var totalVendasProdutoMaisVendido = "{{ $totalVendasProdutoMaisVendido }}";
    var produtoMenosVendidoId = "{{ $produtoIdMenosVendido }}";
    var totalVendasProdutoMenosVendido = "{{ $totalVendasProdutoMenosVendido }}";
    var quantidadeTotalProdutos = "{{ $quantidadeTotal }}";

    // Agora você pode usar essas variáveis para renderizar os gráficos usando Chart.js

    // Exemplo:
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Produto Mais Vendido', 'Produto Menos Vendido', 'Quantidade Total de Produtos'],
        datasets: [{
          label: 'Vendas',
          data: [totalVendasProdutoMaisVendido, totalVendasProdutoMenosVendido, quantidadeTotalProdutos],
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

    // Aqui você faria o mesmo para o segundo gráfico

    // Exemplo:

  </script>
</body>
</html>
