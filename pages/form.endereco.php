<?php
include("header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                                
                <div class="col-lg-12">
                                        
                    <h1 class="page-header">Cadastrar Cliente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                        <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok' && array_key_exists("idCliente", $_GET) && $_GET['idCliente']<>''){?>
                            <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Cliente cadastrado com sucesso! <strong>Id: <?php echo $_GET['idCliente'] ?></strong>
                          </div>
                        <?php }  ?>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o endereço do cliente
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form enctype="multipart/form-data" role="form" action="cadastraEnderecoCliente.php" method="post">
                                       <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Id cliente:</label>
                                                <input class="form-control" value="<?php echo $_GET['idCliente'] ?>" disabled>
                                                
                                                <input type="hidden" name="id_cliente" value="<?php echo $_GET['idCliente'] ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Rua:</label>
                                                <input class="form-control" placeholder="Insira o nome da rua" name="rua" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Número:</label>
                                                <input type="number" class="form-control" placeholder="Insira o número" name="numero" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Bairro:</label>
                                                <input  class="form-control" placeholder="Insira o bairro" name="bairro" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Complemento:</label>
                                                <input  class="form-control" placeholder="Complemento" name="complemento" required>
                                            </div>
                                        </div>
										
                                    
										
                                       
                                            
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Cidade:</label>
                                                <input class="form-control" placeholder="Insira a cidade" name="cidade">
                                            </div>
                                        </div>
                                       
                                        
                                        
                                    <div class="col-lg-12">    
                                        <button type="submit" class="btn btn-success btn-sm">Salvar endereço</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div></div>
            </div>
            
                                        
                                        
										
										
                                        <!--div class="form-group">
                                            <label>Checkboxes</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 1
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 2
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Inline Checkboxes</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">1
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">2
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">3
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Radio Buttons</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >Radio 1
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked>Radio 2
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Inline Radio Buttons</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Selects</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Multiple Selects</label>
                                            <select multiple class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div-->
                                <!-- /.col-lg-6 (nested) -->
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
