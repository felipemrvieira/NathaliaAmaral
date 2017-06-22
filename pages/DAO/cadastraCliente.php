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
$cliente['manequim'] = $_POST['manequim'];
$cliente['telefone_cliente'] = $_POST['telefone'];
$cliente['data_nascimento'] = $_POST['data_nascimento'];

$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $cliente['endereco_foto'] = $_FILES['userfile']['name'];
    
}
echo $cliente['endereco_foto'];

$idCliente = cadastrarCliente($conexao, $cliente);

header("location: form.endereco.php?status=ok&idCliente=$idCliente");
die();
