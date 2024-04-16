<!DOCTYPE html>
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
            {{-- <hr class="mt-3"> --}}

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
                                <label for="">elefone:</label>
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
                    {{-- <a href="" class="btn btn-danger mt-3 d-block">Login</a> --}}

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

</html>
