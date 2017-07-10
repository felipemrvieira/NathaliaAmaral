<?php
date_default_timezone_set("Brazil/East");
include("DAO/conexao.php");
include("DAO/atividadesDAO.php");
include("validaUsuarioLogado.php");

//session_cache_limiter('private_no_expire');
session_start();


//$_SESSION["usuario"] = 'io';
validaUsuarioLogado();

?>

<!--
                                   .~<<-''..   '<
                                .'~<=======+<-  (.      - '
                              .'<============(-<=+~-(+=+s+(
                             .(=============<~zzsszzhszzzz.
                            '+======+-'~===~'=z==ss+s<'ss~.
                           -========<...=<'~=s===+z( =.s<
                          '=========+~'(('+zs==s= -h (D(
                         .+=+==========+'sz=====z- =z+~
                        .(===+(+=======-+z======s=.=s~.
                        .===='.~======<~z========z=~-++.
                       .<====(~<======<~z=====szs(-~==='
                       <s===+==========~(zzszz=(--+==+=~
                       (===============+-~<<((--<====+=(.
                       .=================(~~~(+===('<==+'
                       .============++============('<=+=<
                       .+==========<.'======<+===+===++=<
                       .<==<(======<'~=====-..<========+'
                        ~==''=====+=======+...-========'
                        '==++==============('-+=======+.
                        .(===+============+++=========-
                         .======++======+<<+<<<+<<<<<<..     .      .....
                          -====(..(====+(=sss=+~+s==+=zD(  .sz(    ~z=zzzs<.
                          .~==='...====<=z<<+z=-+=+sz+<+-  <hzz.   ~hs<<<sD+
                           .-==<''(===++s=~((+<+++(+h-    'zs=h<   ~h=   'zz'
                            .~s========<=zs==+<==(.+h~    +D(.zz.  ~h=   -zz'
                             .(+=======+(<=zhs+(-. =h~   'zs. <h<  ~z=++<sh<
                               ..-(+====<~~~~=h~   +h~   +zs===zz. ~z=szhz(
                                   ..'-(z+-. +D<   +h~  'zs+====h< -h= .=h<
                                       -hhs=shz'   sD~  sD<    'hD.'Ds  .sD=.
                                        .(+s=<.    <s- '=+.     (s~'=<   '=s~

                                       .... ....  ..     .'-'.    ...     ...
                                       +zssssszs .zz(  .+shhhs+-  =h=    .sh+
                                       +zssssss= 'zh(  =hs++=zD+  =h=    .sh+
                                       <z=.      'sz( 'zz<   -<   +z=     =z+
                                       +zs       'sz( 'zs+'.      +z+     =z+
                                       +z=<<<<+~ 'sz(  +hzzs+('   +z=(<<<<=z+
                                       +z=hhhhB= 'sz(   ~=shhhz~  +sshhhhh=s+
                                       +z=~---~' 'sz(     .-(=sz. +z=----~=z+
                                       <zs       'sz(  (<    <zz' +z+     =z+
                                       <zs.      'sz( (Dh=(~(=zs. +z=    .=z+
                                       =Dz.      -hD< '<shDhDhs-  sDs    .zD=
                                       ~<(.      .(<-   .~(<<~.   ~<~     (<~

-->



<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StarFish - 1.0</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom button -->
    <link href="../dist/css/botao.css" rel="stylesheet">

    <link href="../dist/css/estilo.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img height="100%" src="img/Marca%20sem%20fundo.png">
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                     <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul> -->
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-tasks">






                        <?php
                            $array_atividades = listaAtividades($conexao);
                            foreach(array_slice($array_atividades, 0, 3) as $atividade) {

                            $myDateTime= DateTime::createFromFormat('Y-m-d', $atividade['data_entrega']);
                            $saida_formatada = $myDateTime->format('d-m-Y');
                        ?>


                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong><?=$atividade['nome_cliente']?></strong>
                                            <span class="pull-right text-muted"><?=$atividade['percentual']?>% do prazo</span>
                                            <div class="">Produto: <?=$atividade['nome_prod_serv']?></div>
                                            <div class="">Data de entrega: <?= $saida_formatada ?></div>
                                            <div class="">Dias restantes: <?=$atividade['restante']?></div>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$atividade['percentual']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$atividade['percentual']?>%">
                                                <span class="sr-only">90% Complete</span>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="divider"></li>

                        <?php } ?>

                        <!--
                            <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        -->



                        <li>
                            <a class="text-center" href="listaEntregas.php">
                                <strong>Ver todas entregas</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>-->
                    <!-- /.dropdown-alerts -->
                <!--</li> -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Nathália Amaral</a>
                        </li>
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="desloga.php"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

             <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Pesquisar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <!--li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!--/li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tabelas</a>
                        </li-->
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Registrar venda</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Cliente<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="form.client.php">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="search.client.php">Consultar</a>
                                </li>
                                 <li>
                                    <a href="aniversariantes.php">Aniversariantes</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

						<li>
                            <a href="#"><i class="fa fa-cogs fa-fw"></i> Serviço<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="form.services.php">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="search.services.php">Consultar</a>
                                </li>


                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Terceiros<span class="fa arrow"></span></a>



                            <ul class="nav nav-second-level">

                                       <li>
                                            <a href="terceiro.form.php"> Cadastrar Prestador</a>
                                        </li>
                                        <li>
                                            <a href="terceiro.search.php"> Consultar Prestador</a>
                                        </li>
                                        <li>
                                            <a href="terceiro.service.php"> Cadastrar Serviço</a>
                                        </li>
                                        <li>
                                            <a href="terceiro.service.search.php">Consultar Serviço</a>
                                        </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-archive fa-fw"></i> Estoque<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="estoque.cadastro.php">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="estoque.lista.php">Consultar</a>
                                </li>
                                <li>
                                    <a href="estoque.relatorio.php">Movimentações</a>
                                </li>


                            </ul>
                        </li>

						            <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Compras<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="compra.nova.php">Registrar compra</a>
                                </li>

								                <li>
                                    <a href="compra.listar.php">Listar compras</a>
                                </li>


                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Financeiro<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="fat.diario.php">Relatório Diário</a>
                                </li>

								                <li>
                                    <a href="fat.analitico.php">Relatório Analítico</a>
                                </li>

								                <!--<li>
                                    <a href="form.contas.php">Contas a pagar</a>
                                </li>-->
                                <li>
                                    <a href="aReceber.php">Contas a receber</a>
                                </li>
                                <li>
                                    <a href="aReceber.analitico.php">Contas a receber - Analítico</a>
                                </li>

                                <li>
                                    <a href="aPagar.php">Contas a pagar</a>
                                </li>

                            </ul>
                        </li>

                        <!-- <li>
                          <a href="#"><i class="fa fa-file-excel-o fa-fw" aria-hidden="true" "></i> Notas Fiscais<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li>
                                <a href="nota.cadastrar.php">Cadastrar Nota</a>
                            </li>
                            <li>
                                <a href="nota.listar.php">Listar Notas</a>
                            </li>
                          </ul>
                      </li> -->

                        <!--li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!--/li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                <!--/li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!--/li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!--/li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
