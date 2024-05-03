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
      background-color: #04044c;;
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

    <table class="report-table">
      <thead>
        <tr>
          <th>Data</th>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Valor produto</th>
          <th>Valor total</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($pedidos as $pedido)
      <tr>
        <td>{{$pedido->created_at}}</td>
        <td>celular</td>
        <td>{{$pedido->quantidade}}</td>
        <td>{{$pedido->valor}}</td>
        <td>{{$pedido->valor}}</td>
      </tr>

      @endforeach

      </tbody>
    </table>
  </div>
</body>
</html>
