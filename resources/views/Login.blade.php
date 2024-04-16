<!DOCTYPE html>
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
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link text-white">
                                <span class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                  </svg>
                            </a>
                        </li> --}}


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
                {{-- <hr class="mt-3"> --}}

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
                {{-- <hr class="mt-3"> --}}
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

</html>
