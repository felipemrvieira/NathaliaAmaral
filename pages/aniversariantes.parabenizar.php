<?php
include("header.php");


?>

        <div id="page-wrapper">
            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header">Parabenizar Cliente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Cliente cadastrado com <strong>Successo!</strong>
  </div>
<?php }  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o formulário abaixo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">


                                    <form role="form" action="aniversariantes.parabenizaCliente.php?id=<?=$_GET['id']?>" method="post">

                                        <div class="form-group">
                                            <label>Mensagem:</label>
                                            <textarea class="form-control" rows="8" name="msg">
                                            Parabéns pelo seu dia!
                                            Desejamos que você tenha um ano repleto de felicidades e lindas histórias!!!
                                            Esses são os votos do Ateliê Nathália Amaral!
                                            Como um presente a você, te oferecemos 10% de desconto em nosso ateliê para
                                            fechamento de contrato no mês do seu aniversário.
                                            Te aguardamos!
                                          </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success ">Enviar Mensagem!</button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
</div>





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
