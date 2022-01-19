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
    <div class="col-md-6 offset-md-3" method="post">
        <form id="cadastrar-email">
            <div class="recuperacao_de_senha">
                <h1 class="title"><i class="fa fa-envelope"></i> Por favor informe seu email</h1>
                <p>Para continuar pedimos que por favor informe seu endereço de email para que possamos administrar melhor sua segurança no sistema.</p>
                <div class="row" style="padding:2%;">
                    <input type="text" placeholder="seuemail@email.com" name="email" id="email" class="form-control col-md-10">
                    <button class="btn btn-primary col-md-2" id="enviar-email">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="public/assets/js/cadastrarEmail.js"></script>
<?php include 'app/views/partials/footer.php'; ?>