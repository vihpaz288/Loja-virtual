<!-- {{-- <!DOCTYPE html>
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
    <title>Cadastro de cliente</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" /> -->
    <!-- Bootstrap icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
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
</head> -->
<!-- 
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
            <h2>Cadastre o seus dados</h2>
            <p>Preencha os campos para poder acessar nosso site</p>
        </div>
        <form action="{{ route('store.user') }}" method="POST">
            @csrf



            <div class="row mb-3">

                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="text" class="form-control shadow-none" id="nome" name="name"
                        placeholder="Digite como deseja chamar" data-input />
                    <label for="complement">Nome</label>
                </div>

                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="text" class="form-control shadow-none" id="address" name="email"
                        placeholder="Rua" required data-input />
                    <label for="address">Email</label>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="date" class="form-control shadow-none" id="complement" name="dataNascimento"
                        placeholder="Digite o complemento" data-input />
                    <label for="complement">Data de nascimento</label>
                </div>
                <div class="col-12 col-sm-6 form-floating" >
                    <input type="tel" class="form-control shadow-none" maxlength="15" onkeyup="handlePhone(event)" name="telefone"
                        placeholder="Telefone" required data-input />
                        <label for="complement">Telefone</label>
                </div>


            </div>

            <div class="row mb-3">
                <div class="col-12 col-sm-6 mb-3 mb-md-0 form-floating">
                    <input type="password" class="form-control shadow-none" id="city" name="password"
                        placeholder="Cidade" required data-input />
                    <label for="city">Senha</label>
                </div>
                <input type="hidden" name="permissaoID"  value="2">
            </div>
            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
    </div> -->

    <!-- </form>
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

<script>
   const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
}

  </script>
</html>  -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Minha Loja Virtual</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
    html {
  background-color: #56baed;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #000000;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #000000;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(128,128,128);
  box-shadow: 0 10px 30px 0 rgba(128,128,128);
  -webkit-border-radius: 5px 5px 5px 5px; 
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #808080;
  cursor: pointer;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=email], [type=password], [type=text], [type=tel], [type=date] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=email], [type=password], [type=text], [type=tel], [type=date] {
  background-color: #fff;
  border-bottom: 2px solid #808080;
}

input[type=email], [type=password]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */


/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #808080;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #808080;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <!-- <div class="fadeIn first">
     <p id="icon">Lega</p>  
    </div> -->

    <!-- Login Form -->
    <form action="{{ route('store.user') }}" method="POST">
            @csrf
            <input type="hidden" name="permissaoID"  value="2">
      <input type="text" id="login" class="fadeIn second" name="name" placeholder="Nome">
      <input type="email" id="password" class="fadeIn third" name="email" placeholder="Email">
      <input type="date" id="login" class="fadeIn second" name="dataNascimento" placeholder="Data de nascimento">
      <input type="tel" id="password" class="fadeIn third" name="telefone" placeholder="Telefone" onkeyup="handlePhone(event)">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Senha">
      <input type="submit" class="fadeIn fourth" value="Cadastrar">
      <div id="formFooter">
        <a class="underlineHover" href="{{route('login')}}">Já possui conta? clique aqui</a>
      </div>
    </form>

    <!-- Remind Passowrd -->

  </div>
</div>
</body>
<script>
   const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
}

  </script>
</html>
