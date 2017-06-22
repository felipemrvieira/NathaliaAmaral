<?php
include("DAO/conexao.php");
include("DAO/atividadesDAO.php");


$id = $_GET['id'];
$entregue = $_POST['entregue'];



entregaAtividade($conexao, $id, $entregue);
                 
header("location: detalhaEntrega.php?id=$id&status=ok");
die();
