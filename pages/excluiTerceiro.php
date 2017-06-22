<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");

if(array_key_exists("id", $_GET)) {

    echo $resultado = excluirTerceiro($conexao, $_GET['id']);
}
                 
header("location: terceiro.search.php?status=excluido");
die();
