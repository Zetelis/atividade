<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar produto</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-headphones"></i> Cadastrar produto</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="produtos-cadastrar.php">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fdescricao">Descrição</label>
                <input type="text" class="form-control" id="fdescricao" name="descricao" placeholder="Descrição do produto">
                </select>
              </div>
            </div>

            <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fquantidade">Quantiade</label>
                <input type="number" class="form-control" id="fquantidade" name="quantidade">
              </div>
            </div>
          </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcor">Cor</label>
                <input type="text" class="form-control" id="fcor" name="cor" placeholder="Cor">
                </select>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcusto">Custo</label>
                <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control" id="fcusto" name="custo" placeholder="Custo do produto">
              </div>
                </select>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="freferencia">Referência</label>
                <input type="text" class="form-control" id="freferencia" name="referencia" placeholder="Referência do produto">
                </select>
              </div>
            </div>


          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
          </div>
        </div>
      </form>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
