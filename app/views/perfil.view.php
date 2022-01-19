<?php include 'app/views/partials/head.php'; ?>
<?php 
if($_SESSION['hierarquia'] == 'admin'){
    include 'app/views/partials/sidebar.php'; 
}else{
    include 'app/views/partials/sidebar-user.php';
}
?>
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
                                        <h2 class="title"><i class="fa fa-user"></i> Perfil de Usuário</h2>
                                    </div>
                                </div>

                                <div class="row" style="padding:2%;">  
                                    <div class="col-md-12">
                                        <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                                        <h1 style="text-align:center;padding-bottom:4%;"><?=date("H:i");?></h1>
                                    </div>  
                                    <div class="col-md-6">
                                        <label for="nome"><b>Nome:</b></label>
                                        <span class="user-info"><?=$_SESSION['nome'];?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="usuario"><b>Usuário:</b></label>
                                        <span class="user-info"><?=$_SESSION['usuario'];?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email"><b>Email:</b></label>
                                        <span class="user-info"><?=$_SESSION['email'];?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hierarquia"><b>Hierarquia:</b></label>
                                        <span class="user-info"><?=$_SESSION['hierarquia'] == 'admin' ? 'Administrador' : 'Usuário';?></span>
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
<script src="public/assets/js/usuarios.js"></script>