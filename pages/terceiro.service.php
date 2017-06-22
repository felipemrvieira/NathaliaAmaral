<?php

include("DAO/conexao.php");
include("DAO/operacoesDAO.php");
include("DAO/estoqueDAO.php");

include("header.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar Serviço Terceirizado</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Cadastrado com <strong>Successo!</strong>
  </div>
<?php }  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o formulário abaixo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="terceiro.servico.Cadastra.php" method="post" role="form">


                                        <div class="form-group col-lg-12">
                                            <label>Prestador:</label>
                                             <select name="terceiro" class="form-control">
                                        <?php
                                            $array_terceiros = listaTerceiros($conexao);
                                            foreach($array_terceiros as $terceiro) {
                                            ?>
                                                <option value="<?= $terceiro['id_terceiro'] ?>"><?= $terceiro['id_terceiro'] ?> - <?= $terceiro['nome_terceiro'] ?></option>

                                            <?php
                                            }?>
                                        </select>
										</div>

                                        <div class="form-group col-lg-6">
                                           <label>Data de saída</label>
                                            <input name="data_saida" required type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-6">
                                           <label>Data de retorno</label>
                                            <input name="data_retorno" required type="date" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-12">
                                           <label>Descrição do Serviço</label>

                                            <textarea class="form-control" rows="7"  name="descricao"></textarea>
                                        </div>


                                        <div class="col-md-12">
                                          <br>
                                          <h4>Registrar saída em estoque</h4>
                                        </div>
                                        <br>
                                        <div class="form-group col-lg-12">
                                          <label for="sel1">Selecione um item:</label>
                                          <select id="sel1" class="form-control" name="id">
                                            <option value="vazio">Selecione um produto</option>
                                          <?php
                                            $array_produtos = listaProduto($conexao);
                                            foreach($array_produtos as $produto) {

                                            ?>
                                              <option value="<?=$produto['id_produto']?>"><?=$produto['id_produto']?> - <?=$produto['nome_produto']?></option>
                                            <?php } ?>
                                          </select>
                                        </div>



                                          <div class="form-group col-lg-12">
                                            <label> Quantidade de saída: </label>
                                            <input type="number" min="1" name="saida" class="form-control">

                                          </div>


                                        <div class="form-group col-lg-12">
                                            <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                                        </div>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-lg-12">
              <form action="estoque.baixa.php" method="post" role="form">
                <div class="form-group">
                  <label for="sel1">Selecione um item:</label>
                  <select id="sel1" class="form-control" name="id">
                  <?php
                    $array_produtos = listaProduto($conexao);
                    foreach($array_produtos as $produto) {

                    ?>
                      <option value="<?=$produto['id_produto']?>"><?=$produto['id_produto']?> - <?=$produto['nome_produto']?></option>
                    <?php } ?>
                  </select>
                </div>



                  <div class="form-group">
                    <label> Quantidade de saída: </label>
                    <input type="number" min="1" name="saida" class="form-control">

                  </div>
                  <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </form>
            </div>



        </div>

      </div>

    </div>

  </div>
</div>


    <!--/div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
