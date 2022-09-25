<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

// clientes-editar.php?idcliente=1

if ($_POST) {
  $codCidade = (int) $_POST['codCidade'];
}
else {
  $codCidade = (int) $_GET['codCidade'];
}

$sql = "Select * From cidade
Where (codCidade = $codCidade)";

$r = mysqli_query($con, $sql);

if ($r->num_rows == 0) {
    $url = 'cidades.php';
    $msg = "Registro inexistente.";
    javascriptAlertFim($msg, $url);
}

$cidade = mysqli_fetch_assoc($r);

$nomeCidade = $cidade['nomeCidade'];
$uf = $cidade['uf'];

if ($_POST) {
  $nomeCidade = $_POST['cidade'];
  $uf = $_POST['uf'];


  // Validar informacoes
  if ($nomeCidade == '') {
    $msg[] = 'Informe o nome da cidade';
  }

  if (!$msg) {
    // Salvar informacoes
    $sql = "Update cidade Set
    nomeCidade = '$nomeCidade',
    uf = '$uf'
    Where (codCidade = $codCidade)";

    $r = mysqli_query($con, $sql);

    if (!$r) {
      $msg[] = 'Erro para inserir o registro';
      $msg[] = mysqli_error($con);
    }
    else {
      $url = 'cidades-editar.php?codCidade=' . $codCidade;
      $msg = "Cidade $codCidade alterada.";

      javascriptAlertFim($msg, $url);
    }
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar cidade</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-building"></i> Editar cidade <?php echo $codCidade; ?> </h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="cidades-editar.php">
        <div class="col-xs-12">

          <input type="hidden" name="codCidade" value="<?php echo $codCidade; ?>">

          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label for="fuf">UF</label>
                <select class="form-control" id="fuf" name="uf">
                  <option ><?php echo $uf; ?></option>
                  <option>AC</option>
                  <option>AL</option>
                  <option>AP</option>
                  <option>AM</option>
                  <option>BA</option>
                  <option>CE</option>
                  <option>DF</option>
                  <option>ES</option>
                  <option>GO</option>
                  <option>MA</option>
                  <option>MT</option>
                  <option>MS</option>
                  <option>MG</option>
                  <option>PA</option>
                  <option>PB</option>
                  <option>PR</option>
                  <option>PE</option>
                  <option>PI</option>
                  <option>RJ</option>
                  <option>RN</option>
                  <option>RS</option>
                  <option>RO</option>
                  <option>RR</option>
                  <option>SC</option>
                  <option>SP</option>
                  <option>SE</option>
                  <option>TO</option>
                </select>
              </div>
            </div>
            <div class="col-xs-10">
              <div class="form-group">
                <label for="fcidade">Cidade</label>
                <input type="text" class="form-control" id="fcidade" name="cidade" placeholder="Nome da cidade" value="<?php echo $nomeCidade; ?>">
              </div>
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
