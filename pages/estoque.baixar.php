<?php

  include("DAO/conexao.php");
  include("DAO/estoqueDAO.php");
  include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Realizar Baixa em Estoque</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                                  <?php if(array_key_exists("status", $_GET) && $_GET['status']=='excluido'){?>
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Produto excluído com <strong>Successo!</strong>
  </div>
<?php }  ?>



<div class="panel panel-default">
    <div class="panel-heading">
      Alterar estoque
    </div>
    <div class="panel-body">
        <div class="row">
          <?php
            $array_produtos = detalhaProduto($conexao, $_GET['id']);
            foreach($array_produtos as $produto) {

            ?>

            <div class="col-lg-6">
                <form action="estoque.baixa.php" method="post" role="form">
                  <div class="form-group">
                      <label>Produto:</label>
                      <input type="text" name="nome_produto" class="form-control" value="<?=$produto['nome_produto']?> ">
                  </div>

                  <div class="form-group">
                    <label> Quantidade de saída: </label>
                    <input required type="number" min="1" name="saida" class="form-control" value="<?=$produto['qtd']?> ">
                    <input type="hidden" min="1" name="id" class="form-control" value="<?=$_GET['id']?> ">
                  </div>

                  <div class="form-group">
                      <label>Destino:</label>
                      <input required type="text" name="destino_produto" class="form-control">
                  </div>

                  <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </form>
            </div>

            <?php } ?>

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
