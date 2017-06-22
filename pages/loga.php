<?php
include("DAO/conexao.php");
session_start();


$email = $_POST['email'];
$senha = $_POST['password'];


echo $sql = "select * From usuarios WHERE email='{$email}' AND senha='{$senha}'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) == 0){
	header("Location: login.php");
}else{
	$_SESSION["usuario"] = $email;
    header("Location: index.php");

}
