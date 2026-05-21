<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel - Cadastro de Usuário</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/marvel-sweetalert.js"></script>
    
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
            min-height: calc(100vh - 150px);
        }
        
        /* Card de cadastro */
        .register-card {
            background: #141414;
            border-radius: 12px;
            border: 1px solid #2a2a2a;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }
        
        .register-header {
            background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
            padding: 2rem;
            border-bottom: 3px solid #e62429;
            position: relative;
        }
        
        .register-header h2 {
            font-size: 1.8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .register-header h2 i {
            color: #e62429;
            font-size: 2rem;
        }
        
        .register-header p {
            color: #999;
            margin-top: 0.5rem;
            margin-bottom: 0;
        }
        
        .register-body {
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
        
        .form-control, .form-select {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            background: #1f1f1f;
            border-color: #e62429;
            box-shadow: 0 0 0 3px rgba(230, 36, 41, 0.2);
            color: #fff;
        }
        
        .form-control::placeholder {
            color: #666;
        }
        
        .form-text {
            color: #888;
            font-size: 0.75rem;
            margin-top: 0.5rem;
        }
        
        .form-text i {
            color: #e62429;
            margin-right: 4px;
        }
        
        /* Checkbox */
        .form-check-input {
            background-color: #1a1a1a;
            border: 1px solid #e62429;
            width: 1.1rem;
            height: 1.1rem;
            cursor: pointer;
        }
        
        .form-check-input:checked {
            background-color: #e62429;
            border-color: #e62429;
        }
        
        .form-check-label {
            color: #ccc;
            font-size: 0.85rem;
            margin-left: 0.5rem;
        }
        
        .form-check-label a {
            color: #e62429;
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-check-label a:hover {
            text-decoration: underline;
        }
        
        /* Botões */
        .btn-marvel {
            background: #e62429;
            color: #fff;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-marvel:hover {
            background: #ff2e35;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(230, 36, 41, 0.3);
            color: #fff;
        }
        
        .btn-outline-marvel {
            background: transparent;
            color: #ccc;
            border: 1px solid #2a2a2a;
            padding: 0.8rem 2rem;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-outline-marvel:hover {
            background: #2a2a2a;
            color: #fff;
            border-color: #e62429;
        }
        
        /* Footer do card */
        .register-footer {
            background: #0f0f0f;
            padding: 1.5rem 2rem;
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
            font-size: 0.85rem;
        }
        
        .security-badge i {
            color: #e62429;
            font-size: 1rem;
        }
        
        /* Link para login */
        .login-link {
            text-align: center;
            margin-top: 2rem;
        }
        
        .login-link a {
            color: #e62429;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .login-link a:hover {
            gap: 0.8rem;
        }
        
        /* Footer */
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
            
            .register-header h2 {
                font-size: 1.3rem;
            }
            
            .register-body {
                padding: 1.5rem;
            }
            
            .btn-marvel, .btn-outline-marvel {
                width: 100%;
                justify-content: center;
            }
            
            .security-badge {
                gap: 1rem;
                flex-direction: column;
                align-items: center;
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
        <div class="register-card">
            <div class="register-header">
                <h2>
                    <i class="bi bi-person-plus-fill"></i>
                    Criar Conta
                </h2>
                <p>Junte-se à maior comunidade de heróis do mundo!</p>
            </div>
            
            <div class="register-body">
                <form id="user-form">
                    <input type="hidden" id="usuario_id">
                    
                    <div class="row g-4">
                        <!-- Nome Completo -->
                        <div class="col-md-6">
                            <label for="nome" class="form-label required">
                                <i class="bi bi-person-fill"></i> Nome Completo
                            </label>
                            <input type="text" class="form-control" id="nome" name="nome" 
                                   placeholder="Peter Parker" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Digite seu nome completo
                            </div>
                        </div>
                        
                        <!-- E-mail -->
                        <div class="col-md-6">
                            <label for="email" class="form-label required">
                                <i class="bi bi-envelope-fill"></i> E-mail
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   placeholder="peter.parker@marvel.com" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Digite um e-mail válido
                            </div>
                        </div>
                        
                        <!-- Senha -->
                        <div class="col-md-6">
                            <label for="senha" class="form-label required">
                                <i class="bi bi-lock-fill"></i> Senha
                            </label>
                            <input type="password" class="form-control" id="senha" name="senha" 
                                   minlength="6" placeholder="••••••" required>
                            <div class="form-text">
                                <i class="bi bi-shield-check"></i> Mínimo de 6 caracteres
                            </div>
                        </div>
                        
                        <!-- Telefone -->
                        <div class="col-md-6">
                            <label for="telefone" class="form-label required">
                                <i class="bi bi-telephone-fill"></i> Telefone
                            </label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" 
                                   placeholder="(11) 99999-9999" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Digite seu telefone com DDD
                            </div>
                        </div>
                        
                        <!-- Data de Nascimento -->
                        <div class="col-md-6">
                            <label for="nascimento" class="form-label required">
                                <i class="bi bi-calendar-date-fill"></i> Data de Nascimento
                            </label>
                            <input type="date" class="form-control" id="nascimento" name="nascimento" 
                                   max="2024-12-31" required>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Selecione sua data de nascimento
                            </div>
                        </div>
                        
                        <!-- Gênero -->
                        <div class="col-md-6">
                            <label for="genero" class="form-label required">
                                <i class="bi bi-gender-ambiguous"></i> Gênero
                            </label>
                            <select class="form-select" id="genero" name="genero" required>
                                <option value="">Selecione o gênero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Não binário">Não binário</option>
                                <option value="Outro">Outro</option>
                            </select>
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Escolha uma opção
                            </div>
                        </div>
                        
                        <!-- Termos -->
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termos" required>
                                <label class="form-check-label" for="termos">
                                    Eu aceito os <a href="#">Termos e Condições</a> e a 
                                    <a href="#">Política de Privacidade</a> da Marvel
                                </label>
                            </div>
                        </div>
                        
                        <!-- Botões -->
                        <div class="col-12">
                            <div class="d-flex gap-3 justify-content-end flex-wrap">
                                <button type="button" class="btn-outline-marvel" id="botao-deletar">
                                    <i class="bi bi-x-lg"></i> Cancelar
                                </button>
                                <button type="button" class="btn-marvel" id="botao">
                                    <i class="bi bi-check-lg"></i> Cadastrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="register-footer">
                <div class="security-badge">
                    <span><i class="bi bi-shield-check"></i> Dados protegidos</span>
                    <span><i class="bi bi-lock-fill"></i> Conexão segura</span>
                    <span><i class="bi bi-emoji-smile"></i> Junte-se aos heróis</span>
                </div>
            </div>
        </div>
        
        <div class="login-link">
            <a href="{{route('entrar')}}">
                <i class="bi bi-box-arrow-in-right"></i>
                Já tem uma conta? Faça login
            </a>
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
            $("#botao").click(function(){
                $.ajax({
                    url: "../api/cadastro_usuario",
                    method: "POST",
                    data: { 
                        nome: $("#nome").val(),
                        email: $("#email").val(),
                        senha: $("#senha").val(),
                        telefone: $("#telefone").val(),
                        nascimento: $("#nascimento").val(),
                        genero: $("#genero").val(),
                    },
                    success: function (res) {
marvelSwal({
                        title: 'BEM-VINDO! ⚡',
                        text: 'Redirecionando...',
                        icon: 'success',
                        iconColor: '#ffd700',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        
                        console.log(res);
                        
                        setTimeout(function() {
                            window.location.href = '/entrar';
                        }, 1500);
                    },
                    error: function(err) {
                        marvelSwal({
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao cadastrar. Tente novamente.',
                            icon: 'error',
                            iconColor: '#e62429'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>