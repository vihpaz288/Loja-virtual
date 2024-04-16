<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar cartão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
          <main class="flex-fill border border-top-0 p-5" >
            <div class="container">
                {{-- <hr class="mt-3"> --}}

                <div class="row mt-5">

                    <div class="col">
                        <form class="row g-3">
                            <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Nome:</label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Digite aqui seu nome">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Vencimento:</label>
                                <input type="date" class="form-control" id="inputPassword4" >
                            </div>
                            <div class="col-12">
                              <label for="inputAddress" class="form-label">Número:</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="Digite aqui o número do seu cartão">
                            </div>
                            <div class="col-12">
                              <label for="inputZip" class="form-label">Cvv:</label>
                              <input type="text" class="form-control" id="inputZip" placeholder="Digite aqui o Cvv do seu cartão">
                            </div>

                            <div class="col-12">
                              <button type="submit" class="btn btn-danger mt-3 d-block">Cadastrar</button>
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
