<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Escolha a Quantidade</h1>

<form action="{{ route('carrinho.finalizar') }}" method="POST">
    @csrf
    <input type="hidden" name="produto_id" value="{{ $produtoId }}">
    <label for="quantidade">Quantidade:</label>
    <input type="number" name="quantidade" id="quantidade" min="1" value="1">
    <button type="submit">Adicionar ao Carrinho</button>
</form>
</body>
</html>
