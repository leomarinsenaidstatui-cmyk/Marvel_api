<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel - Login</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
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
        max-width: 500px;
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
        font-size: 1.8rem;
        font-weight: 900;
        letter-spacing: 2px;
        margin: 0;
        position: relative;
        text-shadow: 3px 3px 0 rgba(0,0,0,0.3);
        font-family: 'Arial Black', 'Impact', sans-serif;
        background: linear-gradient(180deg, #fff, #faf9f6);
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
        -webkit-text-fill-color: white;
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
    
    /* Input groups */
    .input-group {
        position: relative;
    }
    
    .input-group-text {
        border: 2px solid #e0e0e0 !important;
        border-right: none !important;
        border-radius: 10px 0 0 10px !important;
        background: linear-gradient(135deg, #f8f9fa, #ffffff) !important;
        transition: all 0.3s ease;
    }
    
    .input-group-text i {
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    
    .form-control {
        border: 2px solid #e0e0e0 !important;
        border-left: none !important;
        border-radius: 0 10px 10px 0 !important;
        padding: 14px 18px !important;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
        font-size: 1rem;
        background: white;
    }
    
    .form-control:focus {
        border-color: var(--marvel-red) !important;
        box-shadow: 0 0 0 0.3rem rgba(226, 54, 54, 0.25) !important;
        outline: none;
        transform: scale(1.02);
    }
    
    .form-control:hover {
        border-color: var(--marvel-gold) !important;
    }
    
    .input-group:focus-within .input-group-text {
        border-color: var(--marvel-red) !important;
        box-shadow: -5px 0 0 rgba(226, 54, 54, 0.25);
    }
    
    .input-group:focus-within .input-group-text i {
        color: var(--marvel-gold) !important;
        transform: scale(1.1);
    }
    
    /* Estilo para campos obrigatórios */
    input:required {
        border-left: 4px solid var(--marvel-red) !important;
    }
    
    /* Botão Marvel */
    .btn-marvel {
        background: linear-gradient(135deg, var(--marvel-red) 0%, var(--marvel-dark-red) 50%, #5a0e0e 100%);
        color: white;
        border: none;
        padding: 16px 30px;
        border-radius: 50px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(226, 54, 54, 0.4);
        width: 100%;
        font-size: 1.1rem;
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
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 10px 25px rgba(226, 54, 54, 0.5);
    }
    
    .btn-marvel i {
        margin-right: 10px;
        font-size: 1.3rem;
        animation: shake 2s infinite;
    }
    
    @keyframes shake {
        0%, 100% { transform: rotate(0deg); }
        10% { transform: rotate(15deg); }
        20% { transform: rotate(-15deg); }
        30% { transform: rotate(0deg); }
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
    
    /* Lembrar-me */
    .remember-me {
        display: flex;
        align-items: center;
        margin: 20px 0;
        padding: 5px 10px;
        background: rgba(226, 54, 54, 0.05);
        border-radius: 30px;
        transition: all 0.3s ease;
    }
    
    .remember-me:hover {
        background: rgba(226, 54, 54, 0.1);
        transform: translateX(5px);
    }
    
    .remember-me input {
        margin-right: 10px;
        width: 1.2rem;
        height: 1.2rem;
        accent-color: var(--marvel-red);
        cursor: pointer;
    }
    
    .remember-me label {
        color: var(--marvel-gray) !important;
        font-weight: 500;
        cursor: pointer;
        transition: color 0.3s ease;
    }
    
    .remember-me:hover label {
        color: var(--marvel-red) !important;
    }
    
    /* Links */
    .login-links {
        text-align: center;
        margin-top: 25px;
        padding: 10px 0;
    }
    
    .login-links a {
        color: var(--marvel-gray);
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        padding: 5px 15px;
        border-radius: 50px;
        display: inline-block;
    }
    
    .login-links a:hover {
        color: var(--marvel-red);
        background: rgba(226, 54, 54, 0.1);
        transform: translateY(-2px);
    }
    
    .login-links a i {
        margin-right: 5px;
        transition: transform 0.3s ease;
    }
    
    .login-links a:hover i {
        transform: scale(1.2);
    }
    
    .login-links .separator {
        color: var(--marvel-gold);
        font-weight: bold;
        font-size: 1.2rem;
    }
    
    /* Placeholder styling */
    ::placeholder {
        color: #bbb;
        font-style: italic;
        font-size: 0.95rem;
        opacity: 0.8;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .card-header-marvel h5 {
            font-size: 1.4rem;
        }
        
        .card-header-marvel h5 i {
            padding: 8px;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .marvel-logo h1 {
            font-size: 3rem;
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
        
        .btn-marvel {
            padding: 14px 25px;
            font-size: 1rem;
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
            font-size: 2.5rem;
        }
        
        .marvel-logo p {
            font-size: 1rem;
        }
        
        .login-links a {
            display: block;
            margin: 5px 0;
        }
        
        .login-links .separator {
            display: none;
        }
    }
    
    /* Efeitos de brilho nos campos */
    .form-control:valid {
        border-left-color: #28a745 !important;
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
    
    /* Animação de carregamento para o botão */
    .btn-marvel:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    .btn-marvel:disabled i {
        animation: spin 1s linear infinite;
    }
</style>
</head>
<body>
    <div class="comic-pattern"></div>
    
    <div class="container-card">
        <!-- Logo Marvel -->
        <div class="marvel-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Marvel_Logo.svg/3840px-Marvel_Logo.svg.png" style="height:115px" alt="">
            
        </div>
        
        <!-- Card Principal -->
        <div class="card">
            <div class="card-header card-header-marvel">
                <h5 class="mb-0" id="form-title">
                    <i class="bi bi-shield-lock-fill me-2"></i>
                    Acesso dos Heróis
                </h5>
            </div>
            
            <div class="card-body">
                <form id="login-form">
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label required">
                            <i class="bi bi-envelope-fill me-1"></i> E-mail
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0" style="border: 2px solid #e0e0e0; border-right: none;">
                                <i class="bi bi-envelope" style="color: var(--marvel-red);"></i>
                            </span>
                            <input type="email" class="form-control border-start-0" 
                                   id="email" name="email" 
                                   placeholder="peter.parker@marvel.com" 
                                   style="border-left: none;"
                                   required>
                        </div>
                    </div>
                    
                    <!-- Senha -->
                    <div class="mb-4">
                        <label for="senha" class="form-label required">
                            <i class="bi bi-lock-fill me-1"></i> Senha
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0" style="border: 2px solid #e0e0e0; border-right: none;">
                                <i class="bi bi-lock" style="color: var(--marvel-red);"></i>
                            </span>
                            <input type="password" class="form-control border-start-0" 
                                   id="senha" name="senha" 
                                   placeholder="••••••" 
                                   style="border-left: none;"
                                   required>
                        </div>
                    </div>
                    
                    <!-- Lembrar-me -->
                    <div class="remember-me">
                        <input type="checkbox" id="lembrar" name="lembrar">
                        <label for="lembrar" style="color: var(--marvel-gray);">Lembrar-me neste dispositivo</label>
                    </div>
                    
                    <!-- Botão de Login -->
                    <button type="button" class="btn btn-marvel" id="botao-login">
                        <i class="bi bi-box-arrow-in-right"></i> Entrar no Universo Marvel
                    </button>
                    
                  
                </form>
            </div>
            
            <!-- Footer do card -->
            <div class="card-footer-marvel">
                <div class="security-badge">
                    <span><i class="bi bi-shield-check"></i> Protegido</span>
                    <span><i class="bi bi-lock-fill"></i> Seguro</span>
                    <span><i class="bi bi-incognito"></i> Privado</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

    


    $("#botao-login").click(function(){

        $.ajax({
            url: "../api/login_novo" ,
            method: "GET",
            data: { 
               
            email: $("#email").val(),
            senha: $("#senha").val(),
                
                
             },

             
            success: function (res) {
                console.log(res);
                if(res['erro']=='n'){
                    alert(res['token'])
                    $.cookie('token',res['token'],{expire:7});
                    setTimeout(function() {
                        window.location.href="/herois";
                        
                    }, 2000);

                   
                }else{
                alert("Usuario nao Encontrado");
                console.log(res);
                
            }
            },
            

        });

    });



});
    </script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
     
</body>
</html>