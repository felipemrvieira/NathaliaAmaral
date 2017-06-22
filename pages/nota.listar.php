<?php

  include("DAO/conexao.php");
  include("DAO/estoqueDAO.php");
  include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Consultar Notas</h1>
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

                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtragem de produtos
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">

                                        <div class="form-group">

                                            <input class="form-control" placeholder="Insira um dado aqui">
                                        </div>

                                        <button type="submit" class="btn btn-default">Pesquisar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>

                                    </form>
                                      </div>
                                </div>
                                </div>
                                </div> -->
                                <br>

                            <form method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                    </tr>
                 </thead>

                                <?php
                $array_produtos = listaproduto($conexao);
                foreach($array_produtos as $produto) {
                ?>

                <tr>

                    <td><label><?= $produto['id_produto'] ?></label></td>
                    <td><label><?= $produto['nome_produto'] ?></label></td>
                    <td><label><?= $produto['valor_produto'] ?></label></td>
                    <td><label><?= $produto['qtd'] ?></label></td>
                    <td>
                       <button type="submit" formaction="alterarHorario.php?id=<?=$hora['id_horario']?>" class="btn btn-default btn-block">Alterar informações / Realizar baixa</button>

                    </td>

                    <td>
                        <button type="submit" formaction="excluiHorario.php?id=<?=$produto['id_prod_serv']?>" class="btn btn-danger btn-block">Excluir</button>
                    </td>
                </tr>
                <?php
            }?>
            </table>
<button type="submit" class="btn btn-primary btn-block" formaction="form.inventory.php">Cadastrar novo produto</button>
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
