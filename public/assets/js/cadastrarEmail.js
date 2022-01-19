$('#cadastrar-email').submit(() => {

    event.preventDefault();

    var dados = $('#cadastrar-email').serialize();

    $.post('cadastrar-email', dados, response => {

        alert('Email cadastrado com sucesso!');

        var email = JSON.parse(response);

        window.location.reload();

    });

});