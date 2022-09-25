<?php
require './protege.php';
require './config.php';
require './lib/conexao.php';
require './lib/funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-headphones"></i> Produtos</h1>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Produtos</h3>
            </div>

            <form class="panel-body form-inline" role="form" method="get" action="">
              <div class="form-group">
                <label class="sr-only" for="fq">Pesquisa</label>
                <input type="search" class="form-control" id="fq" name="q" placeholder="Pesquisa">
              </div>
              <button type="submit" class="btn btn-default">Pesquisar</button>
            </form>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Descrição</th>
                  <th>Quantidade</th>
                  <th>Custo</th>
                  <th>Cor</th>
                  <th>Referência</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $resultado{codProduto};?></td>
                  <td><?php echo $resultado{decricao};?></td>
                  <td><?php echo $resultado{qtdeEstoque};?></td>
                  <td><?php echo $resultado{custo};?></td>
                  <td><?php echo $resultado{cor};?></td>
                  <td><?php echo $resultado{referencia};?></td>
                  <td>
                    <a href="produtos-editar.php?codProduto=<?php echo $resultado{codProduto};?>" title="Editar"><i class="fa fa-edit fa-lg"></i></a>
                    <a href="produtos-apagar.php?codProduto=<?php echo $resultado{codProduto};?>" title="Remover"><i class="fa fa-times fa-lg"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
