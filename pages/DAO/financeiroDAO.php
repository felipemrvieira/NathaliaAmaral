<?php

function listaVendas($conexao){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select
                                            v.id_venda, v.id_cliente, c.nome_cliente, v.total, f.forma_pgto, s.nome_servico,
                                            f.qtd_parcelas, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda

                                            from venda v
                                            join cliente c
                                            on (v.id_cliente = c.id_cliente) and ((v.data_venda >= curdate() and v.data_venda < curdate()+ INTERVAL 1 DAY))
                                            join forma_pagamento f on (v.id_venda = f.id_venda)
                                            join itens_venda iv on (v.id_venda = iv.id_venda)
                                            join servico s on (iv.id_prod_serv = s.id_prod_serv)
                                            order by v.id_venda");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function listaCompras($conexao){
    $array_compras = array();
    $resultado = mysqli_query($conexao, "select
    id, historico, codigo_nf, DATE_FORMAT(data_compra,'%d/%m/%Y') as data_compra,
    total, qtd_parcelas
    from compra");
    while($compra = mysqli_fetch_assoc($resultado)){
        array_push($array_compras, $compra);
    }
    return $array_compras;
}

function listaComprasEParcelas($conexao){
    $array_compras = array();
    $resultado = mysqli_query($conexao, "select c.id, c.historico, DATE_FORMAT(c.data_compra,'%d/%m/%Y') as data_compra,  c.total, c.qtd_parcelas,
                              cap.parcela, DATE_FORMAT(cap.vencimento,'%d/%m/%Y') as vencimento, cap.valor_parcela, cap.pago
                              from compra c
                              join contas_a_pagar cap on (c.id = cap.id_compra)
                              order by  c.id, cap.parcela;");
    while($compra = mysqli_fetch_assoc($resultado)){
        array_push($array_compras, $compra);
    }
    return $array_compras;
}
function listaComprasEParcelasPorMes($conexao, $mes){
    $array_compras = array();
    $sql = "select c.id, c.historico, DATE_FORMAT(c.data_compra,'%d/%m/%Y') as data_compra,  c.total, c.qtd_parcelas,
                              cap.id as id_parcela, cap.parcela, DATE_FORMAT(cap.vencimento,'%d/%m/%Y') as vencimento, cap.valor_parcela, cap.pago
                              from compra c
                              join contas_a_pagar cap on (c.id = cap.id_compra)
                              where month(cap.vencimento) = '{$mes}'
                              order by  c.id, cap.parcela;";
    $resultado = mysqli_query($conexao, $sql);
    while($compra = mysqli_fetch_assoc($resultado)){
        array_push($array_compras, $compra);
    }
    return $array_compras;
}

function listaComprasEParcelasDoMesEmAberto($conexao){
    $array_compras = array();
    $resultado = mysqli_query($conexao, "select c.id, c.historico, DATE_FORMAT(c.data_compra,'%d/%m/%Y') as data_compra,  c.total, c.qtd_parcelas,
                              cap.id as id_parcela, cap.parcela, DATE_FORMAT(cap.vencimento,'%d/%m/%Y') as vencimento, cap.valor_parcela, cap.pago
                              from compra c
                              join contas_a_pagar cap on (c.id = cap.id_compra)
                              where vencimento <= LAST_DAY(CURDATE()) and
                              cap.pago = 'n'
                              order by  c.id, cap.parcela;");
    while($compra = mysqli_fetch_assoc($resultado)){
        array_push($array_compras, $compra);
    }
    return $array_compras;
}

function listaComprasEParcelasDoMesPagas($conexao){
    $array_compras = array();
    $resultado = mysqli_query($conexao, "select c.id, c.historico, DATE_FORMAT(c.data_compra,'%d/%m/%Y') as data_compra,  c.total, c.qtd_parcelas,
                              cap.id as id_parcela, cap.parcela, DATE_FORMAT(cap.vencimento,'%d/%m/%Y') as vencimento, cap.valor_parcela, cap.pago
                              from compra c
                              join contas_a_pagar cap on (c.id = cap.id_compra)
                              where vencimento <= LAST_DAY(CURDATE()) and
                              cap.pago = 's'
                              order by  c.id, cap.parcela;");
    while($compra = mysqli_fetch_assoc($resultado)){
        array_push($array_compras, $compra);
    }
    return $array_compras;
}

function listaContasAReceber($conexao){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select * from contas_a_receber");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function buscaVendas($dataInicial, $dataFinal, $conexao){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select
                                            v.id_venda, v.id_cliente, c.nome_cliente, v.total, f.forma_pgto,
                                            f.qtd_parcelas, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda

                                            from venda v
                                            join cliente c
                                            on (v.id_cliente = c.id_cliente) and
                                            (v.data_venda BETWEEN '{$dataInicial}' AND '{$dataFinal}')
                                            join forma_pagamento f on (v.id_venda = f.id_venda)
                                            order by v.id_venda");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function buscaVendasComNome($debito, $credito, $boleto, $cheque, $especie,  $nome, $dataInicial, $dataFinal, $conexao){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select
                                            v.id_venda, v.id_cliente, c.nome_cliente, s.nome_servico, v.total, f.forma_pgto,
                                            f.qtd_parcelas, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda

                                            from venda v
                                            join cliente c
                                            on (v.id_cliente = c.id_cliente) and
                                            (v.data_venda BETWEEN '{$dataInicial}' AND '{$dataFinal}') and
                                            (c.nome_cliente LIKE '%{$nome}%')

                                            join forma_pagamento f on (v.id_venda = f.id_venda) and
                                            (f.forma_pgto = '{$debito}' or f.forma_pgto = '{$credito}' or f.forma_pgto = '{$boleto}' or f.forma_pgto = '{$cheque}' or f.forma_pgto = '{$especie}')
                                            join itens_venda iv on (v.id_venda = iv.id_venda)
                                            join servico s on (iv.id_prod_serv = s.id_prod_serv)
                                            order by v.id_venda");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function buscaVendasCliente($debito, $credito, $boleto, $cheque, $especie,$nome, $conexao){
    $array_vendas = array();
    $sql = "select
                  v.id_venda, v.id_cliente, c.nome_cliente, s.nome_servico, v.total, f.forma_pgto,
                  f.qtd_parcelas, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda

                  from venda v
                  join cliente c
                  on (v.id_cliente = c.id_cliente) and
                  (c.nome_cliente LIKE '%{$nome}%')

                  join forma_pagamento f on (v.id_venda = f.id_venda) and
                  (f.forma_pgto = '{$debito}' or f.forma_pgto = '{$credito}' or f.forma_pgto = '{$boleto}' or f.forma_pgto = '{$cheque}' or f.forma_pgto = '{$especie}')
                  join itens_venda iv on (v.id_venda = iv.id_venda)
                  join servico s on (iv.id_prod_serv = s.id_prod_serv)
                  order by v.id_venda";
    $resultado = mysqli_query($conexao, $sql);

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function buscaContasAReceber($conexao){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select car.id as id_parcela, c.nome_cliente, car.id_venda, car.recebido, v.id_venda,
fp.forma_pgto, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda, car.parcela, car.valor_parcela, DATE_FORMAT(car.vencimento,'%d/%m/%Y') as vencimento

from contas_a_receber car
join venda v on (car.id_venda = v.id_venda)
join cliente c on (v.id_cliente = c.id_cliente)
join forma_pagamento fp on (fp.id_venda = v.id_venda)

where car.recebido='n'

order by car.id_venda, vencimento, id");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function buscaContasAReceberCliente($conexao, $nome){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select car.id as id_parcela, c.nome_cliente, car.id_venda, car.recebido, v.id_venda,
fp.forma_pgto, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda, car.parcela, car.valor_parcela, DATE_FORMAT(car.vencimento,'%d/%m/%Y') as vencimento

from contas_a_receber car
join venda v on (car.id_venda = v.id_venda)
join cliente c on (v.id_cliente = c.id_cliente)
join forma_pagamento fp on (fp.id_venda = v.id_venda)

where car.recebido='n'
and c.nome_cliente LIKE '{$nome}'

order by car.id_venda, vencimento, id");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}


function buscaContasARecebidas($conexao){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select car.id as id_parcela, c.nome_cliente, car.id_venda, car.recebido, v.id_venda,
fp.forma_pgto, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda, car.parcela, car.valor_parcela, DATE_FORMAT(car.vencimento,'%d/%m/%Y') as vencimento

from contas_a_receber car
join venda v on (car.id_venda = v.id_venda)
join cliente c on (v.id_cliente = c.id_cliente)
join forma_pagamento fp on (fp.id_venda = v.id_venda)

where car.recebido='s'

order by  vencimento desc");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function buscaContasRecebidasCliente($conexao, $nome){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select car.id as id_parcela, c.nome_cliente, car.id_venda, car.recebido, v.id_venda,
fp.forma_pgto, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda, car.parcela, car.valor_parcela, DATE_FORMAT(car.vencimento,'%d/%m/%Y') as vencimento

from contas_a_receber car
join venda v on (car.id_venda = v.id_venda)
join cliente c on (v.id_cliente = c.id_cliente)
join forma_pagamento fp on (fp.id_venda = v.id_venda)

where car.recebido='s'
and c.nome_cliente LIKE '{$nome}'

order by  vencimento desc");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function buscaContasAReceberAnalitico($conexao, $nome, $recebido, $dataInicial, $dataFinal, $debito, $credito, $boleto, $cheque, $especie){
    $array_vendas = array();
     $sql = "select car.id as id_parcela, c.nome_cliente, car.id_venda, car.recebido, DATE_FORMAT(car.data_modificacao,'%d/%m/%Y') as data_modificacao, v.id_venda,
fp.forma_pgto, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda, car.parcela, car.valor_parcela, DATE_FORMAT(car.vencimento,'%d/%m/%Y') as vencimento

from contas_a_receber car
join venda v on (car.id_venda = v.id_venda)
join cliente c on (v.id_cliente = c.id_cliente)
join forma_pagamento fp on (fp.id_venda = v.id_venda)

where c.nome_cliente LIKE '%{$nome}%'
and car.recebido = '{$recebido}'
and car.vencimento BETWEEN '{$dataInicial}' AND '{$dataFinal}'
and(fp.forma_pgto = '{$debito}' or fp.forma_pgto = '{$credito}' or fp.forma_pgto = '{$boleto}' or fp.forma_pgto = '{$cheque}' or fp.forma_pgto = '{$especie}')

order by car.id_venda, vencimento, id";

    $resultado = mysqli_query($conexao, $sql);

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}

function listaHistorico($conexao, $id){
    $array_vendas = array();
    $resultado = mysqli_query($conexao, "select  c.id_cliente, c.nome_cliente, car.id_venda,v.total, iv.qtd_itens as qtd_itens, iv.id_prod_serv, s.nome_servico, fp.forma_pgto, DATE_FORMAT(v.data_venda,'%d/%m/%Y') as data_venda, car.parcela, car.valor_parcela, car.recebido,  DATE_FORMAT(car.vencimento,'%d/%m/%Y') as vencimento

from contas_a_receber car
join venda v on (car.id_venda = v.id_venda)
join cliente c on (v.id_cliente = c.id_cliente)
join forma_pagamento fp on (fp.id_venda = v.id_venda)
join itens_venda iv on (car.id_venda = iv.id_venda)
join servico s on(iv.id_prod_serv = s.id_prod_serv)

where c.id_cliente = '{$id}'

order by car.id_venda desc, vencimento, id;");

    while($venda = mysqli_fetch_assoc($resultado)){
        array_push($array_vendas, $venda);
    }
    return $array_vendas;
}


function confirmaRecebimento($conexao, $id_parcela){
     echo $sql = "UPDATE contas_a_receber
                SET recebido='s'
                WHERE  id='{$id_parcela}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function desfazRecebimento($conexao, $id_parcela){
     echo $sql = "UPDATE contas_a_receber
                SET recebido='n'
                WHERE  id='{$id_parcela}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function confirmaPagamento($conexao, $id_parcela){
     echo $sql = "UPDATE contas_a_pagar
                SET pago='s'
                WHERE  id='{$id_parcela}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function desfazPagamento($conexao, $id_parcela){
     echo $sql = "UPDATE contas_a_pagar
                SET pago='n'
                WHERE  id='{$id_parcela}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}
