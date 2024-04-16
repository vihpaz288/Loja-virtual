<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="#"><b>Loja</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target=".nvbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Dados usuario</a>
                        </li>

                    </ul>
                    <div class="align-self-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <span
                                    class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>
                                <a href="" class="nav-link text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span
                                    class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>
                                <a href="{{ route('index.carrinho') }}" class="nav-link text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link text-white">Sair</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main class="flex-fill">
            <div class="container">
                @foreach ($itens as $item)
                    <ul class="list-group mb-3">
                        <li class="list-group-item py-3">
                            <div class="row g-3">


                                <div class="col-4 col-md-3 col-lg-2">
                                        <a href="">
                                            <img src="{{ asset('storage/' . $item->produtos->image[0]->image) }}"
                                                class="card-img-top" alt="..." style="width: 100%; height: 150px;">
                                        </a>
                                </div>
                                <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                                    <h4>
                                        <b><a href=""
                                                class="text-decoration-none text-danger">{{ $item->produtos->nome }}</a></b>
                                    </h4>
                                    <h5>
                                        {{ $item->produtos->descrição }}
                                    </h5>
                                </div>
                                <div
                                    class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offse-lg-0 col-xl-2 align-self-center mt-3">
                                    <form action="{{ route('carrinho.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="input-group">
                                            <button class="btn btn-outline-dark btn-sm" type="button"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                                                </svg></button>
                                            <input type="text" class="form-control text-center border-dark"
                                                value="{{ $item->quantidade }}">

                                            <button class="btn btn-outline-dark btn-sm" type="button"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-caret-up" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.204 11h9.592L8 5.519zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659" />
                                                </svg></button>
                                            <button class="btn btn-outline-danger border-dark btn-sm" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                </svg>
                                            </button>
                                    </form>
                                </div>
                                <div class="text-right mt-2">
                                    <small class="text-secondary">Valor: {{ $item->produtos->valor }}</small><br>
                                    <span class="text-dark">Quantidade: {{ $item->produtos->quantidade }}</span>

                                </div>
                            </div>
            </div>
            </li>
            @endforeach
            <li class="list-group-item py-3 pb-0">
                <div class="text-end">
                    <h4 class="text-dark mb-3">Valor total: {{ $total }}</h4>
                    <a href="" class="btn btn-outline-success btn-lg mb-3">Continuar comprando</a>
                    <a href="{{ route('finalizar') }}"
                        class="btn btn-danger btn-lg ms-2 mt-3 mt-sm-0 mb-3">Finalizar</a>
                </div>
            </li>
            </ul>
    </div>
    </main>
    <footer class="border-top text-muted bg-light">
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
