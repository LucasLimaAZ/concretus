$("#sucesso").hide();
$("#erro").hide();

$("#botao-usuario").click(() => {

    let dados = $("#usuario").serialize();

    $.post("cadastrar-usuario", dados, response => {
        cliente = JSON.parse(response);
    })

    .done(() => {
        alert("Cadastrado com sucesso!");
      })
      .fail(() => $("#erro").show(200));
  
});

$("#novoUsuario-senha").keyup(() => {

    let str = $("#novoUsuario-senha").val();
    corrigido = str.replace(/ /g,'');
    $("#novoUsuario-senha").val(corrigido);

});

$("#novoUsuario-usuario").keyup(() => {

    let str = $("#novoUsuario-usuario").val();
    corrigido = str.replace(/ /g,'');
    corrigido = corrigido.replace(/[^a-zA-Z0-9]/g, "");
    $("#novoUsuario-usuario").val(corrigido);

});