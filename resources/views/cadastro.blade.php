<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel - Cadastro de Usuário</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* Tema Marvel - Estilos personalizados */
    :root {
        --marvel-red: #e23636;
        --marvel-dark-red: #9b1d1d;
        --marvel-black: #202020;
        --marvel-gray: #504a4a;
        --marvel-light-gray: #f5f5f5;
        --marvel-gold: #f78f3f;
        --marvel-blue: #518bba;
        --marvel-dark-blue: #2d4b6e;
    }
    
    body {
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0a0a0a 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        margin: 0;
        position: relative;
        overflow-x: hidden;
    }
    
    /* Efeito de fundo com heróis */
    body::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><path d="M50 15 L61 40 L88 44 L67 60 L72 88 L50 73 L28 88 L33 60 L12 44 L39 40 Z" fill="%23e23636"/><circle cx="50" cy="50" r="8" fill="%23f78f3f"/></svg>');
        background-size: 150px 150px;
        background-repeat: repeat;
        pointer-events: none;
        z-index: 0;
    }
    
    /* Container do card */
    .container-card {
        max-width: 900px;
        width: 100%;
        position: relative;
        z-index: 1;
    }
    
    /* Card principal */
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(226, 54, 54, 0.4);
        overflow: hidden;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(226, 54, 54, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 60px rgba(226, 54, 54, 0.5);
    }
    
    /* Header do card */
    .card-header-marvel {
        background: linear-gradient(135deg, var(--marvel-red) 0%, var(--marvel-dark-red) 70%, #5a0e0e 100%);
        color: white;
        padding: 25px 30px;
        border-bottom: 4px solid var(--marvel-gold);
        position: relative;
        overflow: hidden;
    }
    
    .card-header-marvel::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,215,0,0.2) 0%, rgba(226,54,54,0.1) 50%, transparent 70%);
        animation: pulse 3s infinite ease-in-out;
    }
    
    .card-header-marvel::after {
        content: '★';
        position: absolute;
        bottom: 5px;
        right: 20px;
        font-size: 3rem;
        color: rgba(255, 215, 0, 0.2);
        font-family: Arial, sans-serif;
        transform: rotate(15deg);
    }
    
    .card-header-marvel h5 {
        font-size: 2rem;
        font-weight: 900;
        letter-spacing: 2px;
        margin: 0;
        position: relative;
        text-shadow: 3px 3px 0 rgba(0,0,0,0.3);
        font-family: 'Arial Black', 'Impact', sans-serif;
        background: white;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    
    .card-header-marvel h5 i {
        background: rgba(255,255,255,0.2);
        padding: 10px;
        border-radius: 50%;
        margin-right: 15px;
        box-shadow: 0 0 20px gold;
    }
    
    /* Corpo do card */
    .card-body {
        padding: 35px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        position: relative;
    }
    
    .card-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, transparent, var(--marvel-red), var(--marvel-gold), var(--marvel-red), transparent);
    }
    
    /* Labels */
    .form-label {
        font-weight: 800;
        color: var(--marvel-black);
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .form-label i {
        color: var(--marvel-red);
        font-size: 1.1rem;
        background: rgba(226, 54, 54, 0.1);
        padding: 5px;
        border-radius: 50%;
    }
    
    .form-label.required:after {
        content: " *";
        color: var(--marvel-red);
        font-weight: bold;
        font-size: 1.2rem;
        animation: blink 1.5s infinite;
    }
    
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    /* Campos do formulário */
    .form-control, .form-select {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 14px 18px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        font-size: 1rem;
        background: white;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--marvel-red);
        box-shadow: 0 0 0 0.3rem rgba(226, 54, 54, 0.25), 0 5px 15px rgba(226, 54, 54, 0.3);
        outline: none;
        transform: scale(1.02);
    }
    
    .form-control:hover, .form-select:hover {
        border-color: var(--marvel-gold);
        box-shadow: 0 5px 15px rgba(247, 143, 63, 0.2);
    }
    
    /* Estilo para campos obrigatórios */
    input:required, select:required {
        border-left: 5px solid var(--marvel-red);
        background: linear-gradient(to right, rgba(226, 54, 54, 0.02), white);
    }
    
    /* Texto de ajuda */
    .form-text {
        color: var(--marvel-gray);
        font-size: 0.85rem;
        margin-top: 8px;
        font-style: italic;
        background: rgba(226, 54, 54, 0.05);
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
    }
    
    .form-text i {
        margin-right: 6px;
        color: var(--marvel-gold);
        font-size: 0.9rem;
    }
    
    /* Botões */
    .btn-marvel {
        background: linear-gradient(135deg, var(--marvel-red) 0%, var(--marvel-dark-red) 50%, #5a0e0e 100%);
        color: white;
        border: none;
        padding: 14px 35px;
        border-radius: 50px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(226, 54, 54, 0.4);
    }
    
    .btn-marvel::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .btn-marvel:hover::before {
        left: 100%;
    }
    
    .btn-marvel:hover {
        background: transparent;
        border-color: var(--marvel-red);
        color: var(--marvel-red);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 25px rgba(226, 54, 54, 0.5);
    }
    
    .btn-marvel i {
        margin-right: 10px;
        font-size: 1.2rem;
        animation: shake 2s infinite;
    }
    
    @keyframes shake {
        0%, 100% { transform: rotate(0deg); }
        10% { transform: rotate(15deg); }
        20% { transform: rotate(-15deg); }
        30% { transform: rotate(0deg); }
    }
    
    .btn-danger {
        background: linear-gradient(135deg, #6c757d 0%, #495057 50%, #2c3e50 100%);
        border: none;
        padding: 14px 35px;
        border-radius: 50px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }
    
    .btn-danger::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transition: left 0.5s ease;
    }
    
    .btn-danger:hover::before {
        left: 100%;
    }
    
    .btn-danger:hover {
        background: transparent;
        border-color: #6c757d;
        color: #6c757d;
        transform: translateY(-3px);
    }
    
    .btn-danger i {
        margin-right: 10px;
        animation: bounce 1s infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }
    
    /* Gap entre botões */
    .gap-2 {
        gap: 20px !important;
    }
    
    /* Placeholder styling */
    ::placeholder {
        color: #bbb;
        font-style: italic;
        font-size: 0.95rem;
        opacity: 0.8;
    }
    
    /* Logo Marvel */
    .marvel-logo {
        text-align: center;
        margin-bottom: 25px;
        position: relative;
    }
    
    .marvel-logo h1 {
        font-family: 'Arial Black', 'Impact', sans-serif;
        font-size: 4rem;
        color: white;
        text-shadow: 4px 4px 0 var(--marvel-red), 8px 8px 0 rgba(0,0,0,0.5), 12px 12px 20px rgba(0,0,0,0.5);
        letter-spacing: 8px;
        margin: 0;
        animation: logoGlow 2s infinite alternate;
    }
    
    @keyframes logoGlow {
        from { text-shadow: 4px 4px 0 var(--marvel-red), 8px 8px 0 rgba(0,0,0,0.5), 0 0 20px rgba(226,54,54,0.5); }
        to { text-shadow: 4px 4px 0 var(--marvel-red), 8px 8px 0 rgba(0,0,0,0.5), 0 0 40px rgba(226,54,54,0.8); }
    }
    
    .marvel-logo p {
        color: rgba(255,255,255,0.9);
        font-size: 1.2rem;
        margin-top: 10px;
        background: linear-gradient(90deg, transparent, rgba(226,54,54,0.3), transparent);
        padding: 8px 20px;
        display: inline-block;
        border-radius: 50px;
        backdrop-filter: blur(5px);
    }
    
    .marvel-logo p i {
        color: var(--marvel-gold);
        animation: spin 4s linear infinite;
        display: inline-block;
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    /* Background com efeito de quadrinhos */
    .comic-pattern {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20px 20px, rgba(226,54,54,0.1) 2px, transparent 2px),
            linear-gradient(45deg, rgba(0,0,0,0.1) 25%, transparent 25%),
            linear-gradient(-45deg, rgba(0,0,0,0.1) 25%, transparent 25%);
        background-size: 40px 40px, 80px 80px, 80px 80px;
        background-position: 0 0, 0 0, 40px 40px;
        pointer-events: none;
        z-index: -1;
        animation: movePattern 20s linear infinite;
    }
    
    @keyframes movePattern {
        from { background-position: 0 0, 0 0, 40px 40px; }
        to { background-position: 40px 40px, 80px 80px, 120px 120px; }
    }
    
    /* Animações */
    @keyframes pulse {
        0%, 100% {
            opacity: 0.3;
            transform: scale(1);
        }
        50% {
            opacity: 0.8;
            transform: scale(1.1);
        }
    }
    
    /* Footer do card */
    .card-footer-marvel {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        border-top: 3px solid var(--marvel-gold);
        padding: 15px 30px;
        position: relative;
        overflow: hidden;
    }
    
    .card-footer-marvel::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 0;
        right: 0;
        height: 10px;
        background: linear-gradient(90deg, var(--marvel-red), var(--marvel-gold), var(--marvel-red));
        filter: blur(5px);
    }
    
    .security-badge {
        display: flex;
        justify-content: space-around;
        align-items: center;
        color: #fff;
        font-size: 0.95rem;
        text-shadow: 1px 1px 2px black;
    }
    
    .security-badge span {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 5px 15px;
        border-radius: 30px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(226,54,54,0.3);
    }
    
    .security-badge i {
        color: var(--marvel-gold);
        font-size: 1.1rem;
        animation: glow 1.5s infinite alternate;
    }
    
    @keyframes glow {
        from { filter: drop-shadow(0 0 2px gold); }
        to { filter: drop-shadow(0 0 8px gold); }
    }
    
    /* Checkbox personalizado */
    .form-check-input {
        width: 1.2rem;
        height: 1.2rem;
        margin-right: 10px;
        border: 2px solid var(--marvel-red);
        cursor: pointer;
    }
    
    .form-check-input:checked {
        background-color: var(--marvel-red);
        border-color: var(--marvel-gold);
        box-shadow: 0 0 10px rgba(226,54,54,0.5);
    }
    
    .form-check-label {
        color: var(--marvel-gray);
        font-weight: 500;
    }
    
    .form-check-label a {
        transition: all 0.3s ease;
        position: relative;
    }
    
    .form-check-label a:hover {
        color: var(--marvel-gold) !important;
        text-decoration: underline !important;
    }
    
    .form-check-label a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--marvel-gold);
        transition: width 0.3s ease;
    }
    
    .form-check-label a:hover::after {
        width: 100%;
    }
    
    /* Link para login */
    .text-center a {
        transition: all 0.3s ease;
        padding: 8px 20px;
        border-radius: 50px;
        display: inline-block;
    }
    
    .text-center a:hover {
        background: rgba(226,54,54,0.2);
        transform: translateX(5px);
        letter-spacing: 1px;
    }
    
    .text-center a i {
        transition: transform 0.3s ease;
    }
    
    .text-center a:hover i {
        transform: translateX(5px);
    }
    
    /* Responsividade aprimorada */
    @media (max-width: 768px) {
        .card-header-marvel h5 {
            font-size: 1.4rem;
        }
        
        .card-header-marvel h5 i {
            padding: 5px;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .btn-marvel, .btn-danger {
            padding: 12px 20px;
            font-size: 0.9rem;
            width: 100%;
        }
        
        .d-flex {
            flex-direction: column;
        }
        
        .gap-2 {
            gap: 12px !important;
        }
        
        .marvel-logo h1 {
            font-size: 2.8rem;
            letter-spacing: 4px;
        }
        
        .security-badge {
            flex-direction: column;
            gap: 10px;
        }
        
        .security-badge span {
            width: 100%;
            justify-content: center;
        }
    }
    
    @media (max-width: 576px) {
        .container-card {
            padding: 10px;
        }
        
        .card-header-marvel {
            padding: 20px;
        }
        
        .marvel-logo h1 {
            font-size: 2.2rem;
        }
        
        .marvel-logo p {
            font-size: 1rem;
        }
    }
    
    /* Efeitos de brilho nos campos */
    .form-control:valid {
        border-left-color: #28a745;
    }
    
    /* Scrollbar personalizada */
    ::-webkit-scrollbar {
        width: 10px;
    }
    
    ::-webkit-scrollbar-track {
        background: #1a1a1a;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--marvel-red), var(--marvel-dark-red));
        border-radius: 5px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, var(--marvel-dark-red), var(--marvel-red));
    }
</style>
</head>
<body>
    <div class="comic-pattern"></div>
    
    <div class="container-card">
        <!-- Logo Marvel -->
        <div class="marvel-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Marvel_Logo.svg/3840px-Marvel_Logo.svg.png" style="height:130px">
        </div>
        
        <!-- Card Principal -->
        <div class="card">
            <div class="card-header card-header-marvel">
                <h5 class="mb-0" id="form-title">
                    <i class="bi bi-person-plus-fill me-2"></i>
                    Cadastrar Novo Usuário
                </h5>
            </div>
            
            <div class="card-body">
                <form id="user-form">
                    <input type="hidden" id="usuario_id" 
                    
                    <!-- Linha 1: Nome completo e Email -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nome" class="form-label required">
                                <i class="bi bi-person-fill me-1"></i> Nome Completo
                            </label>
                            <input type="text" class="form-control" 
                                   id="nome" name="nome" placeholder="Peter Parker" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i>
                                Digite seu nome completo (ex: João Silva Santos)
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label required">
                                <i class="bi bi-envelope-fill me-1"></i> E-mail
                            </label>
                            <input type="email" class="form-control" 
                                   id="email" name="email" placeholder="peter.parker@marvel.com" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i>
                                Digite um e-mail válido (ex: joao.silva@email.com)
                            </div>
                        </div>
                    </div>
                    
                    <!-- Linha 2: Senha e Telefone -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="senha" class="form-label required">
                                <i class="bi bi-lock-fill me-1"></i> Senha
                            </label>
                            <input type="password" class="form-control" 
                                   id="senha" name="senha" minlength="6" placeholder="••••••" required>
                            <div class="form-text">
                                <i class="bi bi-shield-check"></i>
                                Mínimo de 6 caracteres
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="telefone" class="form-label required">
                                <i class="bi bi-telephone-fill me-1"></i> Telefone
                            </label>
                            <input type="tel" class="form-control"  
                                   id="telefone" name="telefone" placeholder="(11) 99999-9999" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i>
                                Digite seu telefone com DDD
                            </div>
                        </div>
                    </div>
                    
                    <!-- Linha 3: Data de Nascimento e Gênero -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nascimento" class="form-label required">
                                <i class="bi bi-calendar-date-fill me-1"></i> Data de Nascimento
                            </label>
                            <input type="date" class="form-control"  
                                   id="nascimento" name="nascimento" max="2024-12-31" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i>
                                Selecione sua data de nascimento
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="genero" class="form-label required">
                                <i class="bi bi-gender-ambiguous me-1"></i> Gênero
                            </label>
                            <select class="form-select" id="genero" name="genero" required>
                                <option value="">Selecione o gênero</option>
                                <option value="Masculino" >Masculino</option>
                                <option value="Feminino" >Feminino</option>
                                <option value="Não binário">Não binário</option>
                                <option value="Outro" >Outro</option>
                               
                            </select>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i>
                                Escolha uma opção
                            </div>
                        </div>
                    </div>
                    
                    <!-- Termos e Condições -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termos" required>
                                <label class="form-check-label" for="termos">
                                    Eu aceito os <a href="#" style="color: var(--marvel-red); text-decoration: none; font-weight: 600;">Termos e Condições</a> 
                                    e a <a href="#" style="color: var(--marvel-red); text-decoration: none; font-weight: 600;">Política de Privacidade</a> da Marvel
                                </label>
                            </div>
                        </div>
                    </div>
                
                    <!-- Botões de ação -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-danger" id="botao-deletar">
                            <i class="bi bi-trash"></i> Cancelar
                        </button>
                        <button type="button" class="btn btn-marvel" id="botao">
                            <i class="bi bi-save"></i> Cadastrar Usuário
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Footer do card -->
            <div class="card-footer-marvel">
                <div class="security-badge">
                    <span><i class="bi bi-shield-check"></i> Dados protegidos</span>
                    <span><i class="bi bi-lock-fill"></i> Conexão segura</span>
                    <span><i class="bi bi-emoji-smile"></i> Junte-se aos heróis</span>
                </div>
            </div>
        </div>
        
        <!-- Link para login -->
       
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
   <script>
        $(document).ready(function(){

    


    $("#botao").click(function(){

        $.ajax({
            url: "../api/cadastro_usuario" ,
            method: "POST",
            data: { 
               nome:$("#nome").val(),
            email: $("#email").val(),
                senha: $("#senha").val(),
                telefone: $("#telefone").val(),
                nascimento: $("#nascimento").val(),
                genero: $("#genero").val(),
                
             },
           success: function (res) {

    Swal.fire({
        title: 'BEM-VINDO! ⚡',
        text: 'Redirecionando...',
        icon: 'success',
        iconColor: '#ffd700',
        confirmButtonColor: '#ad2121',
        background: '#fff',
        timer: 1500,
        showConfirmButton: false
    });
    
    console.log(res);
    
    setTimeout(function() {
        window.location.href = '/entrar';
    }, 1500);
},

        });

    });



});
    </script>
</body>
</html>