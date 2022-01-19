<?php include 'app/views/partials/head.php'; ?>
<style>
body{
    background-color:#f1f2f7 !important;
}
</style>
<div class="row login-screen">
    <div class="col-md-8 login-background">
    </div>
    <div class="col-md-4 login-form-background">
        <div class="row" style="margin-top:30%">
            <form class="col-md-12" id="login" method="post">
                <div class="col-md-12" style="text-align:center;">
                    <img src="public/assets/img/logo.png" width="300px">
                </div>
                <div class="col-md-10 offset-md-1 pt30">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" name="usuario">
                </div>
                <div class="col-md-10 offset-md-1 pt10">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha">
                </div>
                <div class="col-md-10 offset-md-1 pt20">
                    <a style="color:#3366BB;" href="recuperar-senha">Esqueci minha senha.</a>
                </div>
                <div class="col-md-12 pt20" style="text-align:center">
                    <button type="submit" style="width:83%;" id="botao-acessar" class="btn btn-success">Acessar</button>
                </div>
            </form>
            <div id="incorreto" class="col-md-6 offset-md-3 alert alert-danger" style="margin-top:40px;">
                Usuário ou senha incorretos!
            </div>
        </div>
    </div>
</div>

<script src="public/assets/js/login.js"></script>

</body>
</html>
