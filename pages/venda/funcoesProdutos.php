<?php

// funções --->>>--->>>--->>>--->>>--->>>--->>>--->>>--->>>--->>>--->>>--->>>--->>>---


//lista todos os itens
function listaItens(){
    if(isset($_SESSION['cesta'])==true){
        $_SESSION['totalCesta']=0;
        $qtd = sizeof($_SESSION['cesta']);
        
        for($i=0; $i < $qtd; $i++) {
        echo'<tr>'; 
            
        echo'<td>'.$_SESSION['cesta'][$i]['nome'].'</td>';
        echo'<td>'.$_SESSION['cesta'][$i]['qtd'].'</td>';
        echo'<td>R$ '.$_SESSION['cesta'][$i]['valor'].'</td>';
        echo'<td>R$ '.$_SESSION['cesta'][$i]['totalItem'].'</td>';
        //logica para exibição do botão
        //ele so deve aparecer na pagina de edição
        if(isset($_SESSION['editaCesta']) && $_SESSION['editaCesta'] ==true){
            echo '<td><form action="editarVenda.php?id=x"> 
                <button type="submit" class="btn btn-default btn-block">Remover</button></form>
                </td>';
        }
        $_SESSION['totalCesta'] +=  $_SESSION['cesta'][$i]['totalItem'];
         
        echo'</tr>';
                
    }
       
        //rodape de informaçoes da nota
        echo'<tr>'; 
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong>Total:</strong></td>';
        echo'<td><strong>R$ '.$_SESSION['totalCesta'].'</strong></td>';
        echo'</tr>';
        
        echo'<tr>'; 
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong>Total itens:</strong></td>';
        echo'<td><strong>'. sizeof($_SESSION['cesta']).'</strong></td>';
        echo'</tr>';
        
        echo'<tr>'; 
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong>Cliente Selecionado:</strong></td>';
        echo'<td><strong>'. $_SESSION['nome_cliente'] .'</strong></td>';
        echo'</tr>';
    }
}

//formato da string "notebook|5000/1"
function extraiNome($dado){
   return substr($dado, 0, strpos($dado, '|'));
}

function extraivalor($dado){
    return substr($dado, strpos($dado, '|')+1, (strpos($dado, '/') - strpos($dado, '|') -1) );
    
}
function extraiId($dado){
    return substr($dado, strpos($dado, '/')+1, strlen($dado));
    
}

function limpaCarrinho(){
    if(array_key_exists('limpar', $_GET) && $_GET['limpar']==true){
        echo 'limpando';
        session_unset();
        session_destroy();
    }
}
function exibeCliente(){
    if (isset($_SESSION['nome_cliente'])){
    echo 'Cliente: ';
    echo $_SESSION['nome_cliente'];
    }
}

function apresentaNota(){
    
    echo '<table class="table table-condensed">';
  
    echo '<thead>';
      echo '<tr>';
        echo '<th>Produto</th>';
        echo '<th>Qtd</th>';
        echo '<th>Valor</th>';
        echo '<th>Total Item</th>';
      echo '</tr>';
    echo '</thead>';
    
    echo'<tbody>';
           
    listaItens();
    echo'</tbody>';
    echo '</table>';   
}
