<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARVEL - Official Site</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
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
        
        /* Hero Banner */
        .hero-banner {
            position: relative;
            height: 85vh;
            min-height: 600px;
            background: linear-gradient(90deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.3) 100%),
                        url('https://cdn.marvel.com/content/1x/marvel_movies_avengers_endgame_desktop_01.jpg');
            background-size: cover;
            background-position: center top;
            display: flex;
            align-items: center;
            padding-left: 8%;
        }
        
        .hero-content {
            max-width: 600px;
            animation: fadeInUp 0.8s ease;
        }
        
        .hero-badge {
            color: #e62429;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 1rem;
            font-weight: 500;
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1rem;
            line-height: 1.1;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            color: #ccc;
            margin-bottom: 2rem;
            line-height: 1.5;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .btn-primary,
        .btn-secondary {
            padding: 0.8rem 2rem;
            font-size: 0.9rem;
            font-weight: 700;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: #e62429;
            color: #fff;
        }
        
        .btn-primary:hover {
            background: #ff2e35;
            transform: scale(1.05);
        }
        
        .btn-secondary {
            background: transparent;
            color: #fff;
            border: 2px solid #fff;
        }
        
        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
            border-color: #e62429;
        }
        
        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        /* News Section */
        .news-section {
            padding: 4rem 0;
            border-bottom: 1px solid #1a1a1a;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        
        .section-title {
            font-size: 2rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-left: 4px solid #e62429;
            padding-left: 1rem;
        }
        
        .section-link {
            color: #e62429;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }
        
        .news-card {
            background: #141414;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            border: 1px solid #222;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.5);
            border-color: #e62429;
        }
        
        .news-image {
            height: 200px;
            background: linear-gradient(135deg, #2a2a2a, #0a0a0a);
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .news-image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(180deg, transparent, rgba(0,0,0,0.8));
            padding: 1rem;
        }
        
        .news-category {
            color: #e62429;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .news-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .news-excerpt {
            color: #999;
            font-size: 0.9rem;
            line-height: 1.4;
        }
        
        /* Characters Section */
        .characters-section {
            padding: 4rem 0;
            border-bottom: 1px solid #1a1a1a;
        }
        
        .characters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .character-card {
            background: #141414;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #222;
            padding: 2rem 1rem;
        }
        
        .character-card:hover {
            transform: scale(1.05);
            border-color: #e62429;
            background: #1a1a1a;
        }
        
        .character-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 1rem auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2a2a2a, #1a1a1a);
            border-radius: 50%;
            overflow: hidden;
        }
        
        .character-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 1rem;
            transition: transform 0.3s ease;
        }
        
        .character-card:hover .character-icon img {
            transform: scale(1.1);
        }
        
        .character-name {
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 1px;
        }
        
        /* Featured Section - CORRIGIDA */
        .featured-section {
            padding: 4rem 0;
            border-bottom: 1px solid #1a1a1a;
        }
        
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }
        
        .featured-card {
            background: #141414;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #222;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        
        .featured-card:hover {
            border-color: #e62429;
            transform: translateY(-3px);
        }
        
        .featured-image {
            width: 100%;
            height: 220px;
            overflow: hidden;
        }
        
        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        
        .featured-card:hover .featured-image img {
            transform: scale(1.05);
        }
        
        .featured-content {
            padding: 1.5rem;
        }
        
        .featured-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .featured-text {
            color: #999;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #e62429, #8b0000);
            padding: 4rem 2rem;
            text-align: center;
            border-radius: 12px;
            margin: 4rem 0;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }
        
        .cta-text {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Footer */
        .footer {
            background: #000000;
            padding: 3rem 0 1rem;
            border-top: 1px solid #1a1a1a;
            margin-top: 2rem;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .footer-col h4 {
            color: #fff;
            font-size: 1rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .footer-col a {
            display: block;
            color: #888;
            text-decoration: none;
            margin-bottom: 0.75rem;
            font-size: 0.85rem;
            transition: color 0.3s ease;
        }
        
        .footer-col a:hover {
            color: #e62429;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-links a {
            font-size: 1.5rem;
            color: #888;
        }
        
        .social-links a:hover {
            color: #e62429;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #1a1a1a;
            color: #666;
            font-size: 0.8rem;
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-banner {
                padding-left: 1rem;
                text-align: center;
                justify-content: center;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .navbar-menu {
                justify-content: flex-start;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .cta-title {
                font-size: 1.8rem;
            }
            
            .container {
                padding: 0 1rem;
            }
            
            .character-icon {
                width: 90px;
                height: 90px;
            }
            
            .featured-image {
                height: 180px;
            }
            
            .navbar-logo {
                width: 80px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-top">
            <a href="#" class="navbar-logo">
                <img src="{{ asset('marvel-removebg-preview(1).png') }}" alt="Marvel Logo">
            </a>
            <div class="navbar-right">
                <a href="{{route('cadastro')}}">CADASTRO</a>
                <a href="{{route('entrar')}}">LOGIN</a>
            </div>
        </div>
        <div class="navbar-menu">
            <a href="#" class="active">NEWS</a>
            <a href="#">COMICS</a>
            <a href="#">CHARACTERS</a>
            <a href="#">GAMES</a>
            <a href="#">MOVIES</a>
            <a href="#">TV SHOWS</a>
            <a href="#">MORE</a>
        </div>
    </nav>
    
    <!-- Hero Banner -->
    <section class="hero-banner">
        <div class="hero-content">
            <div class="hero-badge">WELCOME TO THE MARVEL UNIVERSE</div>
            <h1 class="hero-title">EXPLORE O MAIOR UNIVERSO DE HERÓIS</h1>
            <p class="hero-subtitle">
                Acesse histórias, personagens e aventuras épicas. Faça parte dessa jornada!
            </p>
            <div class="hero-buttons">
                <a href="{{route('cadastro')}}" class="btn-primary">ENTRAR AGORA</a>
                <a href="#news" class="btn-secondary">EXPLORAR</a>
            </div>
        </div>
    </section>
    
    <div class="container">
        <!-- News Section -->
        <section class="news-section" id="news">
            <div class="section-header">
                <h2 class="section-title">ÚLTIMAS NOTÍCIAS</h2>
                <a href="#" class="section-link">VER TUDO <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://falaanimal.com.br/wp-content/uploads/2024/10/ultimatewolverine_17102024.jpg'); background-size: cover;">
                        <div class="news-image-overlay">
                            <span class="news-category">COMICS</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Novas HQs esta semana</h3>
                        <p class="news-excerpt">Universo Ultimate, Wolverine e Future Foundation estão nos novos lançamentos.</p>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://i0.wp.com/ocorreio.com.br/wp-content/uploads/2025/12/thor-shazam.jpg'); background-size: cover;">
                        <div class="news-image-overlay">
                            <span class="news-category">MARVEL UNLIMITED</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">It's Jeff / Aquaman</h3>
                        <p class="news-excerpt">Crossover especial disponível agora no Marvel Unlimited.</p>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://i.ytimg.com/vi/tzgrw4_WaeI/maxresdefault.jpg'); background-size: cover;">
                        <div class="news-image-overlay">
                            <span class="news-category">GAMES</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Marvel Cosmic Invasion</h3>
                        <p class="news-excerpt">Ciclope e Coisa chegam como novos personagens jogáveis no DLC.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Characters Section -->
        <section class="characters-section">
            <div class="section-header">
                <h2 class="section-title">PERSONAGENS EM DESTAQUE</h2>
                <a href="#" class="section-link">VER MAIS <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="characters-grid">
                <div class="character-card">
                    <div class="character-icon">
                        <img src="{{ asset('homem.aranha-removebg-preview.png') }}" alt="Homem-Aranha">
                    </div>
                    <div class="character-name">Homem-Aranha</div>
                </div>
                <div class="character-card">
                    <div class="character-icon">
                        <img src="{{ asset('thor.novo-removebg-preview.png') }}" alt="Thor">
                    </div>
                    <div class="character-name">Thor</div>
                </div>
                <div class="character-card">
                    <div class="character-icon">
                        <img src="{{ asset('capitao_novo-removebg-preview.png') }}" alt="Capitão América">
                    </div>
                    <div class="character-name">Capitão América</div>
                </div>
                <div class="character-card">
                    <div class="character-icon">
                        <img src="{{ asset('Hulk-Logo-removebg-preview.png') }}" alt="Hulk">
                    </div>
                    <div class="character-name">Hulk</div>
                </div>
                <div class="character-card">
                    <div class="character-icon">
                        <img src="{{ asset('iron_man_novo-removebg-preview.png') }}" alt="Homem de Ferro">
                    </div>
                    <div class="character-name">Homem de Ferro</div>
                </div>
                <div class="character-card">
                    <div class="character-icon">
                        <img src="{{ asset('wolverine_novo-removebg-preview.png') }}" alt="Wolverine">
                    </div>
                    <div class="character-name">Wolverine</div>
                </div>
            </div>
        </section>
        
        <!-- Featured Section - CORRIGIDA -->
        <section class="featured-section">
            <div class="section-header">
                <h2 class="section-title">CONTEÚDO EM DESTAQUE</h2>
                <a href="#" class="section-link">EXPLORAR <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="featured-grid">
                <div class="featured-card">
                    <div class="featured-image">
                        <img src="https://www.tribunapr.com.br/wp-content/uploads/sites/56/2022/01/20103920/marvel-studios-970x550.jpg" alt="Filmes e Séries">
                    </div>
                    <div class="featured-content">
                        <h3 class="featured-title">Filmes e Séries</h3>
                        <p class="featured-text">Assista aos melhores momentos do MCU e descubra os próximos lançamentos.</p>
                    </div>
                </div>
                <div class="featured-card">
                    <div class="featured-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOBnAzb5PRT4ssFNUFF9GDsDJaJseFQmV-Mw&s" alt="HQs Digitais">
                    </div>
                    <div class="featured-content">
                        <h3 class="featured-title">HQs Digitais</h3>
                        <p class="featured-text">Acesse o maior acervo de quadrinhos online com o Marvel Unlimited.</p>
                    </div>
                </div>
                <div class="featured-card">
                    <div class="featured-image">
                        <img src="https://t3.ftcdn.net/jpg/12/00/20/34/360_F_1200203473_B2kxAca4eSHFxz1T71YHlNeyUZzv1LDr.jpg" alt="Jogos">
                    </div>
                    <div class="featured-content">
                        <h3 class="featured-title">Jogos</h3>
                        <p class="featured-text">Os melhores jogos baseados no universo Marvel em uma única plataforma.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta-section">
            <h2 class="cta-title">JUNTE-SE À COMUNIDADE MARVEL</h2>
            <p class="cta-text">
                Cadastre-se agora e tenha acesso a conteúdos exclusivos, notificações de lançamentos e muito mais.
            </p>
            <a href="{{route('cadastro')}}" class="btn-primary">CRIAR CONTA GRÁTIS</a>
        </section>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>MARVEL</h4>
                    <a href="#">Sobre</a>
                    <a href="#">Ajuda</a>
                    <a href="#">Carreiras</a>
                    <a href="#">Imprensa</a>
                </div>
                <div class="footer-col">
                    <h4>CONTEÚDO</h4>
                    <a href="#">Comics</a>
                    <a href="#">Filmes</a>
                    <a href="#">Séries</a>
                    <a href="#">Games</a>
                </div>
                <div class="footer-col">
                    <h4>LEGAL</h4>
                    <a href="#">Privacidade</a>
                    <a href="#">Termos de Uso</a>
                    <a href="#">Cookies</a>
                    <a href="#">Acessibilidade</a>
                </div>
                <div class="footer-col">
                    <h4>SIGA A MARVEL</h4>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 MARVEL & © 2025 Marvel Studios. Todos os direitos reservados. | Excelsior! ⚡</p>
            </div>
        </div>
    </footer>
    
    <script>
        // Menu ativo
        document.querySelectorAll('.navbar-menu a').forEach(link => {
            link.addEventListener('click', function(e) {
                if(this.getAttribute('href') === '#') {
                    e.preventDefault();
                }
                document.querySelectorAll('.navbar-menu a').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Scroll suave
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if(href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>