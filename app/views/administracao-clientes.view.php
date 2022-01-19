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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title"><i class="fa fa-users"></i> Administração de Clientes</h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="responsive">

                                            <table id="tabelaClientes" class="display compact" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>#Id</th>
                                                        <th>Nome</th>
                                                        <th>Cpf / Cnpj</th>
                                                        <th>Responsável</th>
                                                        <th>Site</th>
                                                        <th>Email</th>
                                                        <th>Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($clientes as $cliente): ?>

                                                
                                                            <tr style="font-size:13px;" id="cliente-<?=$cliente->id; ?>">
                                                                <td id="id-<?=$cliente->id; ?>"><?=$cliente->id; ?></td>
                                                                <td id="nome-<?=$cliente->id; ?>"><?=$cliente->nome; ?></td>
                                                                <td id="cnpj-<?=$cliente->id; ?>"><?=$cliente->cnpj; ?></td>
                                                                <td id="responsavel-<?=$cliente->id; ?>"><?=$cliente->responsavel; ?></td>
                                                                <td id="site-<?=$cliente->id; ?>"><?=$cliente->site; ?></td>
                                                                <td id="email-<?=$cliente->id; ?>"><?=$cliente->email; ?></td>
                                                                <td><a id="<?=$cliente->id; ?>" onclick="editarCliente(this);" href="javascript:void(0)"><i style="color:green;font-size:24px;" class="fa fa-edit"></i></a></td>
                                                            </tr>
        

                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php include 'app/views/partials/edit-cliente-modal.php'; ?>

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
<script src="public/assets/js/administracaoClientes.js"></script>
