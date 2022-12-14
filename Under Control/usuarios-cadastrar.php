<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

$nome = '';
$login = '';
$ativo = USUARIO_ATIVO;

if ($_POST) {
    $nome = trim($_POST['nome']);
    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);
    $senha2 = trim($_POST['senha2']);

    if (isset($_POST['ativo'])) {
        $tipo = USUARIO_ATIVO;
    } else {
        $tipo = USUARIO_INATIVO;
    }

    if ($nome == '') {
        $msg[] = "Insira um nome";
    }
    if (strlen($nome) < 3) {
        $msg[] = "O campo Nome deve conter no minimo 3 caracteres";
    }
    if ($login == '') {
        $msg[] = "Insira um login correto";
    }
    if ($senha == '') {
        $msg[] = "Insira uma senha";
    }

    if ($senha != $senha2){
        $msg[] = "As senhas não coferem digite novamente";
    }

    $sql = "select codUsuario from usuario where login = '$login'";
    $consulta = mysqli_query($con, $sql);

    $resultado = mysqli_fetch_assoc($consulta);
    if($resultado){
        $msg[] = "Este login ja esta cadastrado.";
    }

    if (!$msg) {
      $senha = md5('0409' . $senha);
        $sql = "Insert Into usuario (nomeUsuario,login,senha,tipo) Values ('$nome', '$login', '$senha', $tipo)";

        $resultado = mysqli_query($con, $sql);

        // Testar se foi inserido
        if (!$resultado) {
            $msg[] = 'Nao foi possivel inserir o registro.';
            $msg[] = mysqli_error($con);
        } else {
            $codUsuario = mysqli_insert_id($con);
            $url = 'usuarios-editar.php?codUsuario=' . $codUsuario;
            $mensagem = 'Usuário cadastrado!';

            javascriptAlertFim($mensagem, $url);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alterar cadastro de usuário</title>

        <?php headCss(); ?>
    </head>
    <body>

        <?php include 'nav.php'; ?>

        <div class="container">

            <div class="page-header">
                <h1><i class="fa fa-user"></i> Cadastrar usuário</h1>
            </div>

            <?php if ($msg) { msgHtml($msg); } ?>

            <form role="form" method="post" action="usuarios-cadastrar.php">
                <div class="form-group">
                    <label for="fnome">Nome</label>
                    <input type="text" class="form-control" id="fnome" name="nome" placeholder="Nome do usuário" value="<?php echo $nome; ?>">
                </div>

                <div class="form-group">
                    <label for="femail">Login</label>
                    <input type="login" class="form-control" id="femail" name="login" placeholder="Login do usuário" value="<?php echo $login; ?>">
                </div>

                <div class="row">
                    <div class="form-group col-sm-6 col-xs-6">
                        <label for="fsenha">Senha</label>
                        <input type="password" class="form-control" id="fsenha" name="senha" placeholder="Senha do usuário">
                    </div>

                    <div class="form-group col-xs-6">
                        <label for="fsenha2">Confirme a senha</label>
                        <input type="password" class="form-control" id="fsenha2" name="senha2" placeholder="Confirme a senha">
                    </div>
                </div>

                <div class="checkbox">
                    <label for="fativo">
                        <input type="checkbox" name="ativo" id="fativo" <?php if ($ativo == USUARIO_ATIVO) { ?>checked<?php } ?>> Usuário ativo
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>

        </div>

        <script src="./lib/jquery.js"></script>
        <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>
