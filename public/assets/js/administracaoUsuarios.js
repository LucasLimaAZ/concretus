$(".senha-real").hide();
$(".asteriscos").show();

$("#mostar-senhas").click(() => {

    $(".senha-real").toggle();
    $(".asteriscos").toggle();

});

function editarUsuario(usuario){

    $("#ver-mais").show();
    $("#editar-id").val($(`#id-${usuario.id}`).html());
    $("#editar-nome").val($(`#nome-${usuario.id}`).html());
    $("#editar-user").val($(`#user-${usuario.id}`).html());
    $("#editar-senha").val($(`#senha-${usuario.id}`).val());
    $("#editar-cliente").val($(`#cliente-${usuario.id}`).html());
    $("#editar-sirius").val($(`#sirius-${usuario.id}`).html());
    $("#editar-hierarquia").val($(`#hierarquia-${usuario.id}`).html());
    $("#editar-email").val($(`#email-${usuario.id}`).html());

}

$(".close").click(() => {

    $("#ver-mais").hide();

});

function deletar(usuario){

    var dados = $("#editar-usuario").serialize();

    var r = confirm("Você realmente deseja excluir os registros deste usuario?");

    if(r == true){

        $.post("deletar-usuario", dados, response => {

            usuario = JSON.parse(response);
    
        }).done(() => {
    
            $(`#usuario-${usuario}`).hide(300);
    
        }).fail(() => {
    
            alert("Ocorreu um erro. Tente novamente mais tarde!")
    
        }).always(() => {

            $("#ver-mais").hide();
            
        });

    }

}

$("#editar-usuario").submit(() => {

    event.preventDefault();

    var dados = $("#editar-usuario").serialize();

    $.post('atualiza-usuario', dados, response => {

        usuario = JSON.parse(response);

    }).done(function(){

        $(`#nome-${usuario.id}`).html(usuario.nome);
        $(`#user-${usuario.id}`).html(usuario.usuario);
        $(`#senha-real-${usuario.id}`).html(usuario.senha);
        $(`#cliente-${usuario.id}`).html(usuario.clienteId);
        $(`#sirius-${usuario.id}`).html(usuario.sirius);
        $(`#hierarquia-${usuario.id}`).html(usuario.hierarquia);
        $(`#email-${usuario.id}`).html(usuario.email);

    }).fail(function(){

        alert("Ocorreu um erro! Tente novamente mais tarde.")

    }).always(() => {

        $("#ver-mais").hide();

    });

});


$("#editar-senha").keyup(() => {

    let str = $("#editar-senha").val();
    corrigido = str.replace(/ /g,'');
    $("#editar-senha").val(corrigido);

});

$("#editar-user").keyup(() => {

    let str = $("#editar-user").val();
    corrigido = str.replace(/ /g,'');
    corrigido = corrigido.replace(/[^a-zA-Z0-9]/g, "");
    $("#editar-user").val(corrigido);

});

$(document).ready(() => {

    $('#tabelaUsuarios').DataTable({
        "language":{
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

} );