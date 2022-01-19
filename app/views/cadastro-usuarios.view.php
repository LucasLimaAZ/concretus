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
                    <div class="col-lg-10 offset-md-1">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title"><i class="fa fa-user-plus"></i> Cadastro de Usuários</h2>
                                    </div>
                                </div>

                                    <form role="form" id="usuario">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="nome">Nome: </label>
                                                <input type="text" placeholder="Nome completo do usuário" class="form-control" name="nome" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email">Email: </label>
                                                <input type="email" placeholder="exemplo@email.com" class="form-control" name="email" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="hierarquia">Hierarquia: </label>
                                                <select class="form-control" name="hierarquia">
                                                    <option value="user">Usuário</option>
                                                    <option value="admin">Administrador</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row pt20">
                                            <div class="col-md-4">
                                                <label for="usuario">Usuário: </label>
                                                <input type="text" placeholder="Nome de usuário. Ex: PauloDF_91" class="form-control" name="usuario" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="senha">Senha: </label>
                                                <input placeholder="********" type="password" id="usuario-senha" class="form-control" name="senha" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cliente">Cliente: </label>
                                                <input class="form-control" name="clienteId" type="text" />
                                            </div>
                                        </div>

                                        <div class="row pt30">
                                            <div class="col-md-4 offset-md-4">
                                                <button type="submit" id="botao-cadastrar" class="btn btn-primary full-width">
                                                    Cadastrar
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row pt30" id="sucesso">
                                            <div style="text-align:center;" role="alert" class="col-md-4 offset-md-4 alert alert-success">
                                                <p>Usuário cadastrado com sucesso!</p>
                                            </div>
                                        </div>

                                        <div class="row pt30" id="erro">
                                            <div class="col-md-12">
                                                <p style="color:red;text-align:center;">Ocorreu um erro! Tente novamente mais tarde.</p>
                                            </div>
                                        </div>

                                    </form>

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
<script src="public/assets/js/usuarios.js"></script>