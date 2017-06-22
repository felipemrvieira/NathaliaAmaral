                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registrar vendas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" name="formvenda" action="venda/selecionaCliente.php" method="post">

                                        <div class="form-group">
                                            <label for="cliente">Selecione o cliente</label>
                                            <select class="form-control" id="cliente" name="cliente">
                                                <?php
                                                    $array_clientes = listacliente($conexao);
                                                    foreach($array_clientes as $cliente) { ?>
                                                        <option><?=$cliente['id_cliente']?> - <?=$cliente['nome_cliente']?></option>

                                                    <?php
                                                    }
                                                    ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Selecionar</button>
                                        </div>


                                    </form>
                                </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
