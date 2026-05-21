@extends('layouts.navbar')

@section('content')
    <div class="card-header card-header-marvel" style="margin-top: 50px">
        <h5 class="mb-0" id="form-title">Editar Quadrinho</h5>
    </div>
    <div class="card-body">
        <form id="hero-form">
            <input type="hidden" id="quadrinho_id" value="{{ $quadrinho->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome" class="form-label required">Nome</label>
                    <input type="text" class="form-control" value="{{ $quadrinho->nome }}" id="nome" name="nome"
                        required>
                    <div class="form-text">Nome do Quadrinho</div>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="heroi" class="form-label required">Heroi</label>
                    <input type="text" class="form-control" value="{{ $quadrinho->heroi }}" id="heroi"
                        name="heroi" required>
                    <div class="form-text">Nome de herói (ex: Homem-Aranha)</div>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="heroi" class="form-label required">Autor</label>
                    <input type="text" class="form-control"value="{{ $quadrinho->autor }}" id="autor" name="autor"
                        required>
                    <div class="form-text">Nome do autor</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="ilustrador" class="form-label required">Ilustrador</label>
                    <input type="text" class="form-control" value="{{ $quadrinho->ilustrador }}" id="ilustrador"
                        name="ilustrador" required>
                    <div class="form-text">Idade atual do herói</div>
                </div>

                <div class="col-md-9 mb-3">
                    <label for="editora" class="form-label required">Editora</label>
                    <input type="text" class="form-control" value="{{ $quadrinho->editora }}" id="editora"
                        name="editora" required>
                    <div class="form-text">Habilidades separadas por vírgula (ex: Força sobre-humana, Teia, Sentido de
                        aranha)</div>
                </div>
            </div>



            <div class="col-md-6 mb-3">
                <label for="data_de_lancamento" class="form-label required">Primeira Aparição</label>
                <input type="date" class="form-control" value="{{ $quadrinho->data_de_lancamento }}"
                    id="data_de_lancamento" name="data_de_lancamento" min="1939" max="2026" required>
                <div class="form-text">Ano da primeira aparição em quadrinhos (ex: 1962)</div>
            </div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-danger" id="botao">
            <i class="bi bi-trash"></i> Deletar
        </button>
        <button type="button" class="btn btn-marvel" id="button">
            <i class="bi bi-save"></i> Alterar Quadrinho
        </button>
    </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        
        marvelSwal({
            title: '⚡ MARVEL QUADRINHOS ⚡',
            text: 'Sistema de quadrinhos carregado!',
            icon: 'success',
            iconColor: '#ffd700',
            confirmButtonColor: '#ad2121',
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
                url: "/api/edita_quadrinho",
                method: "PUT",
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
                    console.log("Status Pix:", res);
                    console.log(res);
                    
                    marvelSwal({
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
                },
                error: function(xhr) {
                    console.log("Erro ao consultar status Pix:", xhr.responseText);
                    
                    marvelSwal({
                        title: 'ERRO! 💥',
                        text: 'Não foi possível atualizar o quadrinho. Tente novamente.',
                        icon: 'error',
                        iconColor: '#ad2121',
                        confirmButtonColor: '#ad2121',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        $("#botao").click(function() {
            
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
                            console.log(res);
                            if(res['erro'] == 'n'){
                                
                                marvelSwal({
                                    title: 'QUADRINHO EXCLUÍDO! ⚡',
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
                                    title: 'ERRO! 💥',
                                    text: 'Não foi possível excluir o quadrinho.',
                                    icon: 'error',
                                    iconColor: '#ad2121',
                                    confirmButtonColor: '#ad2121'
                                });
                            }
                        },
                        error: function(xhr) {
                            console.log("Erro ao deletar:", xhr.responseText);
                            
                            marvelSwal({
                                title: 'ERRO! 💥',
                                text: 'Não foi possível excluir o quadrinho.',
                                icon: 'error',
                                iconColor: '#ad2121',
                                confirmButtonColor: '#ad2121'
                            });
                        }
                    });
                }
            });
        });

    });
</script>
@endsection
    
    .swal2-icon-warning {
        border-color: #ffd700 !important;
    }
    
    .swal2-icon-error {
        border-color: #ad2121 !important;
    }
`;
document.head.appendChild(style);
</script>
@endsection