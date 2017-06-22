<?php

function listaAtividades($conexao){
    $array_atividades = array();
    //lista venda de produtos
    $resultado = mysqli_query($conexao, "select 
                                            c.id_cliente, c.nome_cliente, c.email_cliente, c.telefone_cliente,

                                            v.id_venda, v.id_cliente, v.data_entrega,
                                            DATEDIFF(v.data_entrega , v.data_venda)+1 as total, 
                                            DATEDIFF(v.data_entrega , curdate()) as restante,
                                            round(((DATEDIFF(v.data_entrega , curdate() )*100) / 
                                            (DATEDIFF(v.data_entrega , v.data_venda)+1) -100)*-1)  as percentual,

                                            iv.id_venda, iv.qtd_itens, iv.id_prod_serv,

                                            p.id_prod_serv, p.nome_produto as nome_prod_serv

                                            from cliente c
                                            join venda v on(c.id_cliente = v.id_cliente)
                                            join itens_venda iv on(v.id_venda = iv.id_venda)
                                            join produto p on (iv.id_prod_serv = p.id_prod_serv)

                                            where v.entregue = 'nao'
                                            order by v.id_venda");

    while($atividade = mysqli_fetch_assoc($resultado)){
        array_push($array_atividades, $atividade);
    }
    
    
    //lista venda de serviços
    $resultado = mysqli_query($conexao, "select 
                                            c.id_cliente, c.nome_cliente, c.email_cliente, c.telefone_cliente,

                                            v.id_venda, v.id_cliente , v.data_entrega,
                                            DATEDIFF(v.data_entrega , v.data_venda)+1 as total, 
                                            DATEDIFF(v.data_entrega , curdate()) as restante,
                                            round(((DATEDIFF(v.data_entrega , curdate() )*100) / 
                                            (DATEDIFF(v.data_entrega , v.data_venda)+1) -100)*-1)  as percentual,

                                            iv.id_venda, iv.qtd_itens, iv.id_prod_serv,

                                            s.id_prod_serv, s.nome_servico as nome_prod_serv

                                            from cliente c
                                            join venda v on(c.id_cliente = v.id_cliente)
                                            join itens_venda iv on(v.id_venda = iv.id_venda)
                                            join servico s on (iv.id_prod_serv = s.id_prod_serv)

                                            where v.entregue = 'nao'
                                            order by v.id_venda");

    while($atividade = mysqli_fetch_assoc($resultado)){
        array_push($array_atividades, $atividade);
    }
    
    return $array_atividades;
}

function detalhaAtividades($conexao, $id){
    $array_atividades = array();
    //lista venda de produtos
    $resultado = mysqli_query($conexao, "select 
                                            c.id_cliente, c.nome_cliente, c.email_cliente, c.telefone_cliente,c.manequim,

                                            v.id_venda, v.id_cliente, DATE_FORMAT(v.data_entrega,'%d-%m-%Y') as data_entrega, v.total as valor, DATE_FORMAT(v.data_venda,'%d-%m-%Y') as data_venda, v.entregue,
                                            DATEDIFF(v.data_entrega , v.data_venda)+1 as total, 
                                            DATEDIFF(v.data_entrega , curdate()) as restante,
                                            round(((DATEDIFF(v.data_entrega , curdate() )*100) / 
                                            (DATEDIFF(v.data_entrega , v.data_venda)+1) -100)*-1)  as percentual,

                                            iv.id_venda, iv.qtd_itens, iv.id_prod_serv,

                                            p.id_prod_serv, p.nome_produto as nome_prod_serv

                                            from cliente c
                                            join venda v on(c.id_cliente = v.id_cliente)
                                            join itens_venda iv on(v.id_venda = iv.id_venda)
                                            join produto p on (iv.id_prod_serv = p.id_prod_serv)

                                            where v.id_venda = '{$id}'
                                            order by v.id_venda");

    while($atividade = mysqli_fetch_assoc($resultado)){
        array_push($array_atividades, $atividade);
    }
    
    
    //lista venda de serviços
    $resultado = mysqli_query($conexao, "select 
                                            c.id_cliente, c.nome_cliente, c.email_cliente, c.telefone_cliente,c.manequim,

                                            v.id_venda, v.id_cliente , v.data_entrega, v.total as valor, v.data_venda, v.entregue,
                                            DATEDIFF(v.data_entrega , v.data_venda)+1 as total, 
                                            DATEDIFF(v.data_entrega , curdate()) as restante,
                                            round(((DATEDIFF(v.data_entrega , curdate() )*100) / 
                                            (DATEDIFF(v.data_entrega , v.data_venda)+1) -100)*-1)  as percentual,

                                            iv.id_venda, iv.qtd_itens, iv.id_prod_serv,

                                            s.id_prod_serv, s.nome_servico as nome_prod_serv

                                            from cliente c
                                            join venda v on(c.id_cliente = v.id_cliente)
                                            join itens_venda iv on(v.id_venda = iv.id_venda)
                                            join servico s on (iv.id_prod_serv = s.id_prod_serv)

                                            where v.id_venda = '{$id}'
                                            order by v.id_venda");

    while($atividade = mysqli_fetch_assoc($resultado)){
        array_push($array_atividades, $atividade);
    }
    
    return $array_atividades;
}


function listaAtividadesConclusas($conexao){
    $array_atividades = array();
    //lista venda de produtos
    $resultado = mysqli_query($conexao, "select 
                                            c.id_cliente, c.nome_cliente, c.email_cliente, c.telefone_cliente,

                                            v.id_venda, v.id_cliente, v.data_entrega,
                                            DATEDIFF(v.data_entrega , v.data_venda)+1 as total, 
                                            DATEDIFF(v.data_entrega , curdate()) as restante,
                                            round(((DATEDIFF(v.data_entrega , curdate() )*100) / 
                                            (DATEDIFF(v.data_entrega , v.data_venda)+1) -100)*-1)  as percentual,

                                            iv.id_venda, iv.qtd_itens, iv.id_prod_serv,

                                            p.id_prod_serv, p.nome_produto as nome_prod_serv

                                            from cliente c
                                            join venda v on(c.id_cliente = v.id_cliente)
                                            join itens_venda iv on(v.id_venda = iv.id_venda)
                                            join produto p on (iv.id_prod_serv = p.id_prod_serv)

                                            where v.entregue = 'sim'
                                            order by v.id_venda");

    while($atividade = mysqli_fetch_assoc($resultado)){
        array_push($array_atividades, $atividade);
    }
    
    
    //lista venda de serviços
    $resultado = mysqli_query($conexao, "select 
                                            c.id_cliente, c.nome_cliente, c.email_cliente, c.telefone_cliente,

                                            v.id_venda, v.id_cliente , v.data_entrega,
                                            DATEDIFF(v.data_entrega , v.data_venda)+1 as total, 
                                            DATEDIFF(v.data_entrega , curdate()) as restante,
                                            round(((DATEDIFF(v.data_entrega , curdate() )*100) / 
                                            (DATEDIFF(v.data_entrega , v.data_venda)+1) -100)*-1)  as percentual,

                                            iv.id_venda, iv.qtd_itens, iv.id_prod_serv,

                                            s.id_prod_serv, s.nome_servico as nome_prod_serv

                                            from cliente c
                                            join venda v on(c.id_cliente = v.id_cliente)
                                            join itens_venda iv on(v.id_venda = iv.id_venda)
                                            join servico s on (iv.id_prod_serv = s.id_prod_serv)

                                            where v.entregue = 'sim'
                                            order by v.id_venda");

    while($atividade = mysqli_fetch_assoc($resultado)){
        array_push($array_atividades, $atividade);
    }
    
    return $array_atividades;
}

function entregaAtividade($conexao, $id, $entregue){
    
    //lista venda de produtos
    $resultado = mysqli_query($conexao, "UPDATE venda 
    SET entregue = '{$entregue}' 
    WHERE  id_venda = '{$id}'");

    
    return $resultado;
}


