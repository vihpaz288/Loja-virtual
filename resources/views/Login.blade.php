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
    display: inline-block;
    text-decoration: none;
    font-weight: 400;
  }

  h2 {
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    display: inline-block;
    margin: 40px 8px 10px 8px;
    color: #cccccc;
  }

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
    -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
    box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
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

  h2.inactive {
    color: #cccccc;
  }

  h2.active {
    color: #0d0d0d;
    border-bottom: 2px solid #5fbae9;
  }

  input[type=button],
  input[type=submit],
  input[type=reset] {
    background-color: #000000;
    border: none;
    color: white;
    padding: 15px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    font-size: 13px;
    -webkit-box-shadow: 0 10px 30px 0 rgba(128, 128, 128);
    box-shadow: 0 10px 30px 0 rgba(128, 128, 128);
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
    margin: 5px 20px 40px 20px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }

  input[type=button]:hover,
  input[type=submit]:hover,
  input[type=reset]:hover {
    background-color: #808080;
    cursor: pointer;
  }

  input[type=button]:active,
  input[type=submit]:active,
  input[type=reset]:active {
    -moz-transform: scale(0.95);
    -webkit-transform: scale(0.95);
    -o-transform: scale(0.95);
    -ms-transform: scale(0.95);
    transform: scale(0.95);
  }

  input[type=email],
  [type=password] {
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

  input[type=email],
  [type=password] {
    background-color: #fff;
    border-bottom: 2px solid #808080;
  }

  input[type=email],
  [type=password]:placeholder {
    color: #cccccc;
  }

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

  .underlineHover:hover:after {
    width: 100%;
  }

  *:focus {
    outline: none;
  }

  #icon {
    width: 60%;
  }

  #error-message {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #e4605e;
    color: #fff;
    padding: 10px 20px;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }

  #error-message li {
    list-style: none;
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 5px;
  }

  #success-message {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #65c368;
    color: #fff;
    padding: 10px 10px;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }

  #success-message li {
    list-style: none;
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 5px;
  }

  .hide {
    display: none;
  }
</style>

<div class="wrapper fadeInDown">
  @if ($errors->any())
  <div id="error-message">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </div>
  @endif

  @if(session('success'))
  <div id="success-message">
    <p>{{session('success')}}</p>
  </div>
  @endif

  <div id="formContent">
    
    <form action="{{route('logar')}}" method="POST">
      @csrf
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" value="{{ old('email') }}">
      @error('email')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" value="{{ old('password') }}">
      @error('password')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="{{route('create.user')}}">Ainda não tem conta? clique aqui</a>
    </div>
  </div>
</div>

</body>

<script>
  $(document).ready(function() {
    setTimeout(function() {
      $('.success-message').fadeOut('slow');
    }, 5000);
  });
  setTimeout(function() {
    document.getElementById('error-message').classList.add('hide');
  }, 5000);
</script>

</html>