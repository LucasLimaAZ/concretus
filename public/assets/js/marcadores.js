// TRIGGERS

$("#marcador").submit(()=>{
    cadastrarMarcador()
})

$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

$(".marker-close").click(()=>{
    $(".marker-dropdown").hide(200)
})

$("#selecionar-marcador").change(()=>{
    if($("#selecionar-marcador").children("option:selected").val() == 'todos'){
        $("tr").show()
    }else{
        let selected = $("#selecionar-marcador").children("option:selected").val()
        $("tr").hide()
        $(`.${selected}`).show()
    }
})

// FUNCTIONS

function marker(obj)
{
    id = obj.id

    $(`#marker-${id}`).toggle(200)
}

function trocarMarcador(obj)
{
    let retorno = obj.id.split('/')

    let id = retorno[0]
    let marcador = retorno[1]

    let dados = {id: id, marcadorId: marcador}

    $.post('trocar-marcador', dados)
    $(`#marker-${id}`).toggle(200)
    location.reload()
}

function deletar(obj)
{
    let r = confirm("Você tem certeza de que deseja excluir permanentemente este marcador?")
    if(!r){
        return
    }
    let id = obj.id
    let dados = {id: id}
    $.post('deletar-marcador', dados)
    .done(()=>{
        location.reload()
    })
}

function atualize()
{
    alert("Atualize a página para excluir itens recém adicionados!")
}

function exibirSucesso()
{
    $("#sucesso").fadeToggle(300)
    $("#erro").hide()

        window.setTimeout(() => {
            $("#sucesso").fadeToggle(300)

    }, 1500)
}

function cadastrarMarcador()
{
    event.preventDefault()
    let dados = $("#marcador").serialize()
    $.post('cadastrar-marcadores', dados)
    .done(() => { location.reload() })
}