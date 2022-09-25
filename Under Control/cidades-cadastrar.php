<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

$nomeCidade = '';
$uf = '';

if ($_POST) {
    $nomeCidade = trim($_POST['cidade']);
    $uf = trim($_POST['uf']);

    if ($nomeCidade == '') {
        $msg[] = "Insira o nome da cidade";
    }

    $sql = "select codCidade from CIDADE where nomeCidade = '$nomeCidade'";
    $consulta = mysqli_query($con, $sql);

    $resultado = mysqli_fetch_assoc($consulta);
    if($resultado){
        $msg[] = "Cidade já está cadastrada.";
    }

    $sql = "INSERT INTO cidade (nomeCidade,uf)VALUES ('$nomeCidade','$uf')";
    $consulta = mysqli_query($con, $sql);

        // Testar se foi inserido
        if (!$resultado) {
            $msg[] = 'Nao foi possivel inserir o registro.';
            $msg[] = mysqli_error($con);
        } else {
            $codCidade = mysqli_insert_id($con);
            $url = 'cidades-editar.php?codCidade=' . $codCidade;
            $mensagem = 'Cidade cadastrada!';

            javascriptAlertFim($mensagem, $url);
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar cidade</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-building"></i> Cadastrar cidade</h1>
          </div>
        </div>
      </div>


      <form class="row" role="form" method="post" action="cidades-cadastrar.php">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label for="fuf">UF</label>
                <select type="text" class="form-control" id="fuf" name="uf">

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
                <?php
                $query = "SELECT nomeCidade FROM cidade";

                $res = mysqli_query($con, $query);
                $linha = mysqli_fetch_Assoc($res);

                ?>
                <input type="text" class="form-control" id="fcidade" name="cidade" placeholder="Nome da cidade" <?php echo $linha['nomeCidade']?>>
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
