<?php


function buscaUsuario($conexao, $email, $pwd) {
    $senhaMd5 = md5($pwd);
    $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}