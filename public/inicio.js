$(document).ready(function () {
    $("#button").click(function () {
        let userId = $.cookie('user_id');

        if (!userId) {
            Swal.fire({
                title: 'LOGIN NECESSARIO',
                text: 'Faca login para cadastrar herois.',
                icon: 'warning',
                confirmButtonColor: '#ad2121',
                background: '#fff'
            });
            return;
        }

        $.ajax({
            url: "../api/salva_heroi",
            method: "POST",
            data: {
                user_id: userId,
                nome: $("#nome").val(),
                codinome: $("#codinome").val(),
                idade: $("#idade").val(),
                habilidades: $("#habilidades").val(),
                equipe: $("#equipe").val(),
                primeira_aparicao: $("#primeira_aparicao").val(),
            },
            success: function (res) {
                if (res['erro'] == 'n') {
                    Swal.fire({
                        title: 'HEROI CADASTRADO!',
                        html: `
                            <div style="text-align: center;">
                                <i class="bi bi-shield-fill" style="font-size: 3rem; color: #ffd700;"></i>
                                <p style="font-size: 1.2rem; margin-top: 10px;">
                                    <strong style="color: #ad2121;">${$("#nome").val()}</strong> foi cadastrado com sucesso!
                                </p>
                            </div>
                        `,
                        icon: 'success',
                        iconColor: '#ffd700',
                        background: '#fff',
                        confirmButtonColor: '#ad2121',
                        confirmButtonText: 'VER HEROIS',
                        allowOutsideClick: false,
                        customClass: {
                            title: 'marvel-swal-title'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/herois';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'ERRO!',
                        text: res.msg || 'Nao foi possivel cadastrar o heroi.',
                        icon: 'error',
                        iconColor: '#ad2121',
                        confirmButtonColor: '#ad2121',
                        background: '#fff'
                    });
                }
            },
            error: function (xhr) {
                if (xhr.status !== 403) {
                    Swal.fire({
                        title: 'ERRO!',
                        text: xhr.responseJSON?.msg || 'Nao foi possivel cadastrar o heroi. Tente novamente.',
                        icon: 'error',
                        iconColor: '#ad2121',
                        confirmButtonColor: '#ad2121',
                        confirmButtonText: 'OK',
                        background: '#fff'
                    });
                }
            }
        });
    });
});
