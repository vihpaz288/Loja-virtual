{{--


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
            <th>Cliente</th>

          <th>Data</th>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Valor produto</th>
          <th>Valor total</th>
          <th> Detalhes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pedidos as $pedido)


      <tr>
        <td>{{$pedido->carrinho->user->name}}</td>


        <td>{{$pedido->created_at}}</td>
        <td>{{$pedido->produtos->nome}}</td>
        <td>{{$pedido->quantidade}}</td>
        <td>{{$pedido->produtos->valor}}</td>
        <td>{{$pedido->valor}}</td>
        <td>

            <a href="{{route('relatorio.dados', $pedido->id)}}">Detalhes</a>
        </td>
      </tr>


      @endforeach


      </tbody>
    </table>
  </div>
</body>
</html>


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            background-color: #315830;
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
            background-color: #7f9e55;
            color: white;
            padding: 5px 10px;
            border-radius: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .styled-link:hover {
            background-color: #a8bc7e;
            /* Cor mais clara da mesma paleta */
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
            {{-- {{dd( $pedidos)}} --}}
            {{-- @foreach ($dadosPedido as $item) --}}
                <div class="pedido">
                    <div class="pedido-info">
                        <div>
                            <p>Data do Pedido:{{ $pedido->created_at }}</p>
                            {{-- @foreach ($status as $item) --}}
                            <p>Status: <span
                                    class="status">{{ $pedido->status->status }}</span>
                                </p>
                            {{-- @endforeach --}}

                            <button type="button"
                                    class="styled-link" onclick="openModal()">Detalhes do pedido</button>


                        </div>
                        <div class="produto-info">
                            <p>Produto:{{ $item->produtos->nome }}</p>
                            <p>Quantidade: {{ $item->quantidade }}</p>
                            <p>Valor do Produto: {{ $item->produtos->valor }}</p>
                            <p>Valor Total: {{ $item->valor }}</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="pedido">
                <div class="pedido-info">
                    <div>
                        <p>Data do Pedido: 2024-05-13</p>
                        <p>Status: <span class="status status-entregue">Pedido Entregue</span></p>
                    </div>
                    <div class="produto-info">
                        <p>Produto: Livro "Nome do Livro"</p>
                        <p>Quantidade: 3</p>
                        <p>Valor do Produto: R$ 29,99</p>
                        <p>Valor Total: R$ 89,97</p>
                    </div>
                </div> --}}
                        {{-- @endforeach --}}
            @endforeach
        </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Dados da entrega</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> --}}
                </div>
                <div class="modal-body">
                    {{-- <div class="header">
                    <h1>Relatório de Pedidos Realizados</h1>
                </div> --}}

                    <div class="pedido">
                        @foreach ($pedidos as $item)
                        <div class="pedido-info">
                            <div>
                                    <input type="hidden" id="_token" value="{{ csrf_token() }}">

                                    <p>Status:
                                        <span class="status" id='valor_status{{ $item->id }}'>
                                            {{ $item->status->status }}
                                        </span>
                                    </p>

                                {{-- <button type="button" class="styled-link" >Atualizar</button> --}}
                                <button type='button' id='botao_editar{{ $item->id }}' class="styled-link"
                                    onclick='editar_registro({{ $item->id }})'>Atualizar</button>
                                <button type='button' id='botao_salvar{{ $item->id }}' class="styled-link"
                                    style="display: none;"
                                    onclick='salvar_registro({{ $item->id }})'>Salvar</button>
                            </div>
                            <div class="produto-info">


                                    <p>Estado: {{ $item->endereco->Estado }} </p>
                                    <p>CEP: {{ $item->endereco->CEP }} </p>
                                    <p>Cidade: {{ $item->endereco->cidade }} </p>
                                    <p>Rua: {{ $item->endereco->rua }}</p>
                                    <p>Complemento: {{ $item->endereco->complemento }}</p>
                                    <p>Numero: {{ $item->endereco->numero }}</p>

                                </div>
                            </div>
                            @endforeach
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    function openModal() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
        myModal.show();
    }
</script>
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
        $(`#botao_salvar${id}`).show('hide');
        $(`#botao_editar${id}`).hide();

        var status = document.getElementById("valor_status" + id);
        var statusAtual = status.dataset.statusId; // Obtém o ID do status atual

        var options = [{
                id: 1,
                name: "Realizado"
            },
            {
                id: 2,
                name: "Em rota"
            },
            {
                id: 3,
                name: "Entregue"
            }
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
