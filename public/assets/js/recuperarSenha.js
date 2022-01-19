$("#hidden").hide();
$("#mudar-senha").hide();

$('#enviar-email').click(() => {

    var emailInput = $('#email').val();
    var email = {email: emailInput};

    $.post('enviar-email', email, response => {

        dados = JSON.parse(response);

        $("#hidden").show(300);

        token = dados.token;

    });

});

$('#confirmar').click(() => {

    entrada = $('#entrada-codigo').val();

    if(entrada == token){
        $('#mudar-senha').show(300);
    }else{
        alert('Código inválido');
    }

});

$('#atualizar-senha').click(() => {

    senha1 = $("#nova-senha").val();
    senha2 = $("#repetir-senha").val();

    if(senha1.length < 6){

        alert('Senha muito curta! Deve conter ao menos 6 caracteres.');

    }else{

        if(senha1 == senha2){

            dados.senha = senha1;

            $.post('atualizar-senha', dados, response => {
                alert('Senha atualizada com sucesso!');
            });

        }else{
            alert('As senhas divergem!');
        }

    }

});