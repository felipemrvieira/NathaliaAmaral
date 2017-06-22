<?php
ob_start();

echo $nome =  $_POST['nome'];

header("location: search.client.php?nome=$nome");
die();
