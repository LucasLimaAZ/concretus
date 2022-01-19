<?php include 'app/views/partials/head.php'; ?>
<?php include 'app/views/partials/sidebar.php'; ?>
<div id="right-panel" class="right-panel">
    <div class="clearfix">
        <?php include 'app/views/partials/header.php'; ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title"><i class="fa fa-archive"></i> Lista de Arquivados <br /><small style="font-size:15px;">Arquivados</small></h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <table id="tabelaArquivos" class="display compact">
                                            <thead>
                                                <tr>
                                                    <th>#Id</th>
                                                    <th>Nome</th>
                                                    <th>Usuário</th>
                                                    <th>Status</th>
                                                    <th>Exibir</th>
                                                    <th>Mover p/ C. Entrada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <?php foreach($arquivos as $arquivo): ?>
                                                    <?php if($arquivo->status == 'arquivado'): ?>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <tr style="font-size:13px;" id="arquivo-<?=$arquivo->id; ?>">
                                                                    <td><b><?=$arquivo->id;?></b></td>
                                                                    <td><b><?=$arquivo->nome; ?></b></td>
                                                                    <td><b><?=$arquivo->usuario; ?></b></td>
                                                                    <td id="leitura-<?=$arquivo->id;?>"><?=$arquivo->lido ? '<b>Lido</b>' : '<b>Não lido</b>'; ?></td>
                                                                    <td><b>
                                                                        <a target="_blank" id="<?=$arquivo->id;?>" onclick="marcarLido(this);" href="public/files/<?=$arquivo->cnpj;?>/<?=$arquivo->sirius;?>/<?=$arquivo->nome;?>">
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
<script src="public/assets/js/arquivos.js"></script>