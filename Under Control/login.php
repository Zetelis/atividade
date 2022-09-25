<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

if($_POST){
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $tipo = USUARIO_ATIVO;

  $senha = "0409". $senha;
  $senha = md5($senha);
  //fazendo consulta
  $sql = "Select codUsuario, nomeUsuario from usuario where (login = '$login') and (senha = '$senha') and (tipo = $tipo) ";

  $resultado = mysqli_query($con,$sql);
  $usuario = mysqli_fetch_assoc($resultado);

  if($usuario){
    session_start();
    $_SESSION['codUsuario'] = $usuario['codUsuario'];
    $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];
    header('location:index.php'); //enviando o usuario para a pagina inicial
    exit;
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Under control</title>


    <?php headCss(); ?>

    <style type="text/css">
        body {
            background-image:url("");
            padding-top: 100px;
            padding-bottom: 40px;
          }

          .container {
            max-width: 330px;
          }


          form { margin-bottom: 15px; }
    </style>
  </head>

  <body>


    <div class="container">
      <div class="row">

        <div class="col-xs-12">

          <h2 class="form-signin-heading" id="h1" id="h2">Faça seu login</h2>

          <form class="form-signin" role="form" method="post" action="login.php">
            <div class="form-group">
              <label for="flogin" class="sr-only">login: </label>
              <input type="login" class="form-control" id="flogin" name="login" placeholder="Login">
            </div>

            <div class="form-group"codUsuario
              <label for="fsenha" class="sr-only">Senha: </label>
              <input type="password" class="form-control" id="fsenha" name="senha" placeholder="Senha">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Fazer login</button>
          </form>

        </div>
      </div>


    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
