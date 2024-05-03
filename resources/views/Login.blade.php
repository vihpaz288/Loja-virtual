{{-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
            <div class="container">
              <a class="navbar-brand" href="#"><b>Loja</b></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".nvbar-collapse">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" >
                <ul class="navbar-nav flex-grow-1">

                  <li class="nav-item">
                    <a class="nav-link text-white"  href="#">

                    </a>
                  </li>
                </ul>
                <div class="align-self-end">
                    <ul class="navbar-nav">
                       <li class="nav-item">
                            <a href="" class="nav-link text-white">
                                <span class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                  </svg>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="" class="nav-link text-white">Cadastra-se</a>
                        </li>
                    </ul>
                </div>
              </div>
            </div>
          </nav>


          <main class="flex-fill border border-top-0 p-5" >
            <div class="container">
                <hr class="mt-3">

                <div class="row mt-5">

                    <div class="col">
                        <form action="{{route('logar')}}" method="POST">
                            @csrf
                        <label for="">Email:</label>
                      <input name="email" type="text" class="form-control" placeholder="Digite aqui seu email" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="">Senha:</label>
                      <input type="password" name="password"  class="form-control" placeholder="Digite aqui sua senha" aria-label="Last name">
                    </div>
                  </div>
                 <div>

                    <button class="btn btn-danger mt-3 d-block">Entrar</button>
                    <a href="" class="btn btn-danger mt-2 d-block">Esqueci minha senha</a>
                  </div>
                </form>
             <hr class="mt-3">
            </div>
          </main>
      <footer class=" fixed-bottom border-top text-muted bg-light">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-4 text-center">
                    © 2024 Loja - Todos os direitos reservados.
                </div>
                <div class="col-12 col-md-4 text-center">
                   <a href="{{route('politica')}}" class="text-decoration-none text-dark">Politica de privacidade</a><br>
                    <a href="{{route('termo')}}" class="text-decoration-none text-dark">Termo de Uso</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html> --}}


{{-- <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="#"><b>Loja</b></a>

            </div>
    </div>
    </div>
    </nav>
    <main class="flex-fill border border-top-0 p-5">
        <div class="container">

            <div class="row mt-5">

                <div class="col">
                    <form action="{{ route('store.user') }}" method="POST">
                        @csrf
                        <div class="col">
                            <label for="">Nome:</label>
                            <input type="text" class="form-control" placeholder="Digite aqui seu nome"
                                aria-label="Last name" name="name">
                        </div>
                        <div>
                            <label for="">Email:</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="Digite aqui seu email" aria-label="First name">

                                <div>
                                    <label for="">Data de nascimento:</label>
                                    <input type="date" name="dataNascimento" class="form-control"
                                    placeholder="Digite aqui seu email" aria-label="First name" >
                                </div>
                                <label for="">Telefone:</label>
                            <input type="text" name="telefone" class="form-control"
                                placeholder="Digite aqui seu email" aria-label="First name">

                                <div class="col">
                                    <label for="">Senha:</label>
                                    <input type="password" name="password" class="form-control"
                                    placeholder="Digite aqui sua senha" aria-label="Last name">
                                </div>
                            </div> <input type="hidden" name="permissaoID"  value="2">
                </div>
                <div>
                    <button type="submit" class="btn btn-danger mt-3 d-block">Cadastra-se</button>


                </div>
                </form>

            </div>
    </main>
    <footer class=" fixed-bottom border-top text-muted bg-light">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
  />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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

        /* #save-btn {
            background-color: #25cc88;
            border: none;
            height: 3em;
            width: 8em;
            border-radius: 1.5em;
        } */

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


        <div id="form-header">
            <h2>Coloque seus dados</h2>
            <p>Preencha os campos para poder acessar nosso site</p>
        </div>
        <form action="{{route('logar')}}" method="POST">
            @csrf
            {{-- <input type="hidden" name="userId" value="{{ auth()->user()->id }}"> --}}


            <div class="row mb-3">

                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="email" class="form-control shadow-none" id="email" name="email"
                        placeholder="Digite como deseja chamar" data-input />
                    <label for="complement">Email</label>
                </div>
                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="password" class="form-control shadow-none" id="nome" name="password"
                        placeholder="Digite como deseja chamar" data-input />
                    <label for="complement">Senha</label>
                </div>

            </div>


            <button type="submit" class="btn btn-primary">
                Entrar
            </button>
            <a class="btn btn-primary" href="http://">Cadastrar</a>
            {{-- <button type="submit" class="btn btn-primary">
                Cadastrar
            </button> --}}
    </div>

    </form>
    <footer class="fixed-bottom border-top text-muted " >
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-4 text-center" style="color: white;">
                    © 2024 Loja - Todos os direitos reservados.
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a href="{{ route('politica') }}" class="text-decoration-none " style="color: white;">Politica de
                        privacidade</a><br>
                    <a href="{{ route('termo') }}" class="text-decoration-none " style="color: white;">Termo de Uso</a>
                </div>
                <div class="col-12 col-md-4 text-center" style="color: white;">
                    <a href="" class="text-decoration-none" style="color: white;">Contato</a><br>
                    E-mail: <a href="" class="text-decoration-none" style="color: white;">email@email.com</a><br>
                    Telefone: <a href="" class="text-decoration-none" style="color: white;">(87) 222222</a><br>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>

</html>
