<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .input-group {

            height: 100px;
        }

        .form-upload {
            background: #333;
            display: block;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            width: 350px;
        }

        .input-personalizado {
            cursor: pointer;
        }

        .imagem {
            max-width: 100%;
            width:
        }

        .input-file {
            display: none;
        }
    </style>
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
                    <form action="{{ route('update.produto', $produto->id) }}" method="POST" class="row g-3"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="inputAddress"
                                value="{{$produto->nome}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Valor</label>
                            <input type="text" name="valor" class="form-control" id="inputCity"
                               value="{{$produto->valor}}">
                        </div>

                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Quantidade</label>
                            <input type="number" name="quantidade" class="form-control" id="inputZip"
                                value="{{$produto->quantidade}}">
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nova_foto" class="form-label">Nova Foto</label>
                                <input type="file" class="form-control" id="nova_foto" name="foto1" >
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label2">Foto 1
                                    <div class="input-group">
                                        <input class="input-group-text form-control" name="file1[]" type="file"
                                            accept="image/*" id="formFile1" multiple>
                                    </div>
                                </label>
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                            <textarea class="form-control" name="descrição" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Digite aqui detalhes do produto">{{$produto->descrição}}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger mt-3 d-block">Editar</button>
                        </div>
                    </form>

                    {{-- <script>
                                const $ = document.querySelector.bind(document);
                                const previewImg1 = $('#img1');
                                const fileChooser1 = $('#formFile1');

                                const previewImg2 = $('#img2');
                                const fileChooser2 = $('#formFile2');

                                const previewImg3 = $('#img3');
                                const fileChooser3 = $('#formFile3');


                                fileChooser1.onchange = e => {
                                    const fileToUpload1 = e.target.files.item(0);
                                    const reader1 = new FileReader();
                                    reader1.onload = e => previewImg1.src = e.target.result;
                                    reader1.readAsDataURL(fileToUpload1);
                                };

                                fileChooser2.onchange = e => {
                                    const fileToUpload2 = e.target.files.item(0);
                                    const reader2 = new FileReader();
                                    reader2.onload = e => previewImg2.src = e.target.result;
                                    reader2.readAsDataURL(fileToUpload2);
                                };

                                fileChooser3.onchange = e => {
                                    const fileToUpload3 = e.target.files.item(0);
                                    const reader3 = new FileReader();
                                    reader3.onload = e => previewImg3.src = e.target.result;
                                    reader3.readAsDataURL(fileToUpload3);
                                };
                        </script> --}}
                    {{-- <hr class="mt-3"> --}}
                </div>
    </main>
    <footer class=" Pbg-light">
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
