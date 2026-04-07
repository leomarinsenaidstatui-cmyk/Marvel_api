@extends('layouts.navbar')

@section('content')
<div class="heroes-container">
    <!-- Header com estilo Marvel -->
    <div class="heroes-header">
        <div class="header-content">
            <h1 class="header-title">
                <i class="bi bi-shield-shaded"></i> 
                BASE DE HERÓIS MARVEL
            </h1>
            <p class="header-subtitle">
                <i class="bi bi-stars"></i>
                Total de heróis registrados: 
                <span class="hero-total"><?php echo isset($herois) ? count($herois) : 0; ?></span>
            </p>
        </div>
        <a href="{{route('inicio')}}" class="btn-novo-heroi">
            <i class="bi bi-plus-circle"></i>
            Novo Herói
        </a>
    </div>

    <!-- Tabela com design premium -->
    <div class="table-wrapper">
        <table class="marvel-table">
            <thead>
                <tr>
                    <th>NOME REAL</th>
                    <th>CODINOME</th>
                    <th>IDADE</th>
                    <th>HABILIDADES</th>
                    <th>EQUIPE</th>
                    <th>1ª APARIÇÃO</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($herois) && count($herois) > 0) {
                    foreach($herois as $heroi) {
                ?>
                <tr class="hero-row">
                    <td class="hero-nome"><?php echo $heroi->nome; ?></td>
                    <td class="hero-codinome"><strong><?php echo $heroi->codinome; ?></strong></td>
                    <td class="hero-idade"><?php echo $heroi->idade; ?> anos</td>
                    <td class="hero-habilidades">
                        <div class="habilidades-container">
                            <?php 
                            $habilidades = explode(',', $heroi->habilidades);
                            $count = 0;
                            foreach($habilidades as $hab) {
                                if($count < 2) {
                                    echo '<span class="habilidade-badge">' . trim($hab) . '</span>';
                                }
                                $count++;
                            }
                            if(count($habilidades) > 2) {
                                echo '<span class="habilidade-more">+' . (count($habilidades) - 2) . '</span>';
                            }
                            ?>
                        </div>
                    </td>
                    <td class="hero-equipe">
                        <span class="equipe-badge"><?php echo $heroi->equipe; ?></span>
                    </td>
                    <td class="hero-ano"><?php echo $heroi->primeira_aparicao; ?></td>
                    <td class="hero-acoes">
                        <a href="/visualiza_heroi/<?php echo $heroi->id; ?>" class="btn-ver">
                            <i class="bi bi-eye-fill"></i>
                            Ver
                        </a>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                ?>
                <tr>
                    <td colspan="7" class="empty-state">
                        <div class="empty-content">
                            <i class="bi bi-emoji-frown"></i>
                            <h3>Nenhum herói cadastrado</h3>
                            <p>O universo Marvel está esperando por novos heróis!</p>
                            <a href="{{route('inicio')}}" class="btn-cadastrar-empty">
                                <i class="bi bi-plus-circle"></i>
                                Cadastrar Primeiro Herói
                            </a>
                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Container principal */
    .heroes-container {
        max-width: 1300px;
        margin: 2rem auto;
        padding: 0 2rem;
        animation: fadeIn 0.5s ease;
    }

    /* Header com gradiente Marvel */
    .heroes-header {
        background: linear-gradient(135deg, #ad2121 0%, #e23636 100%);
        border-radius: 20px;
        padding: 2rem 2.5rem;
        margin-bottom: 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border: 3px solid #ffd700;
        position: relative;
        overflow: hidden;
    }

    .heroes-header::before {
        content: "⚡";
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 8rem;
        opacity: 0.1;
        color: white;
        font-family: 'Bangers', cursive;
    }

    .header-content {
        position: relative;
        z-index: 1;
    }

    .header-title {
        font-family: 'Bangers', cursive;
        color: white;
        font-size: 2.5rem;
        margin: 0 0 0.5rem 0;
        text-shadow: 3px 3px 0 #000;
        letter-spacing: 2px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .header-title i {
        color: #ffd700;
        font-size: 2.8rem;
    }

    .header-subtitle {
        color: white;
        margin: 0;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .header-subtitle i {
        color: #ffd700;
    }

    .hero-total {
        background: #ffd700;
        color: #ad2121;
        padding: 0.2rem 1rem;
        border-radius: 50px;
        font-weight: bold;
        font-size: 1.2rem;
        margin-left: 0.5rem;
        border: 2px solid white;
    }

    /* Botão Novo Herói */
    .btn-novo-heroi {
        background: #ffd700;
        color: #ad2121;
        padding: 1rem 2rem;
        border-radius: 15px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: 2px solid white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .btn-novo-heroi i {
        font-size: 1.3rem;
    }

    .btn-novo-heroi:hover {
        background: white;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(255, 215, 0, 0.5);
        border-color: #ffd700;
    }

    /* Wrapper da tabela */
    .table-wrapper {
        background: white;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2), 0 0 0 3px #ad2121;
        overflow: hidden;
        border: 2px solid #ffd700;
    }

    /* Tabela */
    .marvel-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    .marvel-table thead {
        background: linear-gradient(135deg, #2d2d2d, #1a1a1a);
    }

    .marvel-table th {
        color: #ffd700;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
        padding: 1.2rem 1rem;
        text-align: left;
        border-bottom: 3px solid #ad2121;
        font-family: 'Bangers', cursive;
        font-size: 1.1rem;
        text-shadow: 1px 1px 0 #000;
    }

    .marvel-table td {
        padding: 1.2rem 1rem;
        border-bottom: 1px solid #eee;
        color: #333;
        vertical-align: middle;
    }

    .marvel-table tbody tr {
        transition: all 0.3s ease;
    }

    .marvel-table tbody tr:hover {
        background: rgba(226, 54, 54, 0.05);
        transform: scale(1.01);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Nome do herói */
    .hero-nome {
        font-weight: 500;
        color: #555;
    }

    /* Codinome */
    .hero-codinome strong {
        color: #ad2121;
        font-size: 1.1rem;
        text-transform: uppercase;
    }

    /* Idade */
    .hero-idade {
        font-weight: 600;
        color: #666;
    }

    /* Container de habilidades */
    .habilidades-container {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        align-items: center;
    }

    .habilidade-badge {
        background: linear-gradient(135deg, #ad2121, #e23636);
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        border: 1px solid #ffd700;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .habilidade-more {
        background: #333;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        border: 1px solid #ffd700;
    }

    /* Badge de equipe */
    .equipe-badge {
        background: linear-gradient(135deg, #333, #555);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        border: 1px solid #ffd700;
        display: inline-block;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Ano */
    .hero-ano {
        font-family: monospace;
        font-weight: 700;
        color: #ad2121;
        font-size: 1rem;
    }

    /* Botão Ver */
    .hero-acoes {
        text-align: center;
    }

    .btn-ver {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        border: 1px solid #ffd700;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-ver i {
        font-size: 1rem;
    }

    .btn-ver:hover {
        background: #ffd700;
        color: #ad2121;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
        border-color: white;
    }

    /* Estado vazio */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem !important;
    }

    .empty-content {
        text-align: center;
        max-width: 400px;
        margin: 0 auto;
    }

    .empty-content i {
        font-size: 5rem;
        color: #ad2121;
        opacity: 0.3;
        margin-bottom: 1rem;
    }

    .empty-content h3 {
        color: #333;
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
        font-family: 'Bangers', cursive;
        letter-spacing: 1px;
    }

    .empty-content p {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .btn-cadastrar-empty {
        background: linear-gradient(135deg, #ad2121, #e23636);
        color: white;
        padding: 1rem 2rem;
        border-radius: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: 2px solid #ffd700;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-cadastrar-empty:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(226, 54, 54, 0.5);
        background: linear-gradient(135deg, #e23636, #ad2121);
    }

    /* Animação */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsividade */
    @media (max-width: 992px) {
        .marvel-table th:nth-child(3),
        .marvel-table td:nth-child(3) {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .heroes-container {
            padding: 0 1rem;
        }

        .heroes-header {
            flex-direction: column;
            text-align: center;
            padding: 1.5rem;
        }

        .header-title {
            font-size: 2rem;
            justify-content: center;
        }

        .btn-novo-heroi {
            width: 100%;
            justify-content: center;
        }

        .marvel-table th:nth-child(4),
        .marvel-table td:nth-child(4) {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .marvel-table th:nth-child(5),
        .marvel-table td:nth-child(5) {
            display: none;
        }

        .btn-ver {
            padding: 0.5rem 1rem;
        }
    }
</style>
@endsection