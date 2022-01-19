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
                                        <h2 class="title"><i class="fa fa-user-plus"></i> Cadastro de Clientes</h2>
                                    </div>
                                </div>

                                    <form role="form" id="cliente">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="nome">Cliente: </label>
                                                <input type="text" placeholder="Nome do cliente" class="form-control" name="nome" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cnpj">CPF / CNPJ: </label>
                                                <input id="cnpj" type="text" class="form-control" name="cnpj" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email">Email: </label>
                                                <input type="email" placeholder="exemplo@email.com" class="form-control" name="email">
                                            </div>
                                        </div>

                                        <div class="row pt20">
                                            <div class="col-md-4">
                                                <label for="responsavel">Nome Responsável: </label>
                                                <input type="text" placeholder="Responsável pelo cliente" class="form-control" name="responsavel" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="site">Site: </label>
                                                <input type="text" placeholder="http://meusite.com.br/" class="form-control" name="site">
                                            </div>
                                            <div class="col-md-4" style="margin-top:32px;">
                                                <button type="submit" id="botao-cadastrar" class="btn btn-primary full-width">
                                                    Cadastrar
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row pt30" id="sucesso">
                                            <div style="text-align:center;" role="alert" class="col-md-4 offset-md-4 alert alert-success">
                                                <p>Cliente cadastrado com sucesso!</p>
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
<script src="public/assets/js/clientes.js"></script>