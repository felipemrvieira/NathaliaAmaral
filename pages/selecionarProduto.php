<?php
   
    include("DAO/conexao.php");
    include("DAO/estoqueDAO.php");
    include("DAO/operacoesDAO.php");

include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img width="40%" src="img/Marca%20sem%20fundo.png"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php include('venda/listaProduto.php'); ?>
            
            
            
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
