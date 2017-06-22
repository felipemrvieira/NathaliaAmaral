<?php
include("header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                                
                <div class="col-lg-12">
                                        
                    <h1 class="page-header">Cadastrar Manequim</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                        <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok' && array_key_exists("id", $_GET) && $_GET['id']<>''){?>
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
                                    <form enctype="multipart/form-data" role="form" action="cadastraManequim.php" method="post">
                                       <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Id cliente:</label>
                                                <input class="form-control" value="<?php echo $_GET['id'] ?>" disabled>
                                                
                                                <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Busto:</label>
                                                <input class="form-control" name="busto" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Cintura:</label>
                                                <input class="form-control" name="cintura" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Quadril:</label>
                                                <input class="form-control" name="quadril" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Comprimento Top:</label>
                                                <input class="form-control" name="top" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Comprimento Saia:</label>
                                                <input class="form-control" name="saia" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Cava Frente:</label>
                                                <input class="form-control" name="cavaFrente" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Cava Costas:</label>
                                                <input class="form-control" name="cavaCostas" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Ombro:</label>
                                                <input class="form-control" name="ombro" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Entre busto:</label>
                                                <input class="form-control" name="entreBusto" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Comprimento Manga:</label>
                                                <input class="form-control" name="comprimentoManga" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Largura Manga:</label>
                                                <input class="form-control" name="larguraManga" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>punho:</label>
                                                <input class="form-control" name="punho" required>
                                            </div>
                                        </div>
                                           
                                           <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Decote Frente:</label>
                                                <input class="form-control" name="decoteFrente" required>
                                            </div>
                                        </div>
                                           
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>Decote Costas:</label>
                                                <input class="form-control" name="decoteCostas" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Obs:</label>
                                                <textarea class="form-control" name="obs"></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                    <div class="col-lg-12">    
                                        <button type="submit" class="btn btn-info">Salvar Manequim</button>
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
