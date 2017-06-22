<?php
include('funcoesProdutos.php');
//parametro para exibição do botao editar
unset ($_SESSION['editaCesta']);
?>


<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar vendas
                        </div>
                        <div class="panel-body">
                            <div class="row">


                                <div class="col-lg-6">



                                    <form role="form" name="formvenda" action="venda/selecionaProduto.php" method="post">
                                        <div class="form-group col-md-9" >
                                            <label for="produtos">Selecione um Serviço</label>
                                            <select class="form-control " id="produtos" name="produto">
                                                <?php
                                                //$array_produtos = listaproduto($conexao);
                                                //foreach($array_produtos as $produto) {
                                                ?>
                                                    <!-- <option value="<?=$produto['nome_produto']?>|<?=$produto['valor_produto']?>/<?=$produto['id_produto']?>">
                                                        <?=$produto['id_produto']?> - <?=$produto['nome_produto'] ?> - R$ <?= $produto['valor_produto']?></option >
                                                -->


                                                <?php
                                                //}
                                                ?>


                                                <?php
                                                $array_servicos = listaservico($conexao);
                                                foreach($array_servicos as $servico) {
                                                ?>
                                                    <option value="<?=$servico['nome_servico']?>|<?=$servico['valor_servico']?>/<?=$servico['id_servico']?>">
                                                        <?= $servico['id_servico'] ?> - <?=$servico['nome_servico'] ?> - R$ <?= $servico['valor_servico'] ?></option >




                                                <?php
                                                }
                                                ?>



                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                          <label> Quantidade: </label>
                                          <input type="number"  min="1" step="1" name="qtd" class="form-control" required value="1">
                                        </div>



                                        <div class=" form-group col-md-12">
                                          <a class="" data-toggle="modal" data-target="#servicoModal">Cadastrar novo serviço</a>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-default btn-block">Adicionar</button>
                                        </div>
										</form>

                                 </div>

                                <div class="col-lg-6">

                                <?php
                                    //funçao no funcoes produtos
                                    apresentaNota();

                                    ?>
                                </div>

                                 <div class="form-group col-lg-12">
                                     <hr/>
                                     <br/>

                    <div class="form-group col-lg-12">
                        <form>
                       <button type="submit" formaction="formaPagamento.php" class="btn btn-success btn-block">Finalizar venda</button>
                                     </div>

                                     <div class="form-group col-lg-6">
                        <button type="submit" formaction="venda/venda.cancela.php" class="btn btn-danger btn-block">Cancelar</button>
                                     </div>

                                     <div class="form-group col-lg-6">
                        <button type="submit" formaction="editarVenda.php" class="btn btn-warning btn-block">Editar</button>
                        </div>
                        </form>






                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>



<!-- Modal -->
<div id="servicoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Novo Serviço</h4>
      </div>
      <div class="modal-body">
        <div class="">
          <form action="cadastraServico.php" method="post" role="form">
            <div class="form-group">
              <label>Serviço:</label>
              <input type="text" name="nome_servico" class="form-control" placeholder="Insira o nome do Serviço">
            </div>

            <div class="form-group">
              <label> Valor: </label>
              <input type="number" min="0.01" step="0.01" name="valor_servico" class="form-control" placeholder="Insira o valor do produto">
            </div>

            <button type="submit" class="btn btn-info btn-sm">Cadastrar</button>
          </form>
        </div>
      </div>

    </div>

  </div>
</div>
