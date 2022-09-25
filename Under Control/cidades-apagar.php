<?php

require './protege.php';
require './config.php';
require './lib/conexao.php';
require './lib/funcoes.php';

if(isset($_GET['codCidade'])){
    $codCidade= (int) $_GET['codCidade'];
}
else{
    echo 'Código invalido';
    exit;
}
$sql = "delete from cidade where codCidade = $codCidade";
$deletar = mysqli_query($con, $sql);

if(mysqli_affected_rows($con)==1){
    $msg = "Registro $codCidade eliminado" ;
}
else{
    $msg = 'Registro não encontrado';
}
$url = 'cidades.php';

javaScriptAlertFim($msg, $url);
?>