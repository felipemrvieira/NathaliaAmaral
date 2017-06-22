<?php
include("DAO/conexao.php");
include("DAO/estoqueDAO.php");


$id = $_GET['id'];

excluiServico($conexao, $id);  
                 
header("location: search.services.php?status=ok&id=$id ");
die();
