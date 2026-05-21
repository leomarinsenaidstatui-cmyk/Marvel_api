<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marvel - Autenticação em Duas Etapas</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="/autenticacao_dupla.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background: #0a0a0a;
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* Navbar */
        .navbar {
            background: #000000;
            padding: 0;
            border-bottom: 1px solid #1a1a1a;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            border-bottom: 1px solid #1a1a1a;
        }
        
        .navbar-logo {
            width: 120px;
            height: auto;
            display: block;
        }
        
        .navbar-logo img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .navbar-right {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .navbar-right a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .navbar-right a:hover {
            background: #e62429;
            color: #fff;
        }
        
        .navbar-menu {
            display: flex;
            justify-content: center;
            gap: 0;
            overflow-x: auto;
            white-space: nowrap;
            padding: 0 1rem;
        }
        
        .navbar-menu a {
            color: #ccc;
            text-decoration: none;
            padding: 1rem 1.2rem;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }
        
        .navbar-menu a:hover,
        .navbar-menu a.active {
            color: #fff;
            border-bottom-color: #e62429;
        }
        
        /* Container principal */
        .main-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 3rem 2rem;
            min-height: calc(100vh - 150px);
            display: flex;
            align-items: center;
        }
        
        /* Card de autenticação */
        .auth-card {
            background: #141414;
            border-radius: 12px;
            border: 1px solid #2a2a2a;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            width: 100%;
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .auth-header {
            background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
            padding: 2rem;
            border-bottom: 3px solid #e62429;
            position: relative;
            text-align: center;
        }
        
        .auth-header h2 {
            font-size: 1.8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        
        .auth-header h2 i {
            color: #e62429;
            font-size: 2rem;
        }
        
        .auth-header p {
            color: #999;
            margin-top: 0.5rem;
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        
        .auth-body {
            padding: 2rem;
        }
        
        /* Formulário */
        .form-label {
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.5rem;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-label i {
            color: #e62429;
            font-size: 1rem;
        }
        
        .form-label.required:after {
            content: "*";
            color: #e62429;
            margin-left: 4px;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group-text {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-right: none;
            border-radius: 8px 0 0 8px;
            color: #e62429;
        }
        
        .form-control {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: #1f1f1f;
            border-color: #e62429;
            box-shadow: 0 0 0 3px rgba(230, 36, 41, 0.2);
            color: #fff;
            outline: none;
        }
        
        .form-control::placeholder {
            color: #666;
        }
        
        /* Estilo específico para o código (input com números grandes) */
        .code-input {
            text-align: center;
            font-size: 1.5rem;
            letter-spacing: 8px;
            font-weight: 700;
        }
        
        /* Botão */
        .btn-marvel {
            background: #e62429;
            color: #fff;
            border: none;
            padding: 0.9rem 2rem;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            width: 100%;
            font-size: 1rem;
        }
        
        .btn-marvel:hover {
            background: #ff2e35;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(230, 36, 41, 0.3);
            color: #fff;
        }
        
        .btn-marvel i {
            font-size: 1.2rem;
        }
        
        /* Informações adicionais */
        .info-box {
            background: rgba(230, 36, 41, 0.1);
            border-left: 3px solid #e62429;
            padding: 1rem;
            margin-top: 1.5rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .info-box i {
            color: #e62429;
            font-size: 1.5rem;
        }
        
        .info-box p {
            margin: 0;
            font-size: 0.85rem;
            color: #ccc;
            line-height: 1.4;
        }
        
        .info-box strong {
            color: #fff;
        }
        
        /* Link para reenviar código */
        .resend-link {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .resend-link a {
            color: #888;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .resend-link a:hover {
            color: #e62429;
            gap: 0.8rem;
        }
        
        /* Footer do card */
        .auth-footer {
            background: #0f0f0f;
            padding: 1rem 2rem;
            border-top: 1px solid #1a1a1a;
        }
        
        .security-badge {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        
        .security-badge span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            font-size: 0.8rem;
        }
        
        .security-badge i {
            color: #e62429;
            font-size: 0.9rem;
        }
        
        /* Footer principal */
        .footer {
            background: #000000;
            padding: 2rem 0 1rem;
            border-top: 1px solid #1a1a1a;
        }
        
        .footer-bottom {
            text-align: center;
            color: #666;
            font-size: 0.8rem;
        }
        
        /* Responsivo */
        @media (max-width: 768px) {
            .navbar-logo {
                width: 80px;
            }
            
            .navbar-top {
                padding: 0.8rem 1rem;
            }
            
            .navbar-right a {
                padding: 0.3rem 0.8rem;
                font-size: 0.8rem;
            }
            
            .main-container {
                padding: 1.5rem;
            }
            
            .auth-header h2 {
                font-size: 1.3rem;
            }
            
            .auth-body {
                padding: 1.5rem;
            }
            
            .security-badge {
                gap: 1rem;
                flex-direction: column;
                align-items: center;
            }
            
            .code-input {
                font-size: 1.2rem;
                letter-spacing: 4px;
            }
        }
        
        @media (max-width: 576px) {
            .auth-header h2 {
                font-size: 1.1rem;
            }
            
            .btn-marvel {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
            }
            
            .info-box {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-top">
            <a href="/" class="navbar-logo">
                <img src="{{ asset('marvel-removebg-preview(1).png') }}" alt="Marvel Logo">
            </a>
            <div class="navbar-right">
                <a href="{{route('cadastro')}}">CADASTRO</a>
                <a href="{{route('entrar')}}">LOGIN</a>
            </div>
        </div>
        <div class="navbar-menu">
            <a href="/">NEWS</a>
            <a href="#">COMICS</a>
            <a href="#">CHARACTERS</a>
            <a href="#">GAMES</a>
            <a href="#">MOVIES</a>
            <a href="#">TV SHOWS</a>
            <a href="#">MORE</a>
        </div>
    </nav>
    
    <div class="main-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>
                    <i class="bi bi-shield-lock-fill"></i>
                    Verificação em Duas Etapas
                </h2>
                <p>Proteção extra para sua conta Marvel</p>
            </div>
            
            <div class="auth-body">
                <form id="auth-form">
                    <!-- Email (oculto visualmente mas funcional) -->
                    <div class="mb-4">
                        <label for="email" class="form-label required">
                            <i class="bi bi-envelope-fill"></i> E-mail
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" 
                                   id="email" name="email" 
                                   placeholder="seu@email.com" 
                                   required>
                        </div>
                    </div>
                    
                    <!-- Código de Autenticação -->
                    <div class="mb-4">
                        <label for="codigo" class="form-label required">
                            <i class="bi bi-key-fill"></i> Código de Autenticação
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-digit"></i>
                            </span>
                            <input type="text" class="form-control code-input" 
                                   id="codigo" name="codigo" 
                                   placeholder="000000" 
                                   maxlength="6"
                                   autocomplete="off"
                                   required>
                        </div>
                        <div class="form-text mt-2">
                            <i class="bi bi-info-circle"></i> Digite o código de 6 dígitos enviado para seu e-mail
                        </div>
                    </div>
                    
                    <!-- Botão de Envio -->
                    <button type="button" class="btn-marvel" id="enviar_Codigo">
                        <i class="bi bi-check-circle"></i> Verificar Código
                    </button>
                    
                    <!-- Informações adicionais -->
                    <div class="info-box">
                        <i class="bi bi-shield-check"></i>
                        <p>
                            <strong>Proteção máxima</strong><br>
                            A verificação em duas etapas garante que apenas você tenha acesso à sua conta, mesmo que sua senha seja comprometida.
                        </p>
                    </div>
                    
                    <!-- Link para reenviar código -->
                    <div class="resend-link">
                        <a href="#" id="reenviar-codigo">
                            <i class="bi bi-arrow-repeat"></i> Não recebeu o código? Reenviar
                        </a>
                    </div>
                </form>
            </div>
            
            <!-- Footer do card -->
            <div class="auth-footer">
                <div class="security-badge">
                    <span><i class="bi bi-shield-check"></i> Criptografia AES-256</span>
                    <span><i class="bi bi-lock-fill"></i> Conexão Segura</span>
                    <span><i class="bi bi-incognito"></i> Dados Protegidos</span>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p>© 2025 MARVEL & © 2025 Marvel Studios. Todos os direitos reservados. | Excelsior! ⚡</p>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function(){
            // Feedback visual para o botão
            $("#enviar_Codigo").click(function(){
                const $btn = $(this);
                const originalText = $btn.html();
                
                // Validação básica
                const email = $("#email").val();
                const codigo = $("#codigo").val();
                
                if(!email) {
                    alert("Por favor, digite seu e-mail.");
                    return;
                }
                
                if(!codigo) {
                    alert("Por favor, digite o código de autenticação.");
                    return;
                }
                
                if(codigo.length < 6) {
                    alert("O código deve ter 6 dígitos.");
                    return;
                }
                
                // Mostrar estado de carregamento
                $btn.html('<i class="bi bi-hourglass-split"></i> Verificando...').prop('disabled', true);
                
                // Simular um pequeno delay para feedback visual
                setTimeout(() => {
                    $btn.html(originalText).prop('disabled', false);
                }, 3000);
            });
            
            // Função para reenviar código (pode ser adaptada conforme necessidade)
            $("#reenviar-codigo").click(function(e){
                e.preventDefault();
                const email = $("#email").val();
                
                if(!email) {
                    alert("Por favor, digite seu e-mail para reenviar o código.");
                    $("#email").focus();
                    return;
                }
                
                // Aqui você pode adicionar a lógica para reenviar o código
                alert("Um novo código foi enviado para " + email + ". Verifique sua caixa de entrada.");
            });
            
            // Permitir apenas números no campo de código
            $("#codigo").on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
            });
            
            // Auto-focus no campo de código
            $("#codigo").focus();
        });
    </script>
</body>
</html>