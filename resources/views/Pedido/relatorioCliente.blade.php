{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

        <table class="report-table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor produto</th>
                    <th>Valor total</th>
                    <th>Situção</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->created_at }}</td>
                        <td>celular</td>
                        <td>{{ $pedido->quantidade }}</td>
                        <td>{{ $pedido->produtos->valor }}</td>
                        <td>{{ $pedido->valor }}</td>
                        @foreach ($status as $item)
                            @if ($item->status->status == 1)
                            <td style="background-color: green; color: white;">{{$item->status->status}}</td>
                            @elseif($item->status->status == 2)
                            <td style="background-color: blue; color: white;">{{$item->status->status}}</td>
                            @else
                            <td style="background-color: black; color: white; border-radius: 100px;">{{$item->status->status}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


</script>

</html> --}}





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="styles.css"> <!-- Arquivo CSS separado -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Meus Pedidos</h1>
        </div>
        <div class="pedidos">
            {{-- <div class="pedido">
                <div class="pedido-info">
                    <div>
                        <p>Data do Pedido: 2024-05-15</p>
                        <p>Status: <span class="status status-finalizado">Pedido Finalizado</span></p>
                    </div>
                    <div class="produto-info">
                        <p>Produto: Smartphone XYZ</p>
                        <p>Quantidade: 1</p>
                        <p>Valor do Produto: R$ 999,99</p>
                        <p>Valor Total: R$ 999,99</p>
                    </div>
                </div>
            </div> --}}
            @foreach ($pedidos as $pedido)
            {{-- @dd($pedido) --}}
            <div class="pedido">
                <div class="pedido-info">
                        <div>
                            <p>Data do Pedido:{{ $pedido->created_at }}</p>
                            @foreach ($status as $item)
                                <p>Status:
                                    <span
                                        class="status
                                @if ($item->status->status == 1) status-finalizado
                                @elseif($item->status->status == 2) status-rota
                                @elseif($item->status->status == 3) status-entregue @endif">
                                        {{ $item->status->status }}
                                    </span>
                                </p>
                            @endforeach
                        </div>
                        <div class="produto-info">
                            <p>Quantidade: {{ $pedido->quantidade }}</p>
                            <p>Valor do Produto: {{ $pedido->produtos[0]->nome }}</p>
                            <p>Valor do Produto: {{ $pedido->produtos[0]->valor }}</p>
                           {{-- <p>Valor Total: {{ $pedido->valor }}</p> --}}
                        </div>
                    </div>
            </div>

                @endforeach
        </div>
    </div>
    </div>
</body>

</html>
