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
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">CEP</label>
                                <select id="inputState" class="form-select">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Estado</label>
                                <select id="inputState" class="form-select">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                            </div>
                            <div class="col-12">
                              <label for="inputAddress" class="form-label">Rua</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="Digite aqui qual sua rua">
                            </div>
                            <div class="col-md-6">
                              <label for="inputCity" class="form-label">Cidade</label>
                              <input type="text" class="form-control" id="inputCity" placeholder="Digite aqui qual sua cidade">
                            </div>
                            <div class="col-md-2">
                              <label for="inputZip" class="form-label">Número</label>
                              <input type="text" class="form-control" id="inputZip" placeholder="Número de sua casa">
                            </div>
                            <div class="col-12">
                              <label for="inputAddress2" class="form-label">Complemento</label>
                              <input type="text" class="form-control" id="inputAddress2" placeholder="Digite aqui um complemento de seu endereço">
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
