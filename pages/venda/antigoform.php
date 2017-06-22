<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar vendas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="formvenda" action="adicionaItem.php" method="post">
                                        
                                        <div class="form-group">
                                            <label for="cliente">Selecione o cliente</label>
                                            <select class="form-control" id="cliente" name="cliente">
                                                <?php
                                                    $array_clientes = listacliente($conexao);
                                                    foreach($array_clientes as $cliente) { ?>
                                                        <option><?=$cliente['nome_cliente']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="produtos">Selecione um produto</label>
                                            <select class="form-control" id="produtos" name="produto">
                                                <?php
                                                $array_produtos = listaproduto($conexao);
                                                foreach($array_produtos as $produto) {
                                                ?>
                                                    <option value="<?= $produto['id_produto'] ?>"><?= $produto['id_produto'] ?> - <?= $produto['nome_produto'] ?> - R$ <?= $produto['valor_produto'] ?></option >
                                               
                                              
                                            
                                                <?php
                                                }
                                                ?>
                                                
                                                
                                                <?php
                                                $array_servicos = listaservico($conexao);
                                                foreach($array_servicos as $servico) {
                                                ?>
                                                    <option value="<?= $servico['id_servico'] ?>"><?= $servico['id_servico'] ?> - <?= $servico['nome_servico'] ?> - R$ <?= $servico['valor_servico'] ?></option >
                                               
                                              
                                            
                                                <?php
                                                }
                                                ?>
                                                
                                                
                                                
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Quantidade:</label>
                                            <input class="form-control" type="number" name="qtd" min="1" placeholder="1">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Desconto no item</label>
                                            <input class="form-control" type="number" id="valorpago" name="desconto" min="0" placeholder="0" pattern="\d+(\.\d{2})?" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Adicionar</button>
                                        </div>
										    
                                        
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form role="form">
                                       
                                        <div class="form-group">
                                            <label>Compras:</label>
<!--                                            <input class="form-control form-controle" placeholder="">-->
                                                <?php
                                                  if(isset($_SESSION["itens"])){
                                                    
                                                    echo $_SESSION["itens"]['nome']; 
                                                      
                                                  }else{
                                                      echo ' Nenhum produto na lista'; 
                                                      
                                                  }
                                                    
                                                ?>
                                        </div>
                                       
                                        
										    
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>