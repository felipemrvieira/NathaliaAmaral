<?php
date_default_timezone_set("Brazil/East");

    include("DAO/conexao.php");
    include("DAO/estoqueDAO.php");
    include("DAO/operacoesDAO.php");

include('header.php');

validaUsuarioLogado();

?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img width="40%" src="img/Marca%20sem%20fundo.png"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if(array_key_exists("vendaStatus", $_GET) && $_GET['vendaStatus']=='ok' && array_key_exists("id", $_GET) && $_GET['id']<>''){?>
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Venda <?php echo $_GET['id'] ?> cadastrada com <strong>Successo!</strong>
                </div>
            <?php }if(array_key_exists("id", $_GET)&& $_GET['id']==''){  ?>
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Venda <strong>não registrada!</strong>
                </div>
            <?php }if(array_key_exists("vendaStatus", $_GET)&& $_GET['vendaStatus']=='cancelada'){  ?>
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Venda <strong>cancelada!</strong>
                </div>
            <?php }if(array_key_exists("venda", $_GET)&& $_GET['venda']=='ok'){  ?>
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Venda realizada com <strong>Sucesso!</strong>
                </div>
                <?php } $array_clientes = listaAniversariantesDiaNaoParabenizados($conexao);
                        if ( sizeof($array_clientes) > 0) {?>

                          <div class="alert alert-success fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  Você tem <a href="aniversariantes.php">clientes</a> que completam ano hoje!
                          </div>


                  <?php } atualizaAniversariantes($conexao);?>

                    <?php

                 include('venda/listaCliente.php'); ?>
             <!-- <div class="col-md-12">
               <div class="col-md-6">
                 uma
               </div>
               <div class="col-md-6">
                 duas
               </div>
             </div> -->


        </div>

<!--    <script>
        function preenche(parametro){
            document.formvenda.valor.value = parametro;
        }
    </script>-->



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
