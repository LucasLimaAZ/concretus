$("#incorreto").hide();

$("#login").submit((event) => {
    event.preventDefault();
    var data = $("#login").serialize();

    $.post("login", data, response => console.log(response))
    .done((response) => {
        if(response == 'false'){
            $("#incorreto").fadeIn(150);

            window.setTimeout(() => {
                $("#incorreto").fadeOut(150);
            }, 1500)
        } else window.location.replace("home");
    });
});