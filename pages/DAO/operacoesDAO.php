<?php

function cadastrarCliente($conexao, $cliente){

   echo $query = "insert into cliente (nome_cliente, cpf, rg, sexo, obs, email_cliente, manequim, telefone_cliente, data_nascimento, endereco_foto) values
   ('{$cliente["nome_cliente"]}',
    '{$cliente["cpf"]}',
    '{$cliente["rg"]}',
    '{$cliente["sexo"]}',
    '{$cliente["obs"]}',
    '{$cliente["email_cliente"]}',
    '{$cliente["manequim"]}',
    '{$cliente["telefone_cliente"]}',
    '{$cliente["data_nascimento"]}',
    '{$cliente["endereco_foto"]}')";

    $resultado = mysqli_query($conexao, $query);
    return mysqli_insert_id($conexao);
    }

function alterarFotoCliente($conexao, $cliente){

   $query = "update cliente set endereco_foto ='{$cliente["endereco_foto"]}' where id_cliente = '{$cliente["id_cliente"]}'";

    $resultado = mysqli_query($conexao, $query);
    return mysqli_insert_id($conexao);
    }

function cadastrarManequim($conexao, $manequim){

   echo $query = "insert into manequim_cliente ( id_cliente, busto, cintura, quadril, top, saia, cavaFrente, cavaCostas, ombro, entreBusto, comprimentoManga, larguraManga, punho, decoteFrente, decoteCostas, obs )
   values (

   '{$manequim['id_cliente']}',
   '{$manequim['busto']}',
   '{$manequim['cintura']}',
   '{$manequim['quadril']}',
   '{$manequim['top']}',
   '{$manequim['saia']}',
   '{$manequim['cavaFrente']}',
   '{$manequim['cavaCostas']}',
   '{$manequim['ombro']}',
   '{$manequim['entreBusto']}',
   '{$manequim['comprimentoManga']}',
   '{$manequim['larguraManga']}',
   '{$manequim['punho']}',
   '{$manequim['decoteFrente']}',
   '{$manequim['decoteCostas']}',
   '{$manequim['obs']}'

   )";
    $resultado = mysqli_query($conexao, $query);

    return mysqli_insert_id($conexao);
}

function cadastrarEnderecoCliente($conexao, $endereco){

   echo $query = "insert into endereco_cliente ( id_cliente, cidade, rua, numero, bairro, complemento)
   values (
   '{$endereco['id_cliente']}',
   '{$endereco['cidade']}',
   '{$endereco['rua']}',
   '{$endereco['numero']}',
   '{$endereco['bairro']}',
   '{$endereco['complemento']}'

   )";
    $resultado = mysqli_query($conexao, $query);

    return mysqli_insert_id($conexao);
}

function detalhaEnderecoCliente($conexao, $id){
    $endereco_cliente = array();
    $resultado = mysqli_query($conexao, "select * from endereco_cliente where id_cliente = '{$id}' ORDER BY id_endereco desc
limit 1");

    while($endereco = mysqli_fetch_assoc($resultado)){
        array_push($endereco_cliente, $endereco);
    }
    return $endereco_cliente;
}


function detalhamanequimCliente($conexao, $id){
    $manequim_cliente = array();
    $resultado = mysqli_query($conexao, "select * from manequim_cliente where id_cliente = '{$id}' ORDER BY id desc
limit 1");

    while($manequim = mysqli_fetch_assoc($resultado)){
        array_push($manequim_cliente, $manequim);
    }
    return $manequim_cliente;
}



function cadastrarTerceiro($conexao, $terceiro){

    echo $query = "insert into terceiros (nome_terceiro, cnpj_terceiro, cpf_terceiro,  email_terceiro, telefone_terceiro,cidade_terceiro, rua_terceiro, bairro_terceiro, numero_terceiro, dados_bancarios)
                values (
                '{$terceiro['nome']}',
                '{$terceiro['cnpj']}',
                '{$terceiro['cpf']}',
                '{$terceiro['email']}',
                '{$terceiro['telefone']}',
                '{$terceiro['cidade']}',
                '{$terceiro['rua']}',
                '{$terceiro['bairro']}' ,
                '{$terceiro['numero']}' ,
                '{$terceiro['dadosBancarios']}'

                )";
    $resultado = mysqli_query($conexao, $query);

    //return mysqli_insert_id($conexao);
}

function excluirTerceiro($conexao, $id){
    echo $sql = "delete from terceiros where id_terceiro = '{$id}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function excluiServicoTerceiros($conexao, $id){
    $sql = "delete from terceiros_servicos where id_servico_terceiro = '{$id}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function entregaServicoTerceiros($conexao, $id){
    echo $sql = "UPDATE terceiros_servicos
                SET entregue='sim'
                WHERE  id_servico_terceiro='{$id}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}



function cadastrarServicosTerceiros($conexao, $servico){

    $query = "insert into terceiros_servicos (id_terceiro, data_saida, data_retorno, descricao_servico_terceiro)
                values ('{$servico['terceiro']}', '{$servico['data_saida']}','{$servico['data_retorno']}',
                        '{$servico['descricao']}')";
    $resultado = mysqli_query($conexao, $query);

    return mysqli_insert_id($conexao);
}


function procuraTerceiro($conexao, $servico){
    $array_terceiros = buscaTerceiro($conexao, $servico['id_terceiro']);

    foreach($array_terceiros as $terceiro) {
        if($servico['id_terceiro'] == $terceiro['id_terceiro']){
            return $terceiro['nome_terceiro'];
        }else{
            return "vazio";
        }

    }
}


function listaCliente($conexao, $nome){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "select *
                                            from cliente
                                            where nome_cliente LIKE '%{$nome}%'
                                            order by id_cliente desc");

    while($cliente = mysqli_fetch_assoc($resultado)){
        array_push($array_clientes, $cliente);
    }
    return $array_clientes;
}

function listaTerceiros($conexao){
    $array_terceiros = array();
    $resultado = mysqli_query($conexao, "select *
                                            from terceiros
                                        ");

    while($terceiro = mysqli_fetch_assoc($resultado)){
        array_push($array_terceiros, $terceiro);
    }
    return $array_terceiros;
}

function listaServicosTerceiros($conexao){
    $array_servicos_terceiros = array();
    $resultado = mysqli_query($conexao, "select *
                                            from terceiros_servicos
                                        ");

    while($servico = mysqli_fetch_assoc($resultado)){
        array_push($array_servicos_terceiros, $servico);
    }
    return $array_servicos_terceiros;
}

function buscaServicosTerceiros($conexao, $id){
    $array_servicos_terceiros = array();
    $resultado = mysqli_query($conexao, "select *
                                            from terceiros_servicos where id_servico_terceiro= '{$id}'
                                        ");

    while($servico = mysqli_fetch_assoc($resultado)){
        array_push($array_servicos_terceiros, $servico);
    }
    return $array_servicos_terceiros;
}

function detalhaCliente($conexao, $id){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "select * from cliente where id_cliente = '{$id}'");

    while($cliente = mysqli_fetch_assoc($resultado)){
        array_push($array_clientes, $cliente);
    }
    return $array_clientes;
}

function parabenizaCliente($conexao, $id){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "
    update cliente
    set parabenizado = 's'
    where id_cliente = '{$id}'");

    return $resultado;
}

function enviaDesconto($conexao, $id){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "
    update cliente
    set oferta_mes_aniversario = 's'
    where id_cliente = '{$id}'");

    return $resultado;
}

function buscaTerceiro($conexao, $id){
    $array_terceiros = array();
    $resultado = mysqli_query($conexao, "select * from terceiros where id_terceiro = '{$id}'");

    while($terceiro = mysqli_fetch_assoc($resultado)){
        array_push($array_terceiros, $terceiro);
    }
    return $array_terceiros;
}


function excluirCliente($conexao, $id){
    echo $sql = "delete from cliente where id_cliente = '{$id}'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function editaCliente($conexao, $clienteAlterado){

    echo $query = "update cliente set

    nome_cliente = '{$clienteAlterado["nome_cliente"]}',
    sexo = '{$clienteAlterado["sexo"]}',
    rg = '{$clienteAlterado["rg"]}',
    cpf = '{$clienteAlterado["cpf"]}',
    obs = '{$clienteAlterado["obs"]}' ,
    email_cliente = '{$clienteAlterado["email_cliente"]}',
    manequim = '{$clienteAlterado["manequim"]}',
    telefone_cliente = '{$clienteAlterado["telefone_cliente"]}',
    data_nascimento = '{$clienteAlterado["data_nascimento"]}',
    manequim = '{$clienteAlterado["manequim"]}'

    where id_cliente = '{$clienteAlterado["id"]}'";


    return $resultado = mysqli_query($conexao, $query);
    }

function listaAniversariantes($conexao){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "
    select * from cliente
    where month(data_nascimento) = month(sysdate())
    ");

    while($cliente = mysqli_fetch_assoc($resultado)){
        array_push($array_clientes, $cliente);
    }
    return $array_clientes;
}

function listaAniversariantesDia($conexao){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "
    select * from cliente
      where month(data_nascimento) = month(sysdate())
      and day(data_nascimento) = day(sysdate())

      ");

    while($cliente = mysqli_fetch_assoc($resultado)){
        array_push($array_clientes, $cliente);
    }
    return $array_clientes;
}

function listaAniversariantesDiaNaoParabenizados($conexao){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "
    select * from cliente
      where month(data_nascimento) = month(sysdate())
      and day(data_nascimento) = day(sysdate())
      and parabenizado <> 's'
      ");

    while($cliente = mysqli_fetch_assoc($resultado)){
        array_push($array_clientes, $cliente);
    }
    return $array_clientes;
}

function atualizaAniversariantes($conexao){
    $array_clientes = array();
    $resultado = mysqli_query($conexao, "
    update cliente
    set parabenizado = 'n', oferta_mes_aniversario = 'n'
    where month(sysdate()) > month(data_nascimento)
      ");

    return $resultado;
}

function cadastrarCompra($conexao, $compra){

    $query = "insert into compra (historico, codigo_nf, data_compra, total, qtd_parcelas)
                values ('{$compra['historico']}', '{$compra['codigo']}', '{$compra['data_compra']}','{$compra['total']}', '{$compra['parcelamento']}')";
    $resultado = mysqli_query($conexao, $query);

    return mysqli_insert_id($conexao);
}
