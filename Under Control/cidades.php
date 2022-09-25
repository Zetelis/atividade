<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$q ='';
if(isset($_GET['q'])){
  $q =trim($_GET['q']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cidades</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-cubes"></i> Cidades</h1>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Cidades</h3>
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
        <th>Nome</th>
        <th>UF</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "select * from cidade";
        if($q != ''){
          $sql .= " where nomeCidade like '%$q%'";
        //  $sql .= " where uf like '%$q%'";
        }

        $consulta = mysqli_query($con,$sql);
        while( $resultado = mysqli_fetch_assoc($consulta)){
      ?>
      <tr>
        <td><?php echo $resultado['codCidade'];   ?></td>
        <td><?php echo $resultado['nomeCidade']; ?></td>
        <td><?php echo $resultado['uf']; ?></td>
        <td></td>
        <td></td>
        <td>
          <a href="cidades-editar.php?codCidade=<?php echo $resultado['codCidade'];?>" title="Editar cidade"><i class="fa fa-edit fa-lg"></i></a>
          <a href="cidades-apagar.php?codCidade=<?php echo $resultado['codCidade'];?>" title="Remover cidade"><i class="fa fa-times fa-lg"></i></a>
        </td>
      </tr><?php
    }
      ?>
    </tbody>
  </table>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
