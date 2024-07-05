<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Finalizar compra</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <style>
        :root {
            --bg-color: #04044c;
            --secondary-bg-color: #494a7d;
            --primary-color: #fff;
            --secondary-color: #25cc88;
            --text-color: #8789af;
            --border-color: #20235b;
        }
        #checkout-page {
            color: black;
        }
        #fade {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        #fade .spinner-border {
            width: 60px;
            height: 60px;
        }
        .hide {
            display: none !important;
        }
        #message {
            width: 40%;
        }
        .alert.alert-light p {
            border-bottom: 1px solid #333;
            padding: 1.2em 0;
        }
        #order-form-container {
            padding: 1.5em;
        }
        #steps {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }
        .step {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .step i {
            background-color: var(--secondary-bg-color);
            width: 45px;
            height: 45px;
            line-height: 45px;
            border-radius: 50%;
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 0.3em;
        }
        .step .active {
            background-color: var(--secondary-color);
        }
        .step p {
            color: var(--text-color);
        }
        .line {
            border-bottom: 1px solid var(--border-color);
            position: absolute;
            top: 22.5px;
            width: 90%;
            left: 5%;
            z-index: -1;
        }
        #form-header p {
            color: var(--text-color);
        }
        #order-form-container {
            max-width: 700px;
        }
        #order-form-container input,
        #order-form-container select {
            background-color: white;
            border: 2px solid #808080;
            color:black;
        }
        #order-form-container select {
            padding: 1rem 0.75rem;
        }
        #order-form-container label {
            color: var(--text-color);
        }
        #order-form-container input:disabled,
        #order-form-container select:disabled {
            background-color: var(--secondary-bg-color);
            color: var(--text-color);
        }
        #order-form-container input:focus {
            border-color: black;
        }
        #order-form-container .form-floating>label {
            left: 1em;
        }
        #save-btn {
            background-color: #25cc88;
            border: none;
            height: 3em;
            width: 8em;
            border-radius: 1.5em;
        }
        @media (min-width: 500px) {
            #save-btn {
                width: 8em;
            }
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
</head>
<body id="checkout-page">
    <div id="fade" class="hide">
        <div id="loader" class="spinner-border text-info hide" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div id="message" class="hide">
            <div class="alert alert-light" role="alert">
                <h4>Mensagem:</h4>
                <p></p>
                <button id="close-message" type="button" class="btn btn-secondary">
                    Fechar
                </button>
            </div>
        </div>
    </div>
    <div id="order-form-container" class="container p-6 my-md-4 px-md-0">
        <div id="steps" class="mb-md-3 pb-md-3"></div>
        <div id="form-header">
            <h2>Cadastre o seu endereço</h2>
            <p>Preencha os campos para podermos enviar seus produtos</p>
        </div>
        <form action="{{ route('store.pedido') }}" id="address-form" method="POST">
            @csrf
            @foreach ($produtos as $produto)
            {{-- @dd($produto->id); --}}
                <input type="hidden" name="produtoCarrinhoId[]" value="{{ $produto->id }}">
            @endforeach
            <div class="col-12 col-sm-6 mb-3">
                <select class="form-select shadow-none" name="enderecoId" id="endereco" required data-input>
                    <option disabled selected>Endereço</option>
                    @foreach ($enderecos as $endereco)
                        <option value="{{ $endereco->id }}">{{ $endereco->nome }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div id="form-header">
                <h2>Escolha a forma de pagamento</h2>
                <p>Preencha os campos para podermos enviar seus produtos</p>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <select class="form-select shadow-none" id="opcaoPagamento" name="formaPagamento" required data-input>
                    <option value="" disabled selected>Forma de pagamento</option>
                    <option value="1">Cartão cadastrado</option>
                    <option value="3">Pix</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                @if (!isset($cartaos[0]->id))
                    <div class="form-check opcaoCartao" style="display: none">
                        <h5 class="text-danger">Nenhum cartão cadastrado</h5>
                    </div>
                @else
                    @foreach ($cartaos as $cartao)
                        <div class="form-check opcaoCartao" style="display: none">
                            <input class="form-check-input" type="radio" name="cartaoId"
                                id="cartao-{{ $cartao->id }}" value="{{ $cartao->id }}" checked>
                            <label class="form-check-label" for="cartao-{{ $cartao->id }}">
                                {{ $cartao->nome }}
                            </label>
                        </div>
                    @endforeach
                @endif
                </select>
            </div>
            <input type="hidden" name="statusId" value="1">
            <div class="pix" id="pix" style="display: none">
                <div class="row mb-3">
                    <label id="pix" class="form-control shadow-none" name="pix" disabled data-input
                        for="neighborhood">Chave pix: 0000000000</label>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-end">
                <button type="submit" class="finalizar">
                    Finalizar
                </button>
            </div>
        </form>
    </div>
</body>
<script>
    $('#opcaoPagamento').on('change', function() {
        let opcaoPagamento = $(this).val();
        if (opcaoPagamento == 1) {
            $('.opcaoCartao').show();
            $('#CadastrarCartao').hide();
            $('#pix').hide();
        } else if (opcaoPagamento == 2) {
            $('.opcaoCartao').hide();
            $('#CadastrarCartao').show();
            $('#pix').hide();
        } else {
            $('.opcaoCartao').hide();
            $('#CadastrarCartao').hide();
            $('#pix').show();
        }
    });
    document.getElementById('endereco').addEventListener('change', function() {
        var enderecoSelecionado = this.value;
        if (enderecoSelecionado === 'outroEndereco') {
            document.querySelector('.endereco').style.display = 'block';
        } else {
            document.querySelector('.endereco').style.display = 'none';
        }
    });
    $('#CadastrarEndereco').on('click', function(e) {
        console.log(form);
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                console.log(response)
                iziToast.success({
                    title: 'Atualizado',
                    message: response.msg,
                });
            }
        });
    });
</script>
</html>
