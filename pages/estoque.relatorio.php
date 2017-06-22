<?php

  include("DAO/conexao.php");
  include("DAO/estoqueDAO.php");
  include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Movimentações no Estoque</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                  <?php if(array_key_exists("status", $_GET) && $_GET['status']=='alterado'){?>
                    <div class="alert alert-success fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Estoque alterado com <strong>Successo!</strong>
                    </div>
                  <?php }  ?>
                  <br>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Produto</th>
                        <th>Nota</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Tipo de Mov</th>
                        <th>Destino</th>


                    </tr>
                 </thead>

                                <?php
                $array_movimentacoes = listaMovimentacoes($conexao);
                foreach($array_movimentacoes as $movimentacao) {
                ?>

                <tr>

                    <td><?= $movimentacao['id'] ?></td>
                    <td><?= $movimentacao['nome_produto'] ?></td>
                    <td><?= $movimentacao['codigo_nota'] ?></td>
                    <td><?= $movimentacao['qtd_produto'] ?></td>
                    <td>R$ <?= $movimentacao['valor_produto'] ?></td>
                    <td><?= $movimentacao['tipo_movimentacao'] ?></td>
                    <td><?= $movimentacao['destino_saida'] ?></td>




                </tr>
                <?php
            }?>
            </table>



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
        <h4 class="modal-title">Baixa em estoque</h4>
      </div>
      <div class="modal-body">
        <form class="" action="estoque.baixa.php?id=<?= $produto['id_produto']?>" method="post">
          <div class="form-group">
            <label> Quantidade de saída: </label>
            <input type="number" name="qtd_produto" class="form-control" placeholder="">
          </div>
          <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
        </div>
        </form>


    </div>

  </div>
</div>
        <!-- /#page-wrapper -->

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
