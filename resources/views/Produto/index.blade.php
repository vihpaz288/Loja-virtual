<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
     .zoom-container {
            position: relative;
            overflow: hidden;
        }

        .zoom-lens {
            position: absolute;
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            display: none;
            pointer-events: none;
        }

        .zoom-image {
            display: block;
            width: 100%;
            height: auto;
        }
</style>
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
                <a class="nav-link text-white" href="#">Dados Usuario</a>
              </li>
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
                        <span class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>
                        <a href="" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                              </svg>
                        </a>
                    </li>
                     <li class="nav-item">
                        <span class="badge rounded-pill bg-light text-danger position-absolute"><small>5</small></span>
                        <a href="{{route('index.carrinho')}}" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
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
                <hr class="mt-3">

                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Miniaturas de fotos -->
                            {{-- <div class="row g-2"> --}}
                                @foreach ($produtos->image as $item)
                                    <div class="col-4">
                                        <img style="height: 150px; widht: 150px;" src="{{ asset('storage/' . $item->image) }}" class="img-thumbnail img-clickable" alt="Thumbnail 1">
                                    </div>
                                @endforeach
                            {{-- </div> --}}
                        </div>
                        <div class="col-md-6">
                            <!-- Carrossel de imagens -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($produtos->image as $item)
                                    <div class="carousel-item
                                        @if ($produtos->image[0]->id == $item->id)
                                            active
                                        @endif
                                        ">
                                       <img style="height: 500px; width: 500px;" src="{{ asset('storage/' . $item->image) }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- Descrição do Produto -->
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="card-title">{{$produtos->nome}}</h5>
                                    <p class="card-text">{{$produtos->descrição}}</p>
                                    <p class="card-text">Preço: {{$produtos->valor}}</p>
                                    {{-- <p class="card-text">Quantidade: {{$produtos->quantidade}}</p> --}}
                                    <p class="card-text">Prazo de Chegada: 7 dias úteis</p>
                                    <div class="card-footer">
                                        <a href="" class="btn btn-danger mt-2 d-block">Adicionar ao carrinho</a>
                                        <small class="text-success">{{$produtos->quantidade}} em estoque</small>
                                      </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

      <hr class="mt-3">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const thumbnails = document.querySelectorAll('.img-clickable');

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', () => {
                const index = Array.from(thumbnails).indexOf(thumbnail);
                const carousel = document.querySelector('#carouselExampleIndicators');
                const carouselInstance = bootstrap.Carousel.getInstance(carousel);
                carouselInstance.to(index);
            });
        });
    });
</script>
</html>
