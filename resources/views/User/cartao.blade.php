<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://izitoast.marcelodolza.com/css/iziToast.min.css?v=140a">
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="#"><b>Loja</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target=".nvbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Dados usuario</a>
                        </li>

                    </ul>
                    <div class="align-self-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <span
                                    class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>
                                <a href="" class="nav-link text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span
                                    class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>
                                <a href="{{ route('index.carrinho') }}" class="nav-link text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link text-white">Sair</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main class="flex-fill">
            <div class="container">
                <table class="table">


                    <thead>
                        <a href="{{ route('cartao') }}" class="text-danger" style="text-decoration-line: none;">Novo
                            cartão</a>
                        <th class="text-danger" scope="col"></th>
                        <tr>
                            <th class="text-danger" scope="col">Nome</th>
                            <th class="text-danger" scope="col">Numero</th>
                            <th class="text-danger" scope="col">Vencimento</th>
                            <th class="text-danger" scope="col">Cvv</th>
                            <th class="text-danger" scope="col">Editar</th>
                            <th class="text-danger" scope="col">Deletar</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartoes as $cartao)
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <tr>
                                <td id="valor_nome{{$cartao->id}}">{{ $cartao->nome }}</td>
                                <td id="valor_numero{{$cartao->id}}">{{ $cartao->numero }}</td>
                                <td id="valor_vencimento{{$cartao->id}}">{{ $cartao->vencimento }}</td>
                                <td id="valor_cvv{{$cartao->id}}">{{$cartao->cvv}}</td>
                                <td><button type='button' id='botao_editar{{ $cartao->id }}' class="btn btn-danger btn-block mb-4"
                                    onclick='editar_registro({{ $cartao->id }})'>EDITAR</button>
                                <button type='button' id='botao_salvar{{ $cartao->id }}'class="btn btn-danger btn-block mb-4"
                                    onclick='salvar_registro({{ $cartao->id }})'
                                    style="display: none;">SALVAR</button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger btn-block mb-4" onclick="deletarCartao({{$cartao->id}})">
                                        Deletar
                                    </button>
                                </td>
            </div>
            </tr>
            @endforeach
            </tbody>

            </table>
    </div>
    </main>
    <footer class="border-top text-muted bg-light">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-4 text-center">
                    © 2024 Loja - Todos os direitos reservados.
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a href="{{ route('politica') }}" class="text-decoration-none text-dark">Politica de
                        privacidade</a><br>
                    <a href="{{ route('termo') }}" class="text-decoration-none text-dark">Termo de Uso</a>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a href="" class="text-decoration-none text-dark">Contato</a><br>
                    E-mail: <a href="" class="text-decoration-none text-dark">email@email.com</a><br>
                    Telefone: <a href="" class="text-decoration-none text-dark">(87) 222222</a><br>
                </div>
            </div>
        </div>
    </footer>
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
   const deletarCartao = (id_cartao) => {
    $.ajax({
        type: "delete",
        url: `/cartao/delete/${id_cartao}`,
        data: {
            _token: '{{ csrf_token() }}' // Certifique-se de que está definido corretamente
        },
        success: function(response) {
            $(`.tr-cartao-${id_cartao}`).remove();

            iziToast.success({
                title: 'Sucesso!',
                message: response.msg
            });

            setTimeout(() => {
                location.reload();
            }, "1000");
        },
        error: function(response) {
            console.log(response);
            iziToast.warning({
                title: 'Ops!',
                message: response.responseJSON.message,
            });
        }
    });
}


    function editar_registro(id) {
        $(`#botao_salvar${id}`).show();
        $(`#botao_editar${id}`).hide();
        var nome = document.getElementById("valor_nome" + id);
        var numero = document.getElementById("valor_numero" + id);
        var vencimento = document.getElementById("valor_vencimento" + id);
        var cvv = document.getElementById("valor_cvv" + id);


        nome.innerHTML = "<input type='text' id='nome_text" + id + "' value='" + nome.innerHTML + "'>";
        numero.innerHTML = "<input type='text' id='numero_text" + id + "' value='" + numero.innerHTML + "'>";
        vencimento.innerHTML = "<input type='text' id='vencimento_text" + id + "' value='" + vencimento.innerHTML +
        "'>";
        cvv.innerHTML = "<input type='text' id='cvv_text" + id + "' value='" + cvv.innerHTML + "'>";


    }

    function salvar_registro(id) {
        const nome = $(`#nome_text${id}`).val();
        const numero = $(`#numero_text${id}`).val();
        const vencimento = $(`#vencimento_text${id}`).val();
        const cvv = $(`#cvv_text${id}`).val();

        const _token = $('#_token').val();
        document.getElementById("valor_nome" + id).innerHTML = nome;
        document.getElementById("valor_numero" + id).innerHTML = numero;
        document.getElementById("valor_vencimento" + id).innerHTML = vencimento;
        document.getElementById("valor_cvv" + id).innerHTML = cvv;


        $.ajax({
            type: "put",
            url: `/cartao/update/${id}`,
            data: {
                nome,
                numero,
                vencimento,
                cvv,
                _token,
            },
            success: function(response) {
                console.log(response)
                iziToast.success({
                    title: 'Atualizado',
                    message: response.message,
                });

            }
        });
        $(`#botao_salvar${id}`).hide();
        $(`#botao_editar${id}`).show();
    }
</script>

</html>
