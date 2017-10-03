<?php
function aplicaPontoDecimal($str){
  $parte1 = substr($str, 0, strlen($str)-2);
  $parte2 = substr($str, strlen($str)-2, strlen($str));
  return $total = $parte1.".".$parte2;
}
?>
