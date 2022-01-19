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
                                        <h2 class="title"><i class="fa fa-users"></i> Administração de Usuários</h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="responsive">
                                            <input type="checkbox" id="mostar-senhas"> Mostrar senhas
                                            <table id="tabelaUsuarios" class="display compact" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>#Id</th>
                                                        <th>Nome</th>
                                                        <th>Usuário</th>
                                                        <th>Senha</th>
                                                        <th>Cliente Id</th>
                                                        <th>Sirius</th>
                                                        <th>Hierarquia</th>
                                                        <th>Email</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($usuarios as $usuario): ?>

                                                    <!-- <div class="row">
                                                        <div class="col-md-12"> -->
                                                            <tr style="font-size:13px;" id="usuario-<?=$usuario->id; ?>">
                                                                <td id="id-<?=$usuario->id; ?>"><?=$usuario->id; ?></td>
                                                                <td id="nome-<?=$usuario->id; ?>"><?=$usuario->nome; ?></td>
                                                                <td id="user-<?=$usuario->id; ?>"><?=$usuario->usuario; ?></td>
                                                                <td>
                                                                    <input id="senha-<?=$usuario->id;?>" type="hidden" value="<?=$usuario->senha;?>">
                                                                    <span class="asteriscos">********</span>
                                                                    <span id="senha-real-<?=$usuario->id;?>" class="senha-real"><?=$usuario->senha; ?></span>
                                                                </td>
                                                                <td id="cliente-<?=$usuario->id; ?>"><?=$usuario->clienteId; ?></td>
                                                                <td id="sirius-<?=$usuario->id; ?>"><?=$usuario->sirius; ?></td>
                                                                <td id="hierarquia-<?=$usuario->id; ?>"><?=$usuario->hierarquia; ?></td>
                                                                <td id="email-<?=$usuario->id; ?>"><?=$usuario->email; ?></td>
                                                                <td><a id="<?=$usuario->id; ?>" onclick="editarUsuario(this);" href="javascript:void(0)"><i style="color:green;font-size:24px;" class="fa fa-edit"></i></a></td>
                                                            </tr>
                                                        <!-- </div>
                                                    </div> -->

                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php include 'app/views/partials/edit-usuario-modal.php'; ?>

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
<script src="public/assets/js/administracaoUsuarios.js"></script>