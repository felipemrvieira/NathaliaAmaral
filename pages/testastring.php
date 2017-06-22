<?php
echo extraivalor("notebook|5000/1");
echo'<br>';
echo strpos("notebook|5000/1", '|');
echo'<br>';
echo strpos("notebook|5000/1", '/');
echo'<br>';
echo'<br>';

echo substr("notebook|5000/1", 9, 4);





function extraivalor($dado){
    return substr($dado, strpos($dado, '|')+1, (strpos($dado, '/') - strpos($dado, '|') -1) );}
    //notebook|5000/1 
?>