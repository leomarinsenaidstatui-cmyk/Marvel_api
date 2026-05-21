<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2 class="dashboard-title">
                <i class="bi bi-shield-shaded"></i>
                {{ __('DASHBOARD MARVEL') }}
            </h2>
            <p class="dashboard-subtitle">
                <i class="bi bi-stars"></i>
                Bem-vindo ao Universo Marvel
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Cards de Estatísticas -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total de Heróis</h3>
                        <p class="stat-number"><?php echo isset($totalHerois) ? $totalHerois : 0; ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total de Quadrinhos</h3>
                        <p class="stat-number"><?php echo isset($totalQuadrinhos) ? $totalQuadrinhos : 0; ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Equipes</h3>
                        <p class="stat-number"><?php echo isset($totalEquipes) ? $totalEquipes : 0; ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-calendar-fill"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Anos de História</h3>
                        <p class="stat-number">85+</p>
                    </div>
                </div>
            </div>

            <!-- Grid de Conteúdo Principal -->
            <div class="dashboard-grid">
                <!-- Últimos Heróis -->
                <div class="dashboard-card">
                    <div class="card-header-marvel">
                        <h3><i class="bi bi-shield-fill"></i> Últimos Heróis</h3>
                        <a href="/herois" class="btn-link">Ver todos →</a>
                    </div>
                    <div class="card-body-marvel">
                        <?php if(isset($ultimosHerois) && count($ultimosHerois) > 0): ?>
                            <ul class="lista-items">
                                <?php foreach($ultimosHerois as $heroi): ?>
                                <li>
                                    <i class="bi bi-star-fill"></i>
                                    <strong><?php echo $heroi->codinome; ?></strong>
                                    <span><?php echo $heroi->nome; ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">Nenhum herói cadastrado ainda.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Últimos Quadrinhos -->
                <div class="dashboard-card">
                    <div class="card-header-marvel">
                        <h3><i class="bi bi-book-fill"></i> Últimos Quadrinhos</h3>
                        <a href="/quadrinhos" class="btn-link">Ver todos →</a>
                    </div>
                    <div class="card-body-marvel">
                        <?php if(isset($ultimosQuadrinhos) && count($ultimosQuadrinhos) > 0): ?>
                            <ul class="lista-items">
                                <?php foreach($ultimosQuadrinhos as $quadrinho): ?>
                                <li>
                                    <i class="bi bi-bookmark-fill"></i>
                                    <strong><?php echo $quadrinho->nome; ?></strong>
                                    <span><?php echo $quadrinho->editora; ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">Nenhum quadrinho cadastrado ainda.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Ações Rápidas -->
                <div class="dashboard-card">
                    <div class="card-header-marvel">
                        <h3><i class="bi bi-lightning-fill"></i> Ações Rápidas</h3>
                    </div>
                    <div class="card-body-marvel">
                        <div class="acoes-rapidas">
                            <a href="/cadastro" class="btn-acao">
                                <i class="bi bi-plus-circle"></i>
                                Novo Herói
                            </a>
                            <a href="/cadastro_quadrinhos" class="btn-acao">
                                <i class="bi bi-plus-circle"></i>
                                Novo Quadrinho
                            </a>
                            <a href="/herois" class="btn-acao">
                                <i class="bi bi-eye-fill"></i>
                                Ver Heróis
                            </a>
                            <a href="/quadrinhos" class="btn-acao">
                                <i class="bi bi-eye-fill"></i>
                                Ver Quadrinhos
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Informações do Universo -->
                <div class="dashboard-card">
                    <div class="card-header-marvel">
                        <h3><i class="bi bi-info-circle-fill"></i> Universo Marvel</h3>
                    </div>
                    <div class="card-body-marvel">
                        <div class="info-universo">
                            <p><i class="bi bi-check-circle-fill"></i> Fundada em 1939</p>
                            <p><i class="bi bi-check-circle-fill"></i> Mais de 8.000 personagens</p>
                            <p><i class="bi bi-check-circle-fill"></i> 50+ filmes e séries</p>
                            <p><i class="bi bi-check-circle-fill"></i> Presente em 100+ países</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mensagem de Boas-Vindas -->
            <div class="welcome-card">
                <div class="welcome-content">
                    <i class="bi bi-emoji-smile-fill"></i>
                    <div>
                        <h3>{{ __("You're logged in!") }}</h3>
                        <p>Explore o universo Marvel e gerencie seus heróis e quadrinhos favoritos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Dashboard Header */
        .dashboard-header {
            background: linear-gradient(135deg, #ad2121 0%, #e23636 100%);
            padding: 1.5rem 2rem;
            border-radius: 15px;
            margin-bottom: 1rem;
            border: 2px solid #ffd700;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .dashboard-title {
            font-family: 'Bangers', cursive;
            color: white;
            font-size: 2rem;
            margin: 0 0 0.5rem 0;
            text-shadow: 2px 2px 0 #000;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dashboard-title i {
            color: #ffd700;
        }

        .dashboard-subtitle {
            color: white;
            margin: 0;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dashboard-subtitle i {
            color: #ffd700;
        }

        /* Grid de Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #ad2121;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(173, 33, 33, 0.3);
            border-color: #ffd700;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ad2121, #e23636);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ffd700;
        }

        .stat-icon i {
            font-size: 2rem;
            color: #ffd700;
        }

        .stat-info h3 {
            font-size: 0.9rem;
            color: #666;
            margin: 0 0 0.5rem 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #ad2121;
            margin: 0;
            font-family: 'Bangers', cursive;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #ad2121;
        }

        .card-header-marvel {
            background: linear-gradient(135deg, #2d2d2d, #1a1a1a);
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ffd700;
        }

        .card-header-marvel h3 {
            color: #ffd700;
            margin: 0;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Bangers', cursive;
            letter-spacing: 1px;
        }

        .card-header-marvel h3 i {
            color: #ad2121;
        }

        .btn-link {
            color: #ffd700;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-link:hover {
            color: white;
            transform: translateX(5px);
        }

        .card-body-marvel {
            padding: 1.5rem;
        }

        /* Lista de Itens */
        .lista-items {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .lista-items li {
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .lista-items li:last-child {
            border-bottom: none;
        }

        .lista-items li i {
            color: #ffd700;
            font-size: 1rem;
        }

        .lista-items li strong {
            color: #ad2121;
            min-width: 120px;
        }

        .lista-items li span {
            color: #666;
            font-size: 0.9rem;
        }

        /* Ações Rápidas */
        .acoes-rapidas {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .btn-acao {
            background: linear-gradient(135deg, #ad2121, #e23636);
            color: white;
            padding: 0.8rem;
            text-align: center;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: 1px solid #ffd700;
        }

        .btn-acao:hover {
            background: linear-gradient(135deg, #e23636, #ad2121);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(226, 54, 54, 0.4);
            color: #ffd700;
        }

        /* Informações do Universo */
        .info-universo p {
            margin: 0.8rem 0;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
        }

        .info-universo p i {
            color: #ffd700;
            font-size: 1.1rem;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, #ad2121, #e23636);
            border-radius: 15px;
            padding: 1.5rem;
            border: 2px solid #ffd700;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .welcome-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .welcome-content i {
            font-size: 3rem;
            color: #ffd700;
        }

        .welcome-content h3 {
            color: white;
            margin: 0 0 0.3rem 0;
            font-family: 'Bangers', cursive;
            letter-spacing: 1px;
        }

        .welcome-content p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .welcome-content {
                flex-direction: column;
                text-align: center;
            }

            .dashboard-title {
                font-size: 1.5rem;
            }

            .acoes-rapidas {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .stat-card {
                flex-direction: column;
                text-align: center;
            }

            .lista-items li {
                flex-direction: column;
                text-align: center;
                gap: 5px;
            }
        }
    </style>
</x-app-layout>