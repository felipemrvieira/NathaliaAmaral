<?php
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");



$msg = $_POST['msg'];

if(array_key_exists("id", $_GET)) {

  $array_clientes = detalhaCliente($conexao, $_GET['id']);
  foreach($array_clientes as $cliente) {


      $to = $cliente['email_cliente'];
      $subject = "Parabéns! ".$cliente['nome_cliente'];

      //nl2br ("kings \n garden"); retorna com a quebra de linha
      $message = "
      <!DOCTYPE html>
      <html lang='pt-br'>
      <head>
      <meta charset='utf-8'>
      <title>Parabéns!!!</title>
      </head>
      <body style='font-family: arial;'>
      <center>

      <img src='http://www.nathaliaamaral.com.br/NathaliaAmaral/pages/img/feliz2.png' width='25%'><br>
      <p style='font-size: 18px; color: #460505;'>" .nl2br($msg)."</p>
      <img src='http://www.nathaliaamaral.com.br/NathaliaAmaral/pages/img/logochave.png' width='25%'><br>
      </body>
      </html>
      ";

      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <contato@nathaliaamaral.com>' . "\r\n";

      echo $message;
      mail($to,$subject,$message,$headers);

      enviaDesconto($conexao, $_GET['id']);
  }
}

header("location: aniversariantes.php?email=ok");
die();


?>
