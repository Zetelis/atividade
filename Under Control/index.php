<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Under Control</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="jumbotron">
  <div class="container">
    <h1>Under Control</h1>
    <p>Bem vindo <?php echo $_SESSION['nomeUsuario'] ?></p>
    <p>
      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="pessoas.php">
          <i class="fa fa-heart fa-lg"></i> Pessoas
        </a>
      </div>

      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="produtos.php">
          <i class="fa fa-book fa-lg"></i>  Produtos
        </a>
      </div>

      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="cidades.php">
          <i class="fa fa-bank fa-lg"></i>  Cidades
        </a>
      </div>

      <div class="btn-group">
        <a class="btn btn-primary btn-lg" role="button" href="usuarios.php">
          <i class="fa fa-user fa-lg"></i>  Usuários
        </a>
      </div>

    </p>
  </div>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
