<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Autocomplete Endereço</title>
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
            background-color: var(--bg-color);
            color: var(--primary-color);
        }

        /* Message */
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

        /* Steps */
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

        /* Form header */
        #form-header p {
            color: var(--text-color);
        }

        /* Form */
        #order-form-container {
            max-width: 700px;
        }

        #order-form-container input,
        #order-form-container select {
            background-color: var(--bg-color);
            border: 2px solid var(--border-color);
            color: var(--primary-color);
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
            border-color: var(--secondary-color);
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

        /* Responsive */
        @media (min-width: 500px) {
            #save-btn {
                width: 8em;
            }
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
        {{-- <div id="steps" class="mb-md-3 pb-md-3">
            <div class="line"></div>
            <div class="step">
                <i class="bi bi-person active"></i>
                <p class="d-none d-md-block">Endereço</p>
            </div>
            <div class="step">
                <i class="bi bi-person active"></i>
                <p class="d-none d-md-block">Pagamento</p>
            </div>
            <div class="step">
                <i class="bi bi-geo-alt active"></i>
                <p class="d-none d-md-block">Contato</p>
            </div>
            {{-- <div class="step">
          <i class="bi bi-credit-card"></i>
          <p class="d-none d-md-block">Pagamento</p>
        </div> --}}

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

            </div>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">
            Finalizar
        </button>
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
