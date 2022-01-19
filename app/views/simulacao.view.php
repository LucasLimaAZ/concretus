<?php include 'app/views/partials/head.php'; ?>
<?php include 'app/views/partials/sidebar.php'; ?>
<div id="right-panel" class="right-panel">
    <div class="clearfix">
        <?php include 'app/views/partials/header.php'; ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">

            <div class="row simulacao-usuario">
                <div class="col-md-12">
                    <p>Você está simulando o usuário <?=$usuario[0]->nome;?></p>
                </div>
            </div>
            
                <div class="row" id="entrada">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title">
                                            <i class="fa fa-file"></i> Lista de Arquivos <br />
                                            <small style="font-size:15px;">Caixa de Entrada / 
                                                <a id="mostrar-arquivados" href="#">Arquivados</a>
                                            </small>
                                        </h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <table id="tabelaArquivos" class="display compact">
                                            <thead>
                                                <tr>
                                                    <th>#Id</th>
                                                    <th>Nome</th>
                                                    <th>Status</th>
                                                    <th>Marcador</th>
                                                    <th>Exibir</th>
                                                    <th>Arquivar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <?php foreach($arquivos as $arquivo): ?>
                                                    <?php if($arquivo->status == 'entrada' && $arquivo->sirius == $usuario[0]->sirius): ?>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <tr style="font-size:13px;" id="arquivo-<?=$arquivo->id; ?>">
                                                                    <td><b><?=$arquivo->id;?></b></td>
                                                                    <td><b><?=$arquivo->nome;?></b></td>
                                                                    <td id="leitura-<?=$arquivo->id;?>"><b><?=$arquivo->lido ? 'Lido' : '<b>Não</b> lido'; ?></b></td>
                                                                    <td>
                                                                        <div id="marker-<?=$arquivo->id;?>" style="display:none;" class="marker-dropdown">
                                                                            <ul style="margin:0px !important;">
                                                                                    <li><b>Marcadores</b></li>
                                                                                    <hr style="margin:0px !important;">
                                                                                <?php foreach($marcadores as $marcador): ?>
                                                                                    <a onclick="trocarMarcador(this);" id="<?=$arquivo->id;?>/<?=$marcador->nome;?>" href="#"><li><?=$marcador->nome;?></li></a>
                                                                                    <hr style="margin:0px !important;">
                                                                                <?php endforeach; ?>
                                                                                    <a class="marker-close" href="#"><li><b>CANCELAR</b></li></a>
                                                                            </ul>
                                                                        </div>
                                                                        <?php if(isset($arquivo->marcador)): ?>
                                                                            <span class="marker-value-<?=$arquivo->id;?>"><i class="fa fa-tag"></i> <?=$arquivo->marcador;?></span>
                                                                        <?php else: ?>
                                                                            <span>Nenhum</span>
                                                                        <?php endif; ?>
                                                                        <a style="color:green;font-size:26px;" id="<?=$arquivo->id;?>" onclick="alert('Somente o usuário pode alterar seus marcadores!');" href="#">
                                                                        <i class="fa fa-angle-down"></i></a>
                                                                    </td>
                                                                    <td>
                                                                        <a target="_blank" id="<?=$arquivo->id;?>" href="public/files/<?=$cliente[0]->cnpj;?>/<?=$usuario[0]->sirius;?>/<?=$arquivo->nome;?>">
                                                                            <img src="public/assets/img/abrir.png" width="30px">
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a id="<?=$arquivo->id;?>" onclick="arquivar(this);" href="#">
                                                                            <img src="public/assets/img/arquivar.png" width="30px">
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="arquivados">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title">
                                            <i class="fa fa-archive"></i> Lista de Arquivados <br />
                                            <small style="font-size:15px;">Arquivados / 
                                                <a id="mostrar-entrada" href="#">Caixa de Entrada</a>
                                            </small>
                                        </h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <table id="tabelaArquivados" class="display compact">
                                            <thead>
                                                <tr>
                                                    <th>#Id</th>
                                                    <th>Nome</th>
                                                    <th>Vizualização</th>
                                                    <th>Exibir</th>
                                                    <th>Mover p/ C. de Entrada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <?php foreach($arquivos as $arquivo): ?>
                                                    <?php if($arquivo->status == 'arquivado' && $arquivo->sirius == $usuario[0]->sirius): ?>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <tr style="font-size:13px;" id="arquivo-<?=$arquivo->id; ?>">
                                                                    <td><b><?=$arquivo->id;?></b></td>
                                                                    <td><b><?=$arquivo->nome;?></b></td>
                                                                    <td id="leitura-<?=$arquivo->id;?>"><b><?=$arquivo->lido ? 'Lido' : '<b>Não</b> lido'; ?></b></td>
                                                                    <td><b>
                                                                        <a target="_blank" id="<?=$arquivo->id;?>" href="public/files/<?=$cliente[0]->cnpj;?>/<?=$usuario[0]->sirius;?>/<?=$arquivo->nome;?>">
                                                                            <img src="public/assets/img/abrir.png" width="30px">
                                                                        </a>
                                                                    </b></td>
                                                                    <td><b>
                                                                        <a id="<?=$arquivo->id;?>" onclick="desarquivar(this);" href="#">
                                                                            <i class="fa fa-arrow-up desarquivar"></i></i>
                                                                        </a>
                                                                    </b></td>
                                                                </tr>
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
<?php include 'app/views/partials/footer.php'; ?>
<script src="public/assets/js/simulacaoArquivos.js"></script>