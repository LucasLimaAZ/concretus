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
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title"><i class="fa fa-tag"></i> Todos marcadores</h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="markers-list">

                                            <form id="marcador">
                                                <label for="adicionar-marcador">Adicionar marcador:</label>
                                                <input id="marcador-nome" style="margin-bottom:3px;" placeholder="Digite o nome do novo marcador..." type="text" class="form-control" name="nome">
                                                <div id="sucesso" style="display:none;" class="alert alert-success"><p>Adicionado com sucesso!</p></div>
                                                <button type="submit" style="margin-bottom:32px;" class="btn btn-primary">Adicionar</button>
                                            </form>

                                            <ul class="lista-marcadores">
                                                <?php foreach($marcadores as $marcador): ?>
                                                    <li id="marcador-<?=$marcador->id;?>"><?=$marcador->nome;?><a id="<?=$marcador->id;?>" onclick="deletar(this);" href="javascript:void(0);"><span class="delete-marker"><i class="fa fa-trash"></i></span></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
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
<script src="public/assets/js/marcadores.js"></script>