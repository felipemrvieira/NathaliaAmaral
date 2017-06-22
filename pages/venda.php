<?php
include("header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nathália Amaral</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar vendas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                       
                                        <div class="form-group">
                                            <label>Código do Produto:</label>
                                            <input class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Produto:</label>
                                            <input class="form-control" placeholder="Insira um produto ou serviço">
                                        </div>
                                        <div class="form-group">
                                            <label>Quantidade:</label>
                                            <input class="form-control" type="number" name="quantity" min="1" placeholder="1">
                                        </div>
                                        <div class="form-group">
                                            <label>Valor pago:</label>
                                            <input class="form-control" type="number" id="valor" pattern="\d+(\.\d{2})?" />
                                        </div>
										    
                                        
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form role="form">
                                       
                                        <div class="form-group">
                                            <label>Compras:</label>
                                            <input class="form-control form-controle" placeholder="">
                                        </div>
                                       
                                        
										    
                                        
                                    </form>
                                </div>
                                <!--div class="col-lg-6">
                                <!--div class="col-lg-6">
                                   
                                    
                                    <!--h1>Input Groups</h1>
                                    <form role="form">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-eur"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Font Awesome Icon">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div-->
                                <!-- /.col-lg-6 (nested) -->
                            <!--/div>
                            <!-- /.row (nested) -->
                        <!--/div>
                        <!-- /.panel-body -->
                    <!--/div>
                    <!-- /.panel -->
                <!--/div>
                <!-- /.col-lg-12 -->
            <!--/div>
            <!-- /.row -->
        <!--/div>
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
