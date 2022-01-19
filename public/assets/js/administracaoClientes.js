$(".usuarios").hide();

var usuarios = [];
var cpf_cnpj;

$("#editar-cnpj").keydown(function(){
    try {
        $("#editar-cnpj").unmask();
    } catch (e) {}

    var tamanho = $("#editar-cnpj").val().length;

    if(tamanho <= 11){
        $("#editar-cnpj").mask("999.999.999-999");
        cpf_cnpj = 'cpf';
    } else {
        $("#editar-cnpj").mask("99.999.999/9999-99");
        cpf_cnpj = 'cnpj';
    }

    var elem = this;
    
    setTimeout(function(){
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);

    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});

function editarCliente(cliente)
{

    $("#ver-mais").show();
    $("#editar-id").val($(`#id-${cliente.id}`).html());
    $("#clienteId").val($(`#id-${cliente.id}`).html());
    $("#editar-nome").val($(`#nome-${cliente.id}`).html());
    $("#editar-cnpj").val($(`#cnpj-${cliente.id}`).html());
    $("#editar-sirius").val($(`#sirius-${cliente.id}`).html());
    $("#editar-responsavel").val($(`#responsavel-${cliente.id}`).html());
    $("#editar-site").val($(`#site-${cliente.id}`).html());
    $("#editar-email").val($(`#email-${cliente.id}`).html());

    var clienteId = {clienteId:cliente.id};

    popularTabela(clienteId);
}

$(".close").click(() => {

    $("#ver-mais").hide();

});

function deletar(cliente){

    let dados = $("#editar-cliente").serialize();

    let r = confirm("Você realmente deseja excluir os registros deste cliente?");

    if(r == true){

        $.post("deletar-cliente", dados, response => {

            cliente = JSON.parse(response);
    
        }).done(() => {
    
            $(`#cliente-${cliente}`).hide(300);
    
        }).fail(() => {
    
            alert("Ocorreu um erro. Tente novamente mais tarde!");
    
        }).always(() => {

            $("#ver-mais").hide();
            
        });

    }

}

function deletarUsuario(usuario){

    let dados = {id: usuario.id};

    let respostaUsuario = confirm("Você realmente deseja excluir os registros desse usuário?");

    if(respostaUsuario){

        $.post("deletar-usuario", dados, response => {

            usuario = JSON.parse(response);
    
        }).done(() => {
    
            $(`#usuario-${usuario}`).hide(300);
    
        }).fail(() => {
    
            alert("Ocorreu um erro. Tente novamente mais tarde!");
    
        });

    }

}

$("#botao-salvar").click(() => {

    event.preventDefault();

    var dados = $("#editar-cliente").serialize();

    if(cpf_cnpj == 'cnpj'){

        atualizarClienteCnpj(dados);

    }else if(cpf_cnpj == 'cpf'){

        atualizarClienteCpf(dados);

    }else{
        alert('Nenhum CPF ou CNPJ válidos foram inseridos.')
    }

    

});

$(document).ready(() => {

    $("#cadastro-usuario").hide();
    $("#erro").hide();

    $('#tabelaClientes').DataTable({
        reponsive:true,
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

});

$("#botao-usuarios").click(() => {

    $(".dados").hide();
    $(".usuarios").fadeIn(200);
    $("#tabela-usuarios").fadeIn(200);
    $("#botao-usuarios").attr('disabled', true);
    $("#botao-dados").attr('disabled', false);

});

$("#botao-dados").click(() => {

    $(".usuarios").hide();
    $("#cadastro-usuario").hide();
    $(".dados").fadeIn(200);
    $("#botao-usuarios").attr('disabled', false);
    $("#botao-dados").attr('disabled', true);

});

function popularTabela(clienteId)
{
    let users;

    $.post('usuarios-cliente', clienteId, resposta => {

        users = JSON.parse(resposta);

        $("#linha-usuarios").html("");

        $(users).each((index, valor) => {

            $("#linha-usuarios").append(
                `<tr id="usuario-${valor.id}">
                <td>${valor.nome}</td>
                <td>${valor.usuario}</td>
                <td>${valor.senha}</td>
                <td>${valor.sirius}</td>
                <td>
                    <a href="#" style="color:red;" id="${valor.id}" onclick="deletarUsuario(this);">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
                </tr>`
            );
    
        });
    });

}

$("#botao-novo").click(() => {

    $("#tabela-usuarios").hide();
    $("#cadastro-usuario").fadeIn(200);

});

$("#usuario").submit(() => {

    event.preventDefault();
    let dados = $("#usuario").serialize();

    alert(dados);

});

$("#botao-cadastrar-usuario").click(() => {

    if($("#novoUsuario-senha").val() == $("#novoUsuario-repetir_senha").val()){

        let dados = $("#usuario").serialize();

        $.post("cadastrar-usuario", dados, response => {
            cliente = JSON.parse(response);
            console.log(cliente.clienteId);
        })
    
        .done(() => {

            $("#linha-usuarios").append(
                `<tr>
                <td>${$("#novoUsuario-nome").val()}</td>
                <td>${$("#novoUsuario-usuario").val()}</td>
                <td>${$("#novoUsuario-senha").val()}</td>
                <td>${$("#novoUsuario-sirius").val()}</td>
                <td>
                    <a href="#" style="color:red;" id="asd">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
                </tr>`
            );

            $("#cadastro-usuario").hide();
            $("#tabela-usuarios").fadeIn(200);

          })
          .fail(() => $("#erro").show(200));

    }else{

        alert("As senhas não coincidem!");

    }
  
});

function validarCnpj() {
 
    var cnpjInput = $("#editar-cnpj").val();
    cnpj = cnpjInput.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

function validarCpf(){

    var cpf = $("#editar-cnpj").val();

    strCPF = cpf.replace('.', '');
    var strCPF1 = strCPF.replace('.', '');
    var strCPF2 = strCPF1.replace('-', '');

    var Soma;
    var Resto;
    Soma = 0;

    if (
        strCPF2 == "00000000000" ||
        strCPF2 == "11111111111" ||
        strCPF2 == "22222222222" ||
        strCPF2 == "33333333333" ||
        strCPF2 == "44444444444" ||
        strCPF2 == "55555555555" ||
        strCPF2 == "66666666666" ||
        strCPF2 == "77777777777" ||
        strCPF2 == "88888888888" ||
        strCPF2 == "99999999999"
    ){
        return false;
    }

    for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF2.substring(i-1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF2.substring(9, 10)) ){
       return false;
    }

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF2.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF2.substring(10, 11) ) ) {
        return false;
    }

    return true;

}

function atualizarClienteCpf(dados)
{
    if(validarCpf()){

        $.post('atualiza-cliente', dados, response => {

            cliente = JSON.parse(response);
    
        }).done(function(){
    
            $(`#nome-${cliente.id}`).html(cliente.nome);
            $(`#cnpj-${cliente.id}`).html(cliente.cnpj);
            $(`#sirius-${cliente.id}`).html(cliente.sirius);
            $(`#responsavel-${cliente.id}`).html(cliente.responsavel);
            $(`#site-${cliente.id}`).html(cliente.site);
            $(`#email-${cliente.id}`).html(cliente.email);
    
        }).fail(function(){
    
            alert("Ocorreu um erro! Tente novamente mais tarde.")
    
        }).always(() => {
    
            $("#ver-mais").hide();
    
        });

    }else{

        alert("Por favor digite um cpf válido.");

    }
}

function atualizarClienteCnpj(dados)
{
    if(validarCnpj()){

        $.post('atualiza-cliente', dados, response => {

            cliente = JSON.parse(response);
    
        }).done(function(){
    
            $(`#nome-${cliente.id}`).html(cliente.nome);
            $(`#cnpj-${cliente.id}`).html(cliente.cnpj);
            $(`#sirius-${cliente.id}`).html(cliente.sirius);
            $(`#responsavel-${cliente.id}`).html(cliente.responsavel);
            $(`#site-${cliente.id}`).html(cliente.site);
            $(`#email-${cliente.id}`).html(cliente.email);
    
        }).fail(function(){
    
            alert("Ocorreu um erro! Tente novamente mais tarde.")
    
        }).always(() => {
    
            $("#ver-mais").hide();
    
        });

    }else{

        alert("Por favor digite um cnpj válido.");

    }
}