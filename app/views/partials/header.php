<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="public/assets/img/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="public/images/logo.png" alt="Logo"></a>
            <?php if(isset($_SESSION) && $_SESSION['hierarquia'] == 'admin' ): ?>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="top-right">
        <div class="row dados-usuario">
            <div class="col-xs-11 center-header">
                <div class="col-xs-4 offset-xs-8 user-text">
                    <span class="nome"><?=$_SESSION['nome'];?></span><br>
                    <span class="funcao">Cliente: <?=$_SESSION['cliente'];?></span>
                </div>
            </div>
            <div class="col-xs-1 user-area dropdown">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" style="float:right;" width="50px" src="public/assets/img/user.png" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="perfil"><i class="fa fa- user"></i>Perfil</a>

                    <a class="nav-link" href="logout"><i class="fa fa-power -off"></i>Sair</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /#header -->