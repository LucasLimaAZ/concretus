var cpf_cnpj;

$("#sucesso").hide();
$("#erro").hide();

$("#cnpj").keydown(function(){
    try {
        $("#cnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cnpj").val().length;

    if(tamanho <= 11){
        $("#cnpj").mask("999.999.999-999");
        cpf_cnpj = 'cpf';
    } else {
        $("#cnpj").mask("99.999.999/9999-99");
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

$("#cliente").submit(function(){

    event.preventDefault();

    let dados = $("#cliente").serialize();

    if(cpf_cnpj == 'cnpj'){

        cadastrarClienteCnpj(dados);

    }else if(cpf_cnpj == 'cpf'){

        cadastrarClienteCpf(dados);

    }else{

        alert('Não foi fornecido nenhum CPF ou CNPJ.');

    }
  
});

function exibirSucesso()
{
    $("#sucesso").fadeToggle(300);

        window.setTimeout(() => {

            $("#sucesso").fadeToggle(300);

    }, 1500);
}

function validarCnpj() {
 
    var cnpjInput = $("#cnpj").val();
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

    var cpf = $("#cnpj").val();

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

function cadastrarClienteCpf(dados)
{
    if(validarCpf()){

        $.post("cadastrar-cliente", dados, response => {
            cliente = JSON.parse(response);
        })
        .done(() => {
            exibirSucesso();
          })
        .fail(() => $("#erro").show(200));

    }else{

        alert("Por favor digite um cpf válido.");

    }
}

function cadastrarClienteCnpj(dados)
{
    if(validarCnpj()){

        $.post("cadastrar-cliente", dados, response => {
            cliente = JSON.parse(response);
        })
        .done(() => {
            exibirSucesso();
          })
        .fail(() => $("#erro").show(200));

    }else{

        alert("Por favor digite um cnpj válido.");

    }
}