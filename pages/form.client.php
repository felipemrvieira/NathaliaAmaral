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
                            Preencha o formulário abaixo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form enctype="multipart/form-data" role="form" action="cadastraCliente.php" method="post">
                                       <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Nome:</label>
                                                <input class="form-control" placeholder="Insira o nome" name="nome" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>CPF:</label>
                                                <input type="number" class="form-control" placeholder="Insira o cpf" name="cpf" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>RG:</label>
                                                <input type="number" class="form-control" placeholder="Insira o rg" name="rg" required>
                                            </div>
                                        </div>
										
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Sexo:</label>
                                                <label class="radio-inline">
                                                   <input type="radio" name="sexo" id="masc" value="masculino" >Masculino
                                                </label>
                                                <label class="radio-inline">
                                                   <input type="radio" name="sexo" id="fem" value="feminino" checked>Feminino
                                                </label>
                                            </div>
                                        </div>
										
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                           <label> Data de nascimento:</label>
                                                <div class="row">
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker2'>
                                                                <input type='date' class="form-control" name="data_nascimento"/>

                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(function () {
                                                            $('#datetimepicker2').datetimepicker({
                                                                locale: 'ru'
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>E-mail:</label>
                                                <input class="form-control" placeholder="nome@email.com" name="email">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Telefone:</label>
                                                <input class="form-control" placeholder="(82)99988-5566" name="telefone">
                                            </div>
                                        </div>
                                        
                                        <!--<div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Manequim:</label>
                                                <input class="form-control" placeholder="Manequim" name="manequim">
                                            </div>
                                        </div>-->
									   
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Inserir imagem</label>
                                                <input type="file" name="foto">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Observações:</label>
                                                <input type="text" class="form-control" rows="3" name="obs"></input>
                                            </div>
                                        </div>
                                    <div class="col-lg-12">    
                                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
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
