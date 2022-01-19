<?php include 'app/views/partials/head.php'; ?>
<?php include 'app/views/partials/sidebar.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php include 'app/views/partials/header.php'; ?>
        
        <div class="content">
            
            <div class="animated fadeIn">
                
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-file"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                        <?php
                                        $nArquivos = 0;
                                        foreach ($arquivos as $arquivo){
                                            $nArquivos++;
                                        }
                                        ?>
                                            <div class="stat-text"><span class="count"><?=$nArquivos;?></span></div>
                                            <div class="stat-heading">Arquivos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="fa fa-archive"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                        <?php
                                        $nArquivados = 0;
                                        foreach ($arquivos as $arquivo){
                                            if($arquivo->status == 'arquivado'){
                                                $nArquivados++;
                                            }
                                        }
                                        ?>
                                            <div class="stat-text"><span class="count"><?=$nArquivados;?></span></div>
                                            <div class="stat-heading">Arquivados</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$clientes; ?></span></div>
                                            <div class="stat-heading">Clientes</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>

                <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="simular-usuario" action="simular-usuario" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="title"><i style="color:#336258;" class="fa fa-user"></i> Simular Usuário</h2>
                                        </div>
                                        <div class="col-md-8 offset-md-2">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <select class="select2 form-control" id="usuarios" name="id">
                                                        <?php foreach ($usuarios as $usuario): ?>
                                                            <?php if ($usuario->hierarquia == 'user'): ?>
                                                                <option value="<?=$usuario->id;?>"><?=$usuario->nome;?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary">Simular</button>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add a category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
<script src="public/assets/js/index.js"></script>
<?php include 'app/views/partials/footer.php'; ?>