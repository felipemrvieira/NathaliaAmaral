<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");

if(array_key_exists("id", $_GET)) {

    echo $resultado = excluirCliente($conexao, $_GET['id']);
}
                 
header("location: search.client.php?status=excluido");
die();
