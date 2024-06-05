<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar endereço</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- Bootstrap icons -->
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
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }
       
        #form-header p {
            color: black;
        }
        #order-form-container {
            max-width: 700px;
        }
        #order-form-container input,
        #order-form-container select {
            background-color: white;
            border: 2px solid #808080;
            color: black;
        }
        #order-form-container select {
            padding: 1rem 0.75rem;
        }
        #order-form-container label {
            color: black;
        }
        #order-form-container input:disabled,
        #order-form-container select:disabled {
            background-color: #808080;
            color: black;
        }
        #order-form-container input:focus {
            border-color: #808080;
        }
        #order-form-container .form-floating>label {
            left: 1em;
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
    .navbar-nav .nav-link[href="{{ route('dados', Auth::user()->id) }}"]::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ffffff; 
        transition: none; 
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
        <form action="{{ route('store.endereco') }}" id="address-form" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
            <div class="row mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control shadow-none" id="cep" name="CEP"
                        placeholder="Digite o seu CEP" maxlength="8" minlength="8" required />
                    <label for="cep">Digite o seu CEP</label>
                </div>
            </div>

            <div class="row mb-3">

                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="text" class="form-control shadow-none" id="nome" name="nome"
                        placeholder="Digite como deseja chamar" disabled data-input />
                    <label for="complement">Nome</label>
                </div>
                <div class="col-12 col-sm-6 mb-3">
                    <select class="form-select shadow-none" id="region" name="Estado" disabled
                        required data-input>
                        <option selected>Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="text" class="form-control shadow-none" id="address" name="rua"
                        placeholder="Rua" disabled required data-input />
                    <label for="address">Rua</label>
                </div>
                <div class="col-12 col-sm-6 form-floating">
                    <input type="text" class="form-control shadow-none" id="number" name="numero"
                        placeholder="Digite o número da residência" disabled required data-input />
                    <label for="number">Digite o número da residência</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="text" class="form-control shadow-none" id="complement" name="complemento"
                        placeholder="Digite o complemento" disabled data-input />
                    <label for="complement">Digite o complemento</label>
                </div>
                <div class="col-12 col-sm-6 form-floating">
                    <input type="text" class="form-control shadow-none" id="neighborhood" name="bairro"
                        placeholder="Bairro" disabled required data-input />
                    <label for="neighborhood">Bairro</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="text" class="form-control shadow-none" id="city" name="cidade"
                        placeholder="Cidade" disabled required data-input />
                    <label for="city">Cidade</label>
                </div>
                <div id="steps" class="mb-md-3 pb-md-3"></div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="finalizar">
                        Finalizar
                    </button>
                </div>
            </div>
    </div>
    </form>
    </div>
</body>
<script>
    const addressForm = document.querySelector("#address-form");
    const cepInput = document.querySelector("#cep");
    const addressInput = document.querySelector("#address");
    const cityInput = document.querySelector("#city");
    const neighborhoodInput = document.querySelector("#neighborhood");
    const regionInput = document.querySelector("#region");
    const formInputs = document.querySelectorAll("[data-input]");

    const closeButton = document.querySelector("#close-message");

    // Validate CEP Input
    cepInput.addEventListener("keypress", (e) => {
        const onlyNumbers = /[0-9]|\./;
        const key = String.fromCharCode(e.keyCode);

        console.log(key);

        console.log(onlyNumbers.test(key));

        // allow only numbers
        if (!onlyNumbers.test(key)) {
            e.preventDefault();
            return;
        }
    });

    // Evento to get address
    cepInput.addEventListener("keyup", (e) => {
        const inputValue = e.target.value;

        //   Check if we have a CEP
        if (inputValue.length === 8) {
            getAddress(inputValue);
        }
    });

    // Get address from API
   // Get address from API
const getAddress = async (cep) => {
    toggleLoader();

    cepInput.blur();

    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

    const response = await fetch(apiUrl);

    const data = await response.json();

    console.log(data);
    console.log(formInputs);
    console.log(data.erro);

    // Show error and reset form
    if (data.erro === "true") {
        if (!addressInput.hasAttribute("disabled")) {
            toggleDisabled();
        }

        addressForm.reset();
        toggleLoader();
        toggleMessage("CEP Inválido, tente novamente.");
        return;
    }

    // Activate disabled attribute if form is empty
    if (addressInput.value === "") {
        toggleDisabled();
    }

    addressInput.value = data.logradouro;
    cityInput.value = data.localidade;
    neighborhoodInput.value = data.bairro;
    regionInput.value = data.uf;

    // Remove the disabled attribute from regionInput
    regionInput.removeAttribute("disabled");

    toggleLoader();
};


    // Add or remove disable attribute
    const toggleDisabled = () => {
        if (regionInput.hasAttribute("disabled")) {
            formInputs.forEach((input) => {
                input.removeAttribute("disabled");
            });
        } else {
            formInputs.forEach((input) => {
                input.setAttribute("disabled", "disabled");
            });
        }
    };

    const toggleLoader = () => {
        const fadeElement = document.querySelector("#fade");
        const loaderElement = document.querySelector("#loader");

        fadeElement.classList.toggle("hide");
        loaderElement.classList.toggle("hide");
    };

    // Show or hide message
    // const toggleMessage = (msg) => {
    //     const fadeElement = document.querySelector("#fade");
    //     const messageElement = document.querySelector("#message");

    //     const messageTextElement = document.querySelector("#message p");

    //     messageTextElement.innerText = msg;

    //     fadeElement.classList.toggle("hide");
    //     messageElement.classList.toggle("hide");
    // };

    // Close message modal
    // closeButton.addEventListener("click", () => toggleMessage());

    // Save address
    // addressForm.addEventListener("submit", (e) => {
    //     e.preventDefault();

    //     toggleLoader();

    //     setTimeout(() => {
    //         toggleLoader();

    //         toggleMessage("Endereço salvo com sucesso!");

    //         addressForm.reset();

    //         toggleDisabled();
    //     }, 1000);
    // });
</script>

</html>
