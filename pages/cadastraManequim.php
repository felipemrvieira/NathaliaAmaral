<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");


echo $manequim['id_cliente'] = $_POST['id_cliente'];
echo $manequim['busto'] = $_POST['busto'];
echo $manequim['cintura'] = $_POST['cintura'];
echo $manequim['quadril'] = $_POST['quadril'];
echo $manequim['top'] = $_POST['top'];
echo $manequim['saia'] = $_POST['saia'];
echo $manequim['cavaFrente'] = $_POST['cavaFrente'];
echo $manequim['cavaCostas'] = $_POST['cavaCostas'];
echo $manequim['ombro'] = $_POST['ombro'];
echo $manequim['entreBusto'] = $_POST['entreBusto'];
echo $manequim['comprimentoManga'] = $_POST['comprimentoManga'];
echo $manequim['larguraManga'] = $_POST['larguraManga'];
echo $manequim['punho'] = $_POST['punho'];
echo $manequim['decoteFrente'] = $_POST['decoteFrente'];
echo $manequim['decoteCostas'] = $_POST['decoteCostas'];
echo $manequim['obs'] = $_POST['obs'];

$id_cliente = $manequim['id_cliente'];


cadastrarManequim($conexao, $manequim);
    
header("location: visualizarcliente.php?id=$id_cliente");
die();