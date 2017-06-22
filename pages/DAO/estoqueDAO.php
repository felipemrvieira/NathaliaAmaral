<?php

function cadastrarProduto($conexao, $produto){

    //cadastra id da tabela externa para usar na sua tabela
    $id = cadastraId($conexao, "produto");

   $query = "insert into produto (id_prod_serv, nome_produto, qtd_produto, qtd_minima) values ('{$id}', '{$produto['nome_produto']}', '{$produto['qtd_produto']}', '{$produto['minimo_produto']}' )";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
    }

//cadastra id da tabela de indices de produtos e serviços
function cadastraId($conexao, $tabela){
  $queryId = "insert into id_produto_servico (tabela) values ('{$tabela}')";
  mysqli_query($conexao, $queryId);
  return mysqli_insert_id($conexao);
}

function cadastrarMovimentacao($conexao, $produto, $movimentacao){
  $query = "insert into movimentacao_estoque (nome_produto, codigo_nota, qtd_produto, valor_produto) values ('{$produto['nome_produto']}', '{$movimentacao['codigo_nf']}', '{$produto['qtd_produto']}','{$movimentacao['valor_produto']}' )";
  $resultado = mysqli_query($conexao, $query);
  return $resultado;
}

function cadastrarMovimentacaoBaixa($conexao, $produto, $movimentacao){
  echo $query = "insert into movimentacao_estoque (nome_produto, qtd_produto, tipo_movimentacao, destino_saida)
  values ('{$produto['nome_produto']}', '{$produto['qtd_produto']}', 'saida','{$movimentacao['destino_produto']}' )";
  $resultado = mysqli_query($conexao, $query);
  return $resultado;
}

function listaProduto($conexao){
    $array_produtos = array();
    $resultado = mysqli_query($conexao, "SELECT i.id as id_produto, p.nome_produto, p.qtd_produto, p.qtd_minima, DATE_FORMAT(p.data_movimentacao,'%d/%m/%Y %H:%i') as data_movimentacao
                                        FROM produto p
                                        INNER JOIN id_produto_servico i
                                        ON i.id = p.id_prod_serv");

    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($array_produtos, $produto);
    }
    return $array_produtos;
}

function listaMovimentacoes($conexao){
    $array_movimentacoes = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM movimentacao_estoque");

    while($movimentacao = mysqli_fetch_assoc($resultado)){
        array_push($array_movimentacoes, $movimentacao);
    }
    return $array_movimentacoes;
}

function detalhaProduto($conexao, $id){
    $array_produtos = array();
    $resultado = mysqli_query($conexao, "SELECT i.id as id_produto, p.nome_produto, p.qtd_produto, p.qtd_minima, p.data_movimentacao
                                        FROM produto p
                                        INNER JOIN id_produto_servico i
                                        ON i.id = p.id_prod_serv
                                        WHERE i.id ='{$id}'");

    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($array_produtos, $produto);
    }
    return $array_produtos;
}

function alteraProduto($conexao, $baixa){
    $array_produtos = array();
    $sql = "UPDATE produto
            SET nome_produto = '{$baixa['nome_produto']}' , qtd = (qtd - '{$baixa['saida']}')
            WHERE id_prod_serv ='{$baixa['id']}' ";
    $resultado = mysqli_query($conexao, $sql);

    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($array_produtos, $produto);
    }
    return $array_produtos;
}

function alteraProdutoSelect($conexao, $produto){
    $sql = "UPDATE produto
            SET qtd_produto = (qtd_produto - '{$produto['qtd_produto']}')
            WHERE id_prod_serv ='{$produto['id']}' ";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function adicionaProduto($conexao, $produto){
    $array_produtos = array();
    echo $sql = "UPDATE produto
            SET nome_produto = '{$produto['nome_produto']}' , qtd_produto = (qtd_produto + '{$produto['qtd_produto']}')
            WHERE id_prod_serv ='{$produto['id']}' ";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}


/*function excluirCliente($conexao, $id){
    $resultado = mysqli_query($conexao, "delete from cliente where id_cliente = '{$id}'");
    return $resultado;
}*/

/*
function editaCliente($conexao, $nome_cliente, $sexo, $obs, $email_cliente, $telefone_cliente, $data_nascimento, $id){

    $query = "update cliente set nome_cliente = '{$nome_cliente}', sexo = '{$sexo}', obs = '{$obs}', email_cliente = '{$email_cliente}', telefone_cliente = '{$telefone_cliente}', data_nascimento = '{$data_nascimento}' where id_cliente = '{$id}'";
    return $resultado = mysqli_query($conexao, $query);
    }
*/

function cadastrarServico($conexao, $nome_servico, $valor_servico){
    $id = cadastraId($conexao, "servico");

   $query = "insert into servico (id_prod_serv, nome_servico, valor_servico) values ('{$id}', '{$nome_servico}', '{$valor_servico}')";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
    }

function listaServico($conexao){
    $array_servicos = array();
    $resultado = mysqli_query($conexao, "SELECT i.id as id_servico, s.nome_servico, s.valor_servico, s.disp_servico
                                        FROM servico s
                                        INNER JOIN id_produto_servico i
                                        ON i.id = s.id_prod_serv
                                        order by i.id desc");

    while($servico = mysqli_fetch_assoc($resultado)){
        array_push($array_servicos, $servico);
    }
    return $array_servicos;
}

function detalhaServico($conexao, $id){
    $array_servicos = array();
    $resultado = mysqli_query($conexao, "select * from servico where id_prod_serv = '{$id}'");

    while($servico = mysqli_fetch_assoc($resultado)){
        array_push($array_servicos, $servico);
    }
    return $array_servicos;
}

function editaServico($conexao, $nome_servico, $valor_servico, $id){

    $query = "update servico set nome_servico = '{$nome_servico}', valor_servico = '{$valor_servico}' where id_prod_serv = '{$id}'";
    return $resultado = mysqli_query($conexao, $query);
    }

function encerraServico($conexao, $disp, $id){

    $query = "update servico set disp_servico = '{$disp}' where id_servico = '{$id}'";
    return $resultado = mysqli_query($conexao, $query);
    }

function excluiServico($conexao, $id){
    $resultado = mysqli_query($conexao, "delete from servico where id_prod_serv = '{$id}'");
    return $resultado;
}
