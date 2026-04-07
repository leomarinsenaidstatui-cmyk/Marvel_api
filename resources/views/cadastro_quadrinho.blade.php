@extends('layouts.navbar')
   
@section('content')

  <script src="quadrinhos.js"></script>
             
            <div class="card-header card-header-marvel" style="margin-top:50px ">
                <h5 class="mb-0" id="form-title">Cadastrar Novo Quadrinho</h5>
            </div>
            <div class="card-body">
                <form id="hero-form">
                 
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome" class="form-label required">Nome</label>
                            <input type="text" class="form-control"  id="nome" name="nome" required>
                            <div class="form-text">Nome  do Quadrinho </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="heroi" class="form-label required">Heroi</label>
                            <input type="text" class="form-control" id="heroi" name="heroi" required>
                            <div class="form-text">Nome de herói (ex: Homem-Aranha)</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="autor" class="form-label required">Autor</label>
                            <input type="text" class="form-control"  id="autor" name="autor" required>
                            <div class="form-text">Autor do Quadrinho</div>
                        </div>
                        
                        <div class="col-md-9 mb-3">
                            <label for="ilustrador" class="form-label required">Ilustrador</label>
                            <input type="text" class="form-control"  id="ilustrador" name="ilustrador" required>
                            <div class="form-text">Ilustrador do Quadrinho</div>
                        </div>
                    </div>


                    <div class="col-md-9 mb-3">
                            <label for="editora" class="form-label required">Editora</label>
                            <input type="text" class="form-control"  id="editora" name="editora" required>
                            <div class="form-text">Editora do Quadrinho </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="data_de_lancamento" class="form-label required">Data de Lançamento</label>
                            <input type="date" class="form-control"  id="data_de_lancamento" name="data_de_lancamento" min="1940" max="2026" required>
                            <div class="form-text">Ano de Lançamento do quadrinho (ex: 1962)</div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
    
    <button type="button" class="btn btn-marvel" id="button">
        <i class="bi bi-save"></i> Lançar Quadrinho 
    </button>
</div>
                    </div>
                    
                    
         
@endsection         
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   





    


    
