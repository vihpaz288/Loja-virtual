<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
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
        transition: all 0.3s ease;
    }

    .navbar-nav li.nav-item:hover::after {
        width: 100%;
    }

    .navbar-nav .nav-link.active::after,
    .navbar-nav .nav-link[href="{{route('index.carrinho')}}"]::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        transition: none;
    }

    .finalizar {
        background-color: #000000;
        border: none;
        color: white;
        padding: 10px 50px;
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

    .finalizar:after {
        display: block;
        left: 0;
        bottom: -10px;
        width: 0;
        height: 2px;
        background-color: #808080;
        content: "";
        color: white;
        transition: width 0.2s;
    }

    .finalizar {
        -moz-transform: scale(0.95);
        -webkit-transform: scale(0.95);
        -o-transform: scale(0.95);
        -ms-transform: scale(0.95);
        transform: scale(0.95);
    }

    .finalizar:hover {
        background-color: #808080;
        color: white;

    }
</style>

<body style="background-color: #eee;">

    <body style="min-width: 372px;">
        <nav style="background-color: #000000;" class="navbar navbar-expand-lg navbar-dark border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href=""><strong>Loja virtual</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-collapse">
                    <span class="navbar-toggle-icon"></span>
                </button>
                <div class="align-self-end">
                    <ul class="navbar-nav">
                        @if (auth()->check() && auth()->user()->permissaoID == 1)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="">Dados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="">Pedidos</a>
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
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('sair') }}">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                        @if ($carrinho && count($carrinho) > 0)
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Seu carrinho</h3>
                        </div>
                        <?php $total = 0 ?>
                        @foreach ($carrinho as $item1)
                        @foreach ($item1->produtos as $produto)

                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('storage/' . $produto->image[0]->image) }}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $produto->nome }}</p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <!-- Botões de alterar quantidade -->
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 btn-aumentar-diminuir" style="color: #000000;" 
                                        data-precoproduto="{{ $produto->valor }}" 
                                        data-itemid="{{ $item1->id }}" 
                                        data-acao="aumentar" 
                                        data-quantidadeautal="{{ $produto->quantidade }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
                                            </svg>
                                        </button>
                                        
                                        <input id="quantidade{{ $item1->id }}" min="1" name="quantidade" value="{{ $item1->quantidade }}" data-precoproduto="{{ $produto->valor }}" type="text" class="form-control form-control-sm" oninput="validarQuantidade({{ $item1->id }}, this.value, {{ $produto->quantidade }})">
                                        
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 btn-aumentar-diminuir" style="color: #000000;" 
                                        data-precoproduto="{{ $produto->valor }}" 
                                        data-itemid="{{ $item1->id }}" 
                                        data-acao="diminuir" 
                                        data-quantidadeautal="{{ $produto->quantidade }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0 valores-dos-itens" id="valorItem{{ $item1->id }}">$<span>{{ $item1->valor }}</span> </h5>
                                    </div>

                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <form action="{{ route('carrinho.destroy', $item1->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" style="color: #000000; " viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $total += $item1->valor; ?> <!-- Acumular o valor de cada item -->
                        @endforeach
                        @endforeach
                        <div class="card mb-4">
                            <div class="card-body p-4 d-flex flex-row">
                                <div data-mdb-input-init class="form-outline flex-fill">
                                    <p id="valorTotal" class="form-control form-control-lg" >Valor total: ${{ $total }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('finalizar') }}" data-mdb-button-init data-mdb-ripple-init class="finalizar">Finalizar compra</a>
                            </div>
                        </div>
                        @else
                        <div style="background-color: #f2f2f2; border: 1px solid #ccc; border-radius: 5px; padding: 20px; text-align: center; font-family: Arial, sans-serif; color: #333;">
                            <p style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Seu carrinho está vazio</p>
                            <p style="font-size: 16px; margin-top: 0;">Continue navegando em nossa loja para descobrir produtos incríveis!</p>
                        </div>
                        @endif



                    </div>
                </div>
            </div>
        </section>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        const alterarQuantidade = (btn) => {

            let itemId = btn.data('itemid');
            let acao = btn.data('acao');
            let valorAtual = btn.data('quantidadeautal');
            let precoproduto = btn.data('precoproduto');

            let quantidadeAtual = parseInt($('#quantidade' + itemId).val());
            let novaQuantidade = acao === 'aumentar' ? quantidadeAtual + 1 : quantidadeAtual - 1;

            if (novaQuantidade < 1 || novaQuantidade > valorAtual) {
                return;
            }

            $.ajax({
                type: 'PUT',
                url: '/carrinho/atualizar/' + itemId, 
                data: {
                    '_token': '{{ csrf_token() }}',
                    'quantidade': novaQuantidade,
                    'itemValor': precoproduto,
                    'acao' : acao
                },
                success: function(response) {
                    $('#quantidade' + itemId).val(novaQuantidade);

                    $('#valorItem' + itemId).html(`$<span>${response.valor.toFixed(2)}</span>`);

                    atualizaValorTotalDosItens();
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('Erro na requisição AJAX:', textStatus);
                    console.error('Detalhes do erro:', xhr.responseText);
                    alert('Ocorreu um erro ao atualizar a quantidade do item. Por favor, tente novamente.');
                }
            });
        }

        const atualizaValorTotalDosItens = () => {
            let somaDosValoresTotaisDosProdutosCadastrados = 0;
            $.each($(".valores-dos-itens span"), function(index, value){
                somaDosValoresTotaisDosProdutosCadastrados += parseInt(value.innerHTML);
            });
            $('#valorTotal').html(`Valor total: $${somaDosValoresTotaisDosProdutosCadastrados}`);
        }



        function validarQuantidade(itemId, novaQuantidade, quantidadeEstoque) {
            if (novaQuantidade > quantidadeEstoque) {
                // Restaurar para a quantidade máxima permitida
                document.getElementById('quantidade' + itemId).value = quantidadeEstoque;
            }
        }

        function atualizarValorTotalCarrinho() {
            let total = 0;
            $('.card.rounded-3.mb-4').each(function() {
                let itemId = $(this).find('input[name="quantidade"]').attr('id').replace('quantidade', '');
                console.log('itemId:', itemId);

                let quantidade = parseInt($(this).find('input[name="quantidade"]').val());
                console.log('quantidade:', quantidade);

                let valorUnitario = parseFloat(window['valorUnitario' + itemId]);
                console.log('valorUnitario:', valorUnitario);

                // Verifique se valorUnitario é um número válido
                if (isNaN(valorUnitario)) {
                    console.log('Erro: valorUnitario não é um número válido');
                    return; // Saia da função ou trate o erro conforme necessário
                }

                let subtotal = quantidade * valorUnitario;
                console.log('subtotal:', subtotal);

                total += subtotal;
            });

            console.log('total:', total);

            $('#valorTotal').text('Valor total: $' + total.toFixed(2));
        }

        $(document).ready(function(){
            $(".btn-aumentar-diminuir").on('click', function(e){
                alterarQuantidade($(this));
            });
        });

    </script>



</html>