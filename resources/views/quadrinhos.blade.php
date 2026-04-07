@extends('layouts.navbar')

@section('content')
<div class="heroes-container">
    <!-- Header com estilo Marvel -->
    <div class="heroes-header">
        <div class="header-content">
            <h1 class="header-title">
                <i class="bi bi-book-fill"></i> 
                QUADRINHOS MARVEL
            </h1>
            <p class="header-subtitle">
                <i class="bi bi-stars"></i>
                Total de quadrinhos registrados: 
                <span class="hero-total"><?php echo isset($quadrinhos) ? count($quadrinhos) : 0; ?></span>
            </p>
        </div>
        <a href="{{route('lancar_quadrinhos')}}" class="btn-novo-heroi">
            <i class="bi bi-plus-circle"></i>
            Novo Quadrinho
        </a>
    </div>

    <!-- Tabela com design premium -->
    <div class="table-wrapper">
        <table class="marvel-table">
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>HERÓI</th>
                    <th>AUTOR</th>
                    <th>ILUSTRADOR</th>
                    <th>EDITORA</th>
                    <th>DATA DE LANÇAMENTO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($quadrinhos) && count($quadrinhos) > 0) {
                    foreach($quadrinhos as $quadrinho) {
                ?>
                <tr class="hero-row">
                    <td class="hero-nome"><?php echo $quadrinho->nome; ?></td>
                    <td class="hero-heroi"><strong><?php echo $quadrinho->heroi; ?></strong></td>
                    <td class="hero-autor"><?php echo $quadrinho->autor; ?></td>
                    <td class="hero-ilustrador">
                        <?php echo $quadrinho->ilustrador; ?>
                    </td>
                    <td class="hero-editora">
                        <span class="editora-badge"><?php echo $quadrinho->editora; ?></span>
                    </td>
                    <td class="hero-ano"><?php echo date('d/m/Y', strtotime($quadrinho->data_de_lancamento)); ?></td>
                    <td class="hero-acoes">
                        <a href="/edita_quadrinho/<?php echo $quadrinho->id; ?>" class="btn-ver">
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
                            <h3>Nenhum quadrinho cadastrado</h3>
                            <p>O universo Marvel está esperando por novos quadrinhos!</p>
                            <a href="{{route('lancar_quadrinhos')}}" class="btn-cadastrar-empty">
                                <i class="bi bi-plus-circle"></i>
                                Cadastrar Primeiro Quadrinho
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

    /* Botão Novo Quadrinho */
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

    /* Nome do quadrinho */
    .hero-nome {
        font-weight: 600;
        color: #ad2121;
    }

    /* Herói */
    .hero-heroi strong {
        color: #e23636;
        font-size: 1rem;
    }

    /* Autor e Ilustrador */
    .hero-autor, .hero-ilustrador {
        color: #555;
    }

    /* Badge de editora */
    .editora-badge {
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

    /* Data */
    .hero-ano {
        font-family: monospace;
        font-weight: 600;
        color: #17a2b8;
        font-size: 0.95rem;
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
        .marvel-table td:nth-child(3),
        .marvel-table th:nth-child(4),
        .marvel-table td:nth-child(4) {
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
    }

    @media (max-width: 576px) {
        .marvel-table th:nth-child(2),
        .marvel-table td:nth-child(2) {
            display: none;
        }

        .btn-ver {
            padding: 0.5rem 1rem;
        }
    }
</style>
@endsection