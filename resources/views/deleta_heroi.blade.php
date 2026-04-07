<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚡ MARVEL STUDIOS - HERO DATABASE ⚡</title>
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   
    
   
             
            <div class="card-header card-header-marvel">
                <h5 class="mb-0" id="form-title">Cadastrar Novo Herói</h5>
            </div>
            <div class="card-body">
                <form id="hero-form">
                    <input type="hidden" id="heroi_id" value="{{$heroi->id}}">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome" class="form-label required">Nome</label>
                            <input type="text" class="form-control" value="{{$heroi->nome}}" id="nome" name="nome" required>
                            <div class="form-text">Nome real do herói (ex: Peter Parker)</div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="codinome" class="form-label required">Codinome</label>
                            <input type="text" disabled class="form-control"value="{{$heroi->codinome}}" id="codinome" name="codinome" required>
                            <div class="form-text">Nome de herói (ex: Homem-Aranha)</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="idade" class="form-label required">Idade</label>
                            <input type="number" disabled  class="form-control" value="{{$heroi->idade}}" id="idade" name="idade" min="0" required>
                            <div class="form-text">Idade atual do herói</div>
                        </div>
                        
                        <div class="col-md-9 mb-3">
                            <label for="habilidades" class="form-label required">Habilidades</label>
                            <input type="text" disabled class="form-control" value="{{$heroi->habilidades}}" id="habilidades" name="habilidades" required>
                            <div class="form-text">Habilidades separadas por vírgula (ex: Força sobre-humana, Teia, Sentido de aranha)</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="equipe" class="form-label required">Equipe</label>
                            <select class="form-select" value="{{$heroi->equipe}}" id="equipe" name="equipe" required>
                                <option value="">Selecione uma equipe</option>
                                <option value="Vingadores">Vingadores</option>
                                <option value="X-Men">X-Men</option>
                                <option value="Quarteto Fantástico">Quarteto Fantástico</option>
                                <option value="Guardiões da Galáxia">Guardiões da Galáxia</option>
                                <option value="Defensores">Defensores</option>
                                <option value="Irmandade de Mutantes">Irmandade de Mutantes</option>
                                <option value="Esquadrão Sinistro">Esquadrão Sinistro</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="primeira_aparicao" class="form-label required">Primeira Aparição</label>
                            <input type="number" disabled class="form-control" value="{{$heroi->primeira_aparicao}}" id="primeira_aparicao" name="primeira_aparicao" min="1939" max="2024" required>
                            <div class="form-text">Ano da primeira aparição em quadrinhos (ex: 1962)</div>
                        </div>
                    </div>
                
                 <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" >Cancelar</button>
                        <button type="button" class="btn btn-marvel" id="button">
                            <i class="bi bi-save"></i> Salvar Herói 
                        </button>
                    </div>
            </form>
        </div>
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){

    alert("TO FUNFANDO");


    $("#botao").click(function(){

        $.ajax({
            url: "../api/deleta_heroi" ,
            method: "DELETE",
            data: { 
               id_heroi:$("#heroi_id").val(),
            nome: $("#nome").val(),
                codinome: $("#codinome").val(),
                idade: $("#idade").val(),
                habilidades: $("#habilidades").val(),
                equipe: $("#equipe").val(),
                primeira_aparicao: $("#primeira_aparicao").val(),
            ano_lancamento:$("#ano_lancamento").val(),
             },
            success: function (res) {

                alert("deletado")
                console.log(res);
                window.location.href = '/herois'
            },

        });

    });



});
    </script>
</body>
</html>