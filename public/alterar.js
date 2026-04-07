$(document).ready(function(){
    alert("to funfando");

    $("#meuid").click(function(){
       $.ajax({
        url:"/api/altera_heroi",
        method:"PUT",
        data:{
            id_heroi:$("#id_heroi").val(),
            nome: $("#nome").val(),
                codinome: $("#codinome").val(),
                idade: $("#idade").val(),
                habilidades: $("#habilidades").val(),
                equipe: $("#equipe").val(),
                primeira_aparicao: $("#primeira_aparicao").val(),
            ano_lancamento:$("#ano_lancamento").val(),
        }, success: function (res) {
                console.log("Status Pix:", res);
                console.log(res);
                alert('deu bom');
               
            },
            error: function (xhr) {

                console.log("Erro ao consultar status Pix:", xhr.responseText);
            }
        });
    });

   

});