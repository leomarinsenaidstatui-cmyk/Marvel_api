<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚡ MARVEL STUDIOS - WELCOME TO THE MULTIVERSE ⚡</title>
    
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons (opcional, mas bonito) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background: #0a0505;
            color: #fff;
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
        }
        
        /* Background com efeito de quadrinhos */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(226, 54, 54, 0.1) 0%, transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(226, 54, 54, 0.1) 0%, transparent 30%),
                repeating-linear-gradient(45deg, rgba(226, 54, 54, 0.02) 0px, rgba(226, 54, 54, 0.02) 20px, transparent 20px, transparent 40px);
            pointer-events: none;
            z-index: 0;
        }
        
        /* Efeito de splash de tinta */
        .splash {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }
        
        .splash span {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(226, 54, 54, 0.03);
            border-radius: 50%;
            filter: blur(60px);
        }
        
        .splash span:nth-child(1) {
            top: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
        }
        
        .splash span:nth-child(2) {
            bottom: -150px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: rgba(255, 215, 0, 0.03);
        }
        
        .splash span:nth-child(3) {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: rgba(226, 54, 54, 0.02);
        }
        
        /* Container principal */
        .container {
            position: relative;
            z-index: 2;
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Header com logo */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            margin-bottom: 3rem;
            border-bottom: 2px solid rgba(226, 54, 54, 0.3);
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo-icon {
            font-size: 3.5rem;
            color: #e23636;
            filter: drop-shadow(0 0 20px rgba(226, 54, 54, 0.5));
            animation: pulse 2s infinite;
        }
        
        .logo-text {
            font-family: 'Bangers', cursive;
            font-size: 2.5rem;
            letter-spacing: 3px;
            background: linear-gradient(135deg, #fff, #e23636);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 0 rgba(0, 0, 0, 0.3);
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 20px rgba(226, 54, 54, 0.5)); }
            50% { transform: scale(1.1); filter: drop-shadow(0 0 40px rgba(226, 54, 54, 0.8)); }
        }
        
        /* Menu de navegação */
        .nav {
            display: flex;
            gap: 1rem;
        }
        
        .nav-btn {
            padding: 0.8rem 2rem;
            border: 2px solid #e23636;
            background: transparent;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .nav-btn:hover {
            background: #e23636;
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(226, 54, 54, 0.5);
            border-color: #ffd700;
        }
        
        .nav-btn.destaque {
            background: #e23636;
            border-color: #ffd700;
        }
        
        .nav-btn.destaque:hover {
            background: #b22222;
            border-color: #fff;
        }
        
        /* Hero section */
        .hero {
            text-align: center;
            margin: 3rem 0 5rem;
            animation: fadeInUp 1s ease;
        }
        
        .hero-title {
            font-family: 'Bangers', cursive;
            font-size: 5rem;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }
        
        .hero-title span {
            display: block;
            background: linear-gradient(135deg, #e23636, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 5px 5px 0 rgba(0, 0, 0, 0.5);
            font-size: 6rem;
            letter-spacing: 10px;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            color: #aaa;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }
        
        .hero-subtitle strong {
            color: #e23636;
            font-weight: 700;
        }
        
        /* Stats / Destaques */
        .stats {
            display: flex;
            justify-content: center;
            gap: 4rem;
            margin: 4rem 0;
            flex-wrap: wrap;
        }
        
        .stat-item {
            text-align: center;
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }
        
        .stat-item:nth-child(1) { animation-delay: 0.1s; }
        .stat-item:nth-child(2) { animation-delay: 0.2s; }
        .stat-item:nth-child(3) { animation-delay: 0.3s; }
        
        .stat-number {
            font-family: 'Bangers', cursive;
            font-size: 4rem;
            color: #e23636;
            text-shadow: 3px 3px 0 #ffd700;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #aaa;
        }
        
        /* Grid de cards */
        .section-title {
            font-family: 'Bangers', cursive;
            font-size: 3rem;
            text-align: center;
            margin: 4rem 0 3rem;
            position: relative;
        }
        
        .section-title::before,
        .section-title::after {
            content: "⚡";
            margin: 0 1.5rem;
            color: #e23636;
            font-size: 2rem;
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        /* Card */
        .card {
            background: rgba(20, 10, 10, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid #e23636;
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }
        
        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }
        
        .card:hover {
            transform: translateY(-10px);
            border-color: #ffd700;
            box-shadow: 0 20px 40px -10px rgba(226, 54, 54, 0.5);
        }
        
        .card::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(226, 54, 54, 0.1), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
            pointer-events: none;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) rotate(45deg); }
            20%, 100% { transform: translateX(100%) rotate(45deg); }
        }
        
        .card-icon {
            font-size: 3rem;
            color: #e23636;
            margin-bottom: 1.5rem;
        }
        
        .card-title {
            font-family: 'Bangers', cursive;
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #ffd700;
            letter-spacing: 1px;
        }
        
        .card-text {
            color: #ccc;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        .card-btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background: transparent;
            border: 2px solid #e23636;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        
        .card-btn:hover {
            background: #e23636;
            border-color: #ffd700;
        }
        
        /* Herois em destaque */
        .heroes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .hero-card {
            background: rgba(30, 20, 20, 0.8);
            border: 2px solid #e23636;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }
        
        .hero-card:nth-child(1) { animation-delay: 0.1s; }
        .hero-card:nth-child(2) { animation-delay: 0.15s; }
        .hero-card:nth-child(3) { animation-delay: 0.2s; }
        .hero-card:nth-child(4) { animation-delay: 0.25s; }
        .hero-card:nth-child(5) { animation-delay: 0.3s; }
        
        .hero-card:hover {
            transform: scale(1.05);
            border-color: #ffd700;
            background: rgba(226, 54, 54, 0.2);
        }
        
        .hero-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #e23636;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .hero-name {
            font-family: 'Bangers', cursive;
            font-size: 1.5rem;
            color: #ffd700;
            margin-bottom: 0.5rem;
        }
        
        .hero-team {
            color: #aaa;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, rgba(226, 54, 54, 0.2), rgba(0, 0, 0, 0.8));
            border: 2px solid #e23636;
            border-radius: 30px;
            padding: 4rem 2rem;
            text-align: center;
            margin: 5rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .cta::before {
            content: "⚡";
            position: absolute;
            top: -30px;
            right: -30px;
            font-size: 15rem;
            color: rgba(226, 54, 54, 0.1);
            transform: rotate(15deg);
        }
        
        .cta-title {
            font-family: 'Bangers', cursive;
            font-size: 3.5rem;
            margin-bottom: 1rem;
            color: #fff;
        }
        
        .cta-text {
            font-size: 1.2rem;
            color: #aaa;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .cta-btn {
            display: inline-block;
            padding: 1.2rem 4rem;
            background: #e23636;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.2rem;
            border: 2px solid #ffd700;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .cta-btn:hover {
            background: #b22222;
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(226, 54, 54, 0.5);
        }
        
        /* Footer */
        .footer {
            margin-top: auto;
            padding: 3rem 0 1rem;
            border-top: 2px solid rgba(226, 54, 54, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .footer-links {
            display: flex;
            gap: 2rem;
        }
        
        .footer-links a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: #e23636;
        }
        
        .social {
            display: flex;
            gap: 1rem;
        }
        
        .social a {
            color: #fff;
            background: rgba(226, 54, 54, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: 1px solid #e23636;
            transition: all 0.3s ease;
        }
        
        .social a:hover {
            background: #e23636;
            transform: translateY(-3px);
        }
        
        .copyright {
            color: #666;
            font-size: 0.9rem;
            text-align: center;
            width: 100%;
            margin-top: 2rem;
        }
        
        /* Animações */
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
        
        /* Responsividade */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-title span {
                font-size: 4rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .section-title::before,
            .section-title::after {
                margin: 0 0.5rem;
            }
            
            .stats {
                gap: 2rem;
            }
            
            .stat-number {
                font-size: 3rem;
            }
            
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .logo {
                justify-content: center;
            }
            
            .footer {
                flex-direction: column;
                text-align: center;
            }
            
            .footer-links {
                justify-content: center;
            }
        }
        
        /* Efeito de loading animado */
        .loading-bar {
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #e23636, #ffd700, #e23636);
            background-size: 200% 100%;
            animation: loading 2s infinite;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }
        
        @keyframes loading {
            0% { background-position: 0% 0%; }
            100% { background-position: 200% 0%; }
        }
    </style>
</head>
<body>
    <!-- Barra de loading animada -->
    <div class="loading-bar"></div>
    
    <!-- Splash de fundo -->
    <div class="splash">
        <span></span>
        <span></span>
        <span></span>
    </div>
    
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <div class="logo-icon">⚡</div>
                <div class="logo-text">MARVEL STUDIOS</div>
            </div>
            
            <nav class="nav">
               
               <a href="{{route('cadastro')}}" class="cta-btn">Cadastre-se</a>
            </nav>
        </header>
        
        <!-- Hero Section -->
        <section class="hero">
            <h1 class="hero-title">
                WELCOME TO THE
                <span>MARVEL MULTIVERSE</span>
            </h1>
            <p class="hero-subtitle">
                Explore o incrível universo dos heróis mais poderosos da Terra e além. 
                <strong>Mais de 80 anos de histórias</strong>, lendas e batalhas épicas 
                esperam por você.
            </p>
        </section>
        
        <!-- Stats -->
        <div class="stats">
            <div class="stat-item">
                <div class="stat-number">80+</div>
                <div class="stat-label">Anos de Histórias</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">700+</div>
                <div class="stat-label">Personagens</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">30+</div>
                <div class="stat-label">Equipes</div>
            </div>
        </div>
        
        <!-- Cards Section -->
        <h2 class="section-title">EXPLORE O UNIVERSO</h2>
        <div class="grid">
            <div class="card">
                <div class="card-icon"><i class="bi bi-shield-shaded"></i></div>
                <h3 class="card-title">HERÓIS</h3>
                <p class="card-text">Conheça a história e os poderes dos seus heróis favoritos, desde o Homem-Aranha até o Pantera Negra.</p>
                <a href="#" class="card-btn">Explorar</a>
            </div>
            
            <div class="card">
                <div class="card-icon"><i class="bi bi-people-fill"></i></div>
                <h3 class="card-title">EQUIPES</h3>
                <p class="card-text">Descubra as equipes mais icônicas como Vingadores, X-Men, Quarteto Fantástico e Guardiões da Galáxia.</p>
                <a href="#" class="card-btn">Explorar</a>
            </div>
            
            <div class="card">
                <div class="card-icon"><i class="bi bi-calendar-event"></i></div>
                <h3 class="card-title">HISTÓRIA</h3>
                <p class="card-text">Viaje pelas eras e conheça os momentos que definiram o universo Marvel desde 1939.</p>
                <a href="#" class="card-btn">Explorar</a>
            </div>
            
            <div class="card">
                <div class="card-icon"><i class="bi bi-stars"></i></div>
                <h3 class="card-title">MULTIVERSO</h3>
                <p class="card-text">Explore realidades alternativas, variantes e versões diferentes dos seus heróis preferidos.</p>
                <a href="#" class="card-btn">Explorar</a>
            </div>
        </div>
        
        <!-- Heróis em Destaque -->
        <h2 class="section-title">HERÓIS EM DESTAQUE</h2>
        <div class="heroes-grid">
            <div class="hero-card">
                <div class="hero-avatar">🕷️</div>
                <h3 class="hero-name">Homem-Aranha</h3>
                <p class="hero-team">Vingadores</p>
            </div>
            
            <div class="hero-card">
                <div class="hero-avatar">🛡️</div>
                <h3 class="hero-name">Capitão América</h3>
                <p class="hero-team">Vingadores</p>
            </div>
            
            <div class="hero-card">
                <div class="hero-avatar">⚡</div>
                <h3 class="hero-name">Thor</h3>
                <p class="hero-team">Vingadores</p>
            </div>
            
            <div class="hero-card">
                <div class="hero-avatar">💚</div>
                <h3 class="hero-name">Hulk</h3>
                <p class="hero-team">Vingadores</p>
            </div>
            
            <div class="hero-card">
                <div class="hero-avatar">👓</div>
                <h3 class="hero-name">Ciclope</h3>
                <p class="hero-team">X-Men</p>
            </div>
        </div>

        <!-- CTA Section -->
        <section class="cta">
            <h2 class="cta-title">JUNTE-SE À LENDA</h2>
            <p class="cta-text">Cadastre-se agora e tenha acesso ao banco de dados completo de heróis, vilões e histórias do universo Marvel.</p>
            <a href="{{route('inicio')}}" class="cta-btn">CRIAR HERÓI</a>
        </section>
        
        <!-- Footer -->
        <footer class="footer">
            <div class="logo-text" style="font-size: 1.5rem;">⚡ MARVEL STUDIOS ⚡</div>
            
            <div class="footer-links">
                <a href="#">Sobre</a>
                <a href="#">Contato</a>
                <a href="#">Privacidade</a>
                <a href="#">Termos</a>
            </div>
            
            <div class="social">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
            </div>
            
            <div class="copyright">
                © 2024 MARVEL STUDIOS. Todos os direitos reservados. | Excelsior! ⚡
            </div>
        </footer>
    </div>
    
    <!-- Pequeno script para interatividade -->
    <script>
        // Efeito de hover nos cards de heróis
        document.querySelectorAll('.hero-card').forEach(card => {
            card.addEventListener('click', () => {
                alert('⚡ Em breve: perfil completo do herói! ⚡');
            });
        });
        
        // Animação suave de scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
        
        // Redirecionamento para a página de início ao clicar em CRIAR HERÓI
        document.querySelector('.cta-btn').addEventListener('click', function(e) {
            // Não previne o comportamento padrão para seguir o link
            // O link já está configurado para "inicio.blade.php"
        });
    </script>
</body>
</html>