$(document).ready(function(){

    let token = $.cookie('token');

    $("#button").click(function(){

        $.ajax({
            url: "../api/salva_heroi",
            method: "POST",
            data: {
                heroi_id: $("#heroi_id").val(),
                nome: $("#nome").val(),
                codinome: $("#codinome").val(),
                idade: $("#idade").val(),
                habilidades: $("#habilidades").val(),
                equipe: $("#equipe").val(),
                primeira_aparicao: $("#primeira_aparicao").val(),
                token: token
            },
                      success: function(res) {
                if(res['erro'] == 'n'){
                    console.log("Status Pix:", res);
                    console.log(res);
                    
                    // Sweet Alert de sucesso (substitui o alert('deu bom'))
                    Swal.fire({
                        title: 'QUADRINHO ATUALIZADO! ⚡',
                        html: `
                            <div style="text-align: center;">
                                <i class="bi bi-book-fill" style="font-size: 3rem; color: #ffd700;"></i>
                                <p style="font-size: 1.2rem; margin-top: 10px;">
                                    <strong style="color: #ad2121;">${$("#nome").val()}</strong> foi atualizado com sucesso!
                                </p>
                            </div>
                        `,
                        icon: 'success',
                        iconColor: '#ffd700',
                        background: '#fff',
                        confirmButtonColor: '#ad2121',
                        confirmButtonText: 'VER QUADRINHOS',
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
                        title: 'ERRO! 💥',
                        text: res.msg || 'Não foi possível atualizar o quadrinho.',
                        icon: 'error',
                        iconColor: '#ad2121',
                        confirmButtonColor: '#ad2121',
                        background: '#fff'
                    });
                }
            },
            error: function(xhr) {
                console.log("Erro ao consultar status Pix:", xhr.responseText);
                
                // Sweet Alert de erro (se não for 403, que já foi tratado globalmente)
                if(xhr.status !== 403){
                    Swal.fire({
                        title: 'ERRO! 💥',
                        text: xhr.responseJSON?.msg || 'Não foi possível atualizar o quadrinho. Tente novamente.',
                        icon: 'error',
                        iconColor: '#ad2121',
                        confirmButtonColor: '#ad2121',
                        confirmButtonText: 'OK',
                        background: '#fff'
                    });
                }
            }
        })
    });
});