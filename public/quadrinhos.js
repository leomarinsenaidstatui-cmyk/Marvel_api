$(document).ready(function() {

    // Sweet Alert de boas-vindas (substitui o alert("to funfando"))
    marvelSwal({
        title: '? MARVEL QUADRINHOS ?',
        text: 'Sistema de quadrinhos carregado!',
        icon: 'success',
        iconColor: '#ffd700',
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false,
        customClass: {
            title: 'marvel-swal-title'
        }
    });

    let token = $.cookie('token');

    $("#button").click(function() {
        $.ajax({
            url: "/api/salva_quadrinho",
            method: "POST",
            data: {
                token: token,
                quadrinho_id: $("#quadrinho_id").val(),
                nome: $("#nome").val(),
                heroi: $("#heroi").val(),
                autor: $("#autor").val(),
                ilustrador: $("#ilustrador").val(),
                editora: $("#editora").val(),
                data_de_lancamento: $("#data_de_lancamento").val()
            },
            success: function(res) {
                if(res['erro'] == 'n'){
                    console.log("Status Pix:", res);
                    console.log(res);
                    
                    // Sweet Alert de sucesso (substitui o alert('deu bom'))
                    marvelSwal({
                        title: 'QUADRINHO ATUALIZADO! ?',
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
                        confirmButtonColor: '#ad2121',
                        confirmButtonText: 'VER QUADRINHOS',
                        allowOutsideClick: false,
                        customClass: {
                            title: 'marvel-swal-title'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/quadrinhos';
                        }
                    });
                } else {
                    marvelSwal({
                        title: 'ERRO! ??',
                        text: res.msg || 'Não foi possível atualizar o quadrinho.',
                        icon: 'error',
                        iconColor: '#ad2121',
                        confirmButtonColor: '#ad2121'
                    });
                }
            },
            error: function(xhr) {
                console.log("Erro ao consultar status Pix:", xhr.responseText);
                
                // Sweet Alert de erro (se não for 403, que já foi tratado globalmente)
                if(xhr.status !== 403){
                    marvelSwal({
                        title: 'ERRO! ??',
                        text: xhr.responseJSON?.msg || 'Não foi possível atualizar o quadrinho. Tente novamente.',
                        icon: 'error',
                        iconColor: '#ad2121',
                        confirmButtonColor: '#ad2121',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

    $("#botao").click(function() {
        
        // Sweet Alert de confirmação antes de deletar
        marvelConfirm({
            title: 'EXCLUIR QUADRINHO?',
            text: "Esta ação não poderá ser desfeita!",
            icon: 'warning',
            iconColor: '#ffd700',
            confirmButtonColor: '#ad2121',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'SIM, EXCLUIR',
            cancelButtonText: 'CANCELAR',
            customClass: {
                title: 'marvel-swal-title'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    url: "../api/deleta_quadrinho",
                    method: "DELETE",
                    data: {
                        token: token,
                        quadrinho_id: $("#quadrinho_id").val(),
                    },
                    success: function(res) {
                        if(res['erro'] == 'n'){
                            
                            // Sweet Alert de sucesso na exclusão (substitui o alert("deletado"))
                            marvelSwal({
                                title: 'QUADRINHO EXCLUÍDO! ?',
                                html: `
                                    <div style="text-align: center;">
                                        <i class="bi bi-trash-fill" style="font-size: 3rem; color: #ffd700;"></i>
                                        <p style="font-size: 1.2rem; margin-top: 10px;">
                                            O quadrinho foi removido do universo Marvel!
                                        </p>
                                    </div>
                                `,
                                icon: 'success',
                                iconColor: '#ffd700',
                                confirmButtonColor: '#ad2121',
                                confirmButtonText: 'OK',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = '/quadrinhos';
                            });
                            
                            console.log(res);
                        } else {
                            marvelSwal({
                                title: 'ERRO! ??',
                                text: res.msg || 'Não foi possível excluir o quadrinho.',
                                icon: 'error',
                                iconColor: '#ad2121',
                                confirmButtonColor: '#ad2121'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log("Erro ao deletar:", xhr.responseText);
                        
                        // Sweet Alert de erro na exclusão (se não for 403, que já foi tratado globalmente)
                        if(xhr.status !== 403){
                            marvelSwal({
                                title: 'ERRO! ??',
                                text: xhr.responseJSON?.msg || 'Não foi possível excluir o quadrinho.',
                                icon: 'error',
                                iconColor: '#ad2121',
                                confirmButtonColor: '#ad2121'
                            });
                        }
                    }
                });
            }
        });
    });

});
