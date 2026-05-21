<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marvel - Autenticação Dupla</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
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
        
        /* Efeito de fundo com padrão Marvel */
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
        .container-auth {
            max-width: 450px;
            width: 100%;
            position: relative;
            z-index: 1;
        }
        
        /* Card principal */
        .card-auth {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(226, 54, 54, 0.4);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 54, 54, 0.3);
            animation: slideUp 0.6s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Header do card */
        .card-header-auth {
            background: linear-gradient(135deg, var(--marvel-red) 0%, var(--marvel-dark-red) 70%, #5a0e0e 100%);
            color: white;
            padding: 30px;
            border-bottom: 4px solid var(--marvel-gold);
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        
        .card-header-auth::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,215,0,0.2) 0%, rgba(226,54,54,0.1) 50%, transparent 70%);
            animation: pulse 3s infinite ease-in-out;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .card-header-auth h1 {
            font-size: 28px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            font-family: 'Arial Black', sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }
        
        .card-header-auth .icon-header {
            font-size: 48px;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        /* Body do card */
        .card-body-auth {
            padding: 40px 30px;
        }
        
        .text-info-auth {
            color: var(--marvel-gray);
            font-size: 15px;
            margin-bottom: 25px;
            line-height: 1.6;
            text-align: center;
        }
        
        .text-info-auth strong {
            color: var(--marvel-black);
            display: block;
            margin-bottom: 10px;
        }
        
        /* Código de autenticação */
        .auth-code-box {
            background: linear-gradient(135deg, var(--marvel-light-gray) 0%, #ffffff 100%);
            border: 3px solid var(--marvel-red);
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
            position: relative;
            box-shadow: 0 5px 15px rgba(226, 54, 54, 0.2);
            transition: transform 0.3s ease;
        }
        
        .auth-code-box:hover {
            transform: scale(1.02);
        }
        
        .code-label {
            font-size: 12px;
            color: var(--marvel-gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .code-value {
            font-size: 42px;
            font-weight: 900;
            color: var(--marvel-red);
            font-family: 'Courier New', monospace;
            letter-spacing: 8px;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            word-break: break-all;
        }
        
        /* Tempo de validade */
        .validity-box {
            background: rgba(247, 143, 63, 0.1);
            border-left: 4px solid var(--marvel-gold);
            padding: 15px;
            border-radius: 8px;
            margin-top: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .validity-box i {
            color: var(--marvel-gold);
            font-size: 20px;
        }
        
        .validity-text {
            color: var(--marvel-gray);
            font-size: 14px;
            margin: 0;
            font-weight: 500;
        }
        
        .validity-time {
            color: var(--marvel-dark-red);
            font-weight: 700;
        }
        
        /* Footer info */
        .footer-info {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(226, 54, 54, 0.2);
        }
        
        .footer-text {
            font-size: 13px;
            color: var(--marvel-gray);
            line-height: 1.5;
        }
        
        .footer-text strong {
            color: var(--marvel-dark-red);
        }
    </style>
</head>
<body>
    <div class="container-auth">
        <div class="card-auth">
            <!-- Header -->
            <div class="card-header-auth">
                <div class="icon-header">🔐</div>
                <h1>Autenticação Dupla</h1>
            </div>
            
            <!-- Body -->
            <div class="card-body-auth">
                <p class="text-info-auth">
                    <strong>Seu código de segurança:</strong>
                    Use o código abaixo para completar sua autenticação
                </p>
                
                <!-- Código de Autenticação -->
                <div class="auth-code-box">
                    <div class="code-label">Código de autenticação</div>
                    <p class="code-value">{{ $codigo }}</p>
                </div>
                
                <!-- Tempo de validade -->
                <div class="validity-box">
                    <i class="bi bi-hourglass-split"></i>
                    <p class="validity-text">
                        Este código é válido por <span class="validity-time">10 minutos</span>
                    </p>
                </div>
                
                <!-- Rodapé -->
                <div class="footer-info">
                    <p class="footer-text">
                        <i class="bi bi-shield-check" style="color: var(--marvel-red); margin-right: 5px;"></i>
                        Por motivos de segurança, não compartilhe este código com ninguém.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>