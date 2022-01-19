<?php include 'app/views/partials/head.php'; ?>
<style>
body{
    background-color:#f1f2f7;
}
footer{
    display:none !important;
}
</style>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="recuperacao_de_senha">
            <h1 class="title"><i class="fa fa-user"></i> Recuperação de Senha</h1>
            <p>Por favor nos informe seu email abaixo para que possamos lhe enviar um código segurança. Este código possibilitará que você recupere a sua senha.</p>
            <div class="row" style="padding:2%;">
                <input type="text" placeholder="seuemail@email.com" name="email" id="email" class="form-control col-md-10">
                <button class="btn btn-primary col-md-2" id="enviar-email">Enviar</button>
            </div>
            <div class="row" style="margin-top:50px" id="hidden">
                <div class="col-md-12">
                    <p>Você receberá dentro de instantes um código em seu email, por favor digite o código abaixo: </p>
                    <div class="row" style="padding:2%;">
                        <input id="entrada-codigo" type="text" placeholder="XXXXXXXX" name="codigo" class="form-control col-md-6">
                        <button class="btn btn-primary col-md-6" id="confirmar">Confirmar</button>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:20px" id="mudar-senha">
                <div class="col-md-6 offset-md-3">
                    <label for="senha">Nova senha:</label><br>
                    <input type="password" name="senha" id="nova-senha" class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="repetir-senha">Repita a senha:</label><br>
                    <input type="password" name="repetir-senha" id="repetir-senha" class="form-control">
                </div>
                <div class="col-md-6 offset-md-3 pt20">
                    <button type="button" id="atualizar-senha" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/assets/js/recuperarSenha.js"></script>
<?php include 'app/views/partials/footer.php'; ?>