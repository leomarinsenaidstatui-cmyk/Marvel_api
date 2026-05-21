$(document).ready(function() {
    $('#enviar_Codigo').click(function() {
        $.ajax({
            type: "GET",
            url: "/api/enviar_codigo",
            data: {
                codigo: $('#codigo').val(),
                email: $('#email').val(),
            },
            dataType: "json",
            success: function(response) {
                if (response.erro === 'n') {
                    $.cookie('token', response['token'], {expire:7, path:'/'});
                    $.cookie('user_id', response['user_id'], {expire:7, path:'/'});
                    setTimeout(function() {
                        window.location.href = "/herois";
                    }, 2000);
                } else {
                    alert(response.msg || 'Erro ao verificar código');
                }
            },
            error: function(xhr) {
                alert(xhr.responseJSON?.msg || 'Erro ao enviar requisição');
            }
        });
    });
});
