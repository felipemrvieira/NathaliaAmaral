<?php

function validaUsuarioLogado(){
    if(!$_SESSION["usuario"]){
        header("Location: login.php");
    }
}