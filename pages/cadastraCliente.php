<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");


$cliente['nome_cliente'] = $_POST['nome'];
$cliente['rg'] = $_POST['rg'];
$cliente['cpf'] = $_POST['cpf'];
$cliente['sexo'] = $_POST['sexo'];
$cliente['obs'] = $_POST['obs'];
$cliente['email_cliente'] = $_POST['email'];
$cliente['manequim'] = "vazio";
$cliente['telefone_cliente'] = $_POST['telefone'];
$cliente['data_nascimento'] = $_POST['data_nascimento'];

$uploaddir = 'uploads/';
//$uploadfile = $uploaddir . basename($_FILES['foto']['name']);
$uploadfile = $uploaddir . $cliente['nome_cliente'].'-avatar'.'.png';

if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
    $cliente['endereco_foto'] = $cliente['nome_cliente'].'-avatar'.'.png';
  }else {
    $cliente['endereco_foto'] = "uploads/avatar.png";
  }

$idCliente = cadastrarCliente($conexao, $cliente);

header("location: form.endereco.php?status=ok&idCliente=$idCliente");
die();
