 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
    integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #04044c;
            ;
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
        <h1>Relatório de pedidos realizados</h1>
    </div>

    <div class="container">
        <div class="filter-section">
            <!-- Seção de filtro aqui, se necessário -->
        </div>

        <table class="report-table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Rua</th>
                    <th>Estado</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Numero</th>

                  <th>Situação</th>
                    <th>Atualizar</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  <td>{{$dados->carrinho->user->name }}</td>
                  <td>{{$dados->endereco->rua}}</td>
                  <td>{{$dados->endereco->Estado}}</td>
                  <td>{{$dados->endereco->CEP}}</td>
                  <td>{{$dados->endereco->cidade}}</td>
                  <td>{{$dados->endereco->numero}}</td>
                  <td id='valor_status{{ $dados->id }}'>{{$dados->status->status}}</td>
                  <td>

                <button type='button' id='botao_editar{{ $dados->id }}' class="btn btn-primary"
                    onclick='editar_registro({{ $dados->id }})'>EDITAR</button>
                <button type='button' id='botao_salvar{{ $dados->id }}' class="btn btn-primary"
                    onclick='salvar_registro({{ $dados->id }})'
                    style="display: none;">SALVAR</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function editar_registro(id) {
    $(`#botao_salvar${id}`).show();
    $(`#botao_editar${id}`).hide();

    var status = document.getElementById("valor_status" + id);
    var statusAtual = status.dataset.statusId; // Obtém o ID do status atual

    var options = [
        { id: 1, name: "Realizado" },
        { id: 2, name: "Em rota" },
        { id: 3, name: "Entregue" }
    ];

    var select = document.createElement("select");
    select.setAttribute("id", "status_select" + id);

    options.forEach(function(option) {
        var optionElement = document.createElement("option");
        optionElement.setAttribute("value", option.id);
        optionElement.textContent = option.name;

        if (option.id == statusAtual) {
            optionElement.setAttribute("selected", "selected");
        }

        select.appendChild(optionElement);
    });

    status.innerHTML = "";
    status.appendChild(select);
}

function salvar_registro(id) {
    const statusId = $(`#status_select${id}`).val(); // Obtém o ID do status selecionado do select
    const _token = $('#_token').val(); // Obtém o valor do token CSRF

    $.ajax({
        type: "put",
        url: `/pedido/status/${id}`,
        data: {
            statusId: statusId, // Passa o ID do status selecionado
            _token: _token,
        },
        success: function(response) {
            // Esconde o botão de salvar e mostra o botão de editar
            $(`#botao_salvar${id}`).hide();
            $(`#botao_editar${id}`).show();

            // Exemplo de mensagem de sucesso usando iziToast
            iziToast.success({
                title: 'Atualizado',
                message: response.msg,
            });

            // Recarrega a página após 1 segundo (1000 milissegundos)
            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    });
}


</script>
</html>



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
    integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #315830;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-family: 'Pacifico', cursive;
            margin-bottom: 20px;
        }

        .container {
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
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
            padding: 10px;
            text-align: left;
        }

        .report-table th {
            background-color: #315830;
            color: #fff;
            font-weight: bold;
        }

        .report-table td {
            font-size: 14px;
        }

        .status-select {
            background-color: #315830;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .status-select:hover {
            background-color: #214f28;
        }

        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            background-color: #315830;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #214f28;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Relatório de Pedidos Realizados</h1>
    </div>

    <div class="container">
        <table class="report-table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Rua</th>
                    <th>Estado</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Numero</th>
                    <th>Situação</th>
                    <th>Atualizar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$dados->carrinho->user->name }}</td>
                    <td>{{$dados->endereco->rua}}</td>
                    <td>{{$dados->endereco->Estado}}</td>
                    <td>{{$dados->endereco->CEP}}</td>
                    <td>{{$dados->endereco->cidade}}</td>
                    <td>{{$dados->endereco->numero}}</td>
                    <td id='valor_status{{ $dados->id }}'>{{$dados->status->status}}</td>
                    <td>
                        <button class="status-select" onclick="editar_registro({{ $dados->id }})">Atualizar</button>
                        <button class="status-select" id='botao_salvar{{ $dados->id }}'
                            onclick='salvar_registro({{ $dados->id }})'
>SALVAR</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function editar_registro(id) {
    $(`#botao_salvar${id}`).show();
    $(`#botao_editar${id}`).hide();

    var status = document.getElementById("valor_status" + id);
    var statusAtual = status.dataset.statusId; // Obtém o ID do status atual

    var options = [
        { id: 1, name: "Realizado" },
        { id: 2, name: "Em rota" },
        { id: 3, name: "Entregue" }
    ];

    var select = document.createElement("select");
    select.setAttribute("id", "status_select" + id);

    options.forEach(function(option) {
        var optionElement = document.createElement("option");
        optionElement.setAttribute("value", option.id);
        optionElement.textContent = option.name;

        if (option.id == statusAtual) {
            optionElement.setAttribute("selected", "selected");
        }

        select.appendChild(optionElement);
    });

    status.innerHTML = "";
    status.appendChild(select);
}

function salvar_registro(id) {
    const statusId = $(`#status_select${id}`).val(); // Obtém o ID do status selecionado do select
    const _token = $('#_token').val(); // Obtém o valor do token CSRF

    $.ajax({
        type: "put",
        url: `/pedido/status/${id}`,
        data: {
            statusId: statusId, // Passa o ID do status selecionado
            _token: _token,
        },
        success: function(response) {
            // Esconde o botão de salvar e mostra o botão de editar
            $(`#botao_salvar${id}`).hide();
            $(`#botao_editar${id}`).show();

            // Exemplo de mensagem de sucesso usando iziToast
            iziToast.success({
                title: 'Atualizado',
                message: response.msg,
            });

            // Recarrega a página após 1 segundo (1000 milissegundos)
            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    });
}


</script>
</html> --}}
