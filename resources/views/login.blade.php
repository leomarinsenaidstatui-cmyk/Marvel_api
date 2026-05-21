<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel - Login</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    
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
        }
        
        /* Card de login */
        .login-card {
            background: #141414;
            border-radius: 12px;
            border: 1px solid #2a2a2a;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }
        
        .login-header {
            background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
            padding: 2rem;
            border-bottom: 3px solid #e62429;
            position: relative;
            text-align: center;
        }
        
        .login-header h2 {
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
        
        .login-header h2 i {
            color: #e62429;
            font-size: 2rem;
        }
        
        .login-header p {
            color: #999;
            margin-top: 0.5rem;
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        
        .login-body {
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
            border-left: none;
            border-radius: 0 8px 8px 0;
            padding: 0.75rem 1rem;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: #1f1f1f;
            border-color: #e62429;
            box-shadow: none;
            color: #fff;
        }
        
        .input-group:focus-within .input-group-text {
            border-color: #e62429;
        }
        
        .form-control::placeholder {
            color: #666;
        }
        
        /* Lembrar-me */
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0;
            padding: 0.5rem 0;
        }
        
        .remember-me input {
            width: 1.1rem;
            height: 1.1rem;
            accent-color: #e62429;
            cursor: pointer;
        }
        
        .remember-me label {
            color: #ccc;
            font-size: 0.85rem;
            cursor: pointer;
            margin: 0;
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
        
        /* Link para cadastro */
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #2a2a2a;
        }
        
        .register-link p {
            color: #888;
            font-size: 0.85rem;
            margin: 0;
        }
        
        .register-link a {
            color: #e62429;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .register-link a:hover {
            gap: 0.8rem;
        }
        
        /* Footer do card */
        .login-footer {
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
            
            .login-header h2 {
                font-size: 1.3rem;
            }
            
            .login-body {
                padding: 1.5rem;
            }
            
            .security-badge {
                gap: 1rem;
                flex-direction: column;
                align-items: center;
            }
        }
        
        @media (max-width: 576px) {
            .login-header h2 {
                font-size: 1.1rem;
            }
            
            .btn-marvel {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
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
            <a href="/" class="active">NEWS</a>
            <a href="#">COMICS</a>
            <a href="#">CHARACTERS</a>
            <a href="#">GAMES</a>
            <a href="#">MOVIES</a>
            <a href="#">TV SHOWS</a>
            <a href="#">MORE</a>
        </div>
    </nav>
    
    <div class="main-container">
        <div class="login-card">
            <div class="login-header">
                <h2>
                    <i class="bi bi-shield-lock-fill"></i>
                    Acesso dos Heróis
                </h2>
                <p>Entre no universo Marvel e descubra aventuras épicas!</p>
            </div>
            
            <div class="login-body">
                <form id="login-form">
                    <!-- Email -->
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
                                   placeholder="peter.parker@marvel.com" 
                                   required>
                        </div>
                    </div>
                    
                    <!-- Senha -->
                    <div class="mb-4">
                        <label for="senha" class="form-label required">
                            <i class="bi bi-lock-fill"></i> Senha
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control" 
                                   id="senha" name="senha" 
                                   placeholder="••••••" 
                                   required>
                        </div>
                    </div>
                    
                    <!-- Lembrar-me -->
                    <div class="remember-me">
                        <input type="checkbox" id="lembrar" name="lembrar">
                        <label for="lembrar">Lembrar-me neste dispositivo</label>
                    </div>
                    
                    <!-- Botão de Login -->
                    <button type="button" class="btn-marvel" id="botao-login">
                        <i class="bi bi-box-arrow-in-right"></i> Entrar no Universo Marvel
                    </button>
                    
                    <div class="mt-3" style="text-align: center;">
                        <a href="{{ route('senha.esqueci') }}" style="color: #e62429; text-decoration: none; font-weight: 600;">Esqueci minha senha</a>
                    </div>
                    
                    <!-- Link para cadastro -->
                    <div class="register-link">
                        <p>Não tem uma conta? <a href="{{route('cadastro')}}">Cadastre-se agora <i class="bi bi-arrow-right"></i></a></p>
                    </div>
                </form>
            </div>
            
            <!-- Footer do card -->
            <div class="login-footer">
                <div class="security-badge">
                    <span><i class="bi bi-shield-check"></i> Protegido</span>
                    <span><i class="bi bi-lock-fill"></i> Seguro</span>
                    <span><i class="bi bi-incognito"></i> Privado</span>
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
            $("#botao-login").click(function(){
                // Feedback visual de carregamento
                const $btn = $(this);
                const originalText = $btn.html();
                $btn.html('<i class="bi bi-hourglass-split"></i> Entrando...').prop('disabled', true);
                
                $.ajax({
                    url: "../api/login_novo",
                    method: "GET",
                    data: { 
                        email: $("#email").val(),
                        senha: $("#senha").val(),
                    },
                    success: function (res) {
                        console.log(res);
                        if(res['erro'] == 'n'){
                            // Sucesso no login
                            $.cookie('token', res['token'], {expire: 7, path: '/'});
                            $.cookie('user_id', res['user_id'], {expire: 7, path: '/'});
                            
                            // Mostrar mensagem de sucesso
                            $btn.html('<i class="bi bi-check-circle"></i> Sucesso! Redirecionando...');
                            
                            setTimeout(function() {
                                window.location.href = "/herois";
                            }, 1500);
                        } else {
                            if (res['msg'] == 'autentica_ativa') {
                                // Precisa de autenticação em duas etapas
                                $btn.html(originalText).prop('disabled', false);
                                alert('Código de autenticação enviado para seu email. Por favor, verifique e digite o código para acessar.');
                                setTimeout(function() {
                                    window.location.href = "/digita_codigo";
                                }, 2000);
                            } else {
                                // Erro de login
                                $btn.html(originalText).prop('disabled', false);
                                alert('E-mail ou senha inválidos. Tente novamente.');
                            }
                        }
                    },
                    error: function() {
                        $btn.html(originalText).prop('disabled', false);
                        alert('Erro ao conectar ao servidor. Tente novamente mais tarde.');
                    }
                });
            });
        });
    </script>
</body>
</html> 