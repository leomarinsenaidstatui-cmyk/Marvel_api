<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚡ MARVEL STUDIOS - HERO DATABASE ⚡</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bangers&family=Marvel:wght@400;700&family=Oswald:wght@500;700&family=Roboto+Condensed:wght@400;700;900&display=swap');
       
        /* ===== VARIÁVEIS TEMÁTICAS MARVEL ===== */
        :root {
            --marvel-primary: #ED1D24;
            --marvel-secondary: #B11313;
            --marvel-dark: #0A0A0A;
            --marvel-darker: #000000;
            --marvel-light: #F5F5F5;
            --marvel-gold: #FFD700;
            --marvel-silver: #C0C0C0;
            --marvel-blue: #2A6F97;
            --marvel-iron: #D8412F;
            --marvel-captain: #003153;
            --marvel-hulk: #2E8B57;
            --marvel-thor: #4A6C8F;
            --marvel-spider: #1E3A5F;
            --marvel-wolverine: #8B4513;
            --marvel-blackpanther: #2D2D2D;
            --gradient-marvel: linear-gradient(135deg, #ED1D24 0%, #B11313 50%, #8B0000 100%);
            --gradient-gold: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            --gradient-dark: linear-gradient(145deg, #1A1A1A 0%, #0A0A0A 100%);
            --shadow-marvel: 0 10px 30px rgba(237, 29, 36, 0.4);
            --shadow-gold: 0 10px 30px rgba(255, 215, 0, 0.3);
            --border-comic: 4px solid #ED1D24;
            --border-gold: 4px solid #FFD700;
        }

        /* ===== RESET E ESTILOS GLOBAIS ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--marvel-darker);
            font-family: 'Roboto Condensed', 'Marvel', sans-serif;
            color: var(--marvel-light);
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><polygon points="50,0 61,35 98,35 68,57 79,92 50,72 21,92 32,57 2,35 39,35" fill="%23ED1D24"/></svg>'),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><circle cx="50" cy="50" r="40" fill="none" stroke="%23FFD700" stroke-width="2"/><circle cx="50" cy="50" r="30" fill="none" stroke="%23FFD700" stroke-width="2"/></svg>');
            background-size: 120px 120px, 150px 150px;
            background-position: 0 0, 50px 50px;
            pointer-events: none;
            z-index: 0;
        }

        /* ===== HEADER ÉPICO MARVEL ===== */
        .marvel-header {
            background: linear-gradient(165deg, #000000 0%, #0A0A0A 40%, #B11313 120%);
            border-bottom: 8px solid var(--marvel-gold);
            padding: 2.5rem 0;
            margin-bottom: 3rem;
            position: relative;
            box-shadow: var(--shadow-marvel);
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
            z-index: 10;
        }

        .marvel-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                rgba(255, 215, 0, 0.1) 0px,
                rgba(255, 215, 0, 0.1) 2px,
                transparent 2px,
                transparent 8px
            );
            pointer-events: none;
        }

        .marvel-header::after {
            content: '⚡⚡⚡⚡⚡';
            position: absolute;
            bottom: -16px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--marvel-gold);
            font-size: 24px;
            letter-spacing: 20px;
            text-shadow: 0 0 20px #FFD700, 0 0 40px #ED1D24;
            background: var(--marvel-dark);
            padding: 8px 40px;
            border-radius: 50px;
            border: 3px solid var(--marvel-primary);
            z-index: 20;
        }

        .marvel-logo {
            font-family: 'Bangers', cursive;
            font-size: 5rem;
            font-weight: 400;
            color: #FFFFFF;
            text-shadow:
                6px 6px 0 var(--marvel-primary),
                10px 10px 0 rgba(0, 0, 0, 0.5),
                0 0 40px rgba(237, 29, 36, 0.8);
            letter-spacing: 6px;
            transform: rotate(-3deg);
            display: inline-block;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .marvel-logo:hover {
            transform: rotate(-2deg) scale(1.05);
            text-shadow:
                6px 6px 0 var(--marvel-primary),
                12px 12px 0 #000000,
                0 0 60px #FFD700;
        }

        .marvel-logo i {
            color: var(--marvel-gold);
            display: inline-block;
            animation: thunder 2s infinite;
        }

        @keyframes thunder {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.1); color: #FFD700; text-shadow: 0 0 30px #FFD700; }
        }

        .marvel-subtitle {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--marvel-gold);
            text-transform: uppercase;
            letter-spacing: 6px;
            border-left: 8px solid var(--marvel-primary);
            padding-left: 20px;
            margin-top: 15px;
            text-shadow: 3px 3px 0 rgba(0,0,0,0.7);
            font-family: 'Oswald', sans-serif;
        }

        .btn-new-hero {
            background: var(--gradient-gold);
            color: var(--marvel-dark);
            font-weight: 900;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            border: 4px solid #FFFFFF;
            box-shadow: 0 8px 0 #B8860B, 0 12px 25px rgba(0,0,0,0.5);
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            transition: all 0.1s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-new-hero:hover {
            transform: translateY(4px);
            box-shadow: 0 4px 0 #B8860B, 0 12px 25px rgba(0,0,0,0.5);
            color: var(--marvel-dark);
            background: #FFD700;
        }

        .btn-new-hero i {
            margin-right: 10px;
            color: var(--marvel-primary);
            font-size: 1.4rem;
        }

        /* ===== CARDS DE HERÓIS - ESTILO QUADRINHOS PREMIUM ===== */
        .hero-card {
            background: var(--gradient-dark);
            border: 4px solid var(--marvel-primary);
            border-radius: 30px;
            box-shadow:
                15px 15px 0 rgba(0,0,0,0.8),
                20px 20px 0 rgba(237, 29, 36, 0.4),
                inset 0 -8px 0 rgba(0,0,0,0.6),
                inset 0 2px 0 rgba(255,255,255,0.1);
            margin-bottom: 2.5rem;
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
            position: relative;
            overflow: visible;
            backdrop-filter: blur(10px);
        }

        .hero-card:hover {
            transform: translate(-8px, -8px);
            box-shadow:
                20px 20px 0 rgba(0,0,0,0.8),
                25px 25px 0 rgba(255, 215, 0, 0.5),
                inset 0 -8px 0 var(--marvel-primary);
            border-color: var(--marvel-gold);
        }

        .hero-card::before {
            content: '★★★★★';
            position: absolute;
            top: -15px;
            left: 30px;
            color: var(--marvel-gold);
            font-size: 18px;
            letter-spacing: 8px;
            text-shadow: 0 0 15px #FFD700;
            background: var(--marvel-dark);
            padding: 5px 20px;
            border-radius: 50px;
            border: 2px solid var(--marvel-primary);
            z-index: 15;
        }

        .hero-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 70%, rgba(237, 29, 36, 0.1) 100%);
            border-radius: 26px;
            pointer-events: none;
        }

        .hero-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: var(--gradient-marvel);
            border: 6px solid var(--marvel-gold);
            box-shadow:
                0 0 0 6px var(--marvel-dark),
                0 15px 30px rgba(0,0,0,0.6),
                0 0 40px rgba(237, 29, 36, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
            font-weight: 900;
            margin: -70px auto 1.5rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-family: 'Bangers', cursive;
            position: relative;
            z-index: 20;
            text-transform: uppercase;
            transform: rotate(0deg);
        }

        .hero-card:hover .hero-avatar {
            transform: scale(1.15) rotate(15deg);
            border-color: #FFFFFF;
            box-shadow:
                0 0 0 6px var(--marvel-gold),
                0 20px 40px rgba(0,0,0,0.8),
                0 0 60px #FFD700;
            background: linear-gradient(135deg, #FF4D4D, #B11313);
        }

        .hero-name {
            font-size: 2.2rem;
            font-weight: 900;
            color: #FFFFFF;
            text-shadow:
                4px 4px 0 var(--marvel-primary),
                6px 6px 0 rgba(0,0,0,0.8);
            margin-bottom: 0.3rem;
            font-family: 'Bangers', cursive;
            letter-spacing: 3px;
            line-height: 1.1;
            word-break: break-word;
        }

        .hero-alterego {
            color: #CCCCCC;
            font-size: 1.1rem;
            padding-bottom: 1.2rem;
            border-bottom: 3px dashed var(--marvel-primary);
            margin-bottom: 1.2rem;
            font-style: italic;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .hero-team {
            background: linear-gradient(90deg, var(--marvel-primary), #8B0000);
            color: white;
            padding: 0.7rem 2rem;
            border-radius: 50px;
            display: inline-block;
            font-weight: 800;
            font-size: 1.1rem;
            text-transform: uppercase;
            border: 3px solid var(--marvel-gold);
            box-shadow: 0 6px 0 #4A0C0C;
            letter-spacing: 3px;
            margin-bottom: 0.5rem;
        }

        .hero-stats {
            background: rgba(10, 10, 10, 0.9);
            border-radius: 20px;
            padding: 1.3rem;
            margin: 1.5rem 0;
            border: 2px solid var(--marvel-primary);
            backdrop-filter: blur(10px);
            box-shadow: inset 0 0 20px rgba(0,0,0,0.8);
        }

        .stat-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.9rem;
            border-bottom: 1px solid rgba(237, 29, 36, 0.4);
            padding-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .stat-label {
            color: #AAAAAA;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            color: var(--marvel-gold);
            font-weight: 900;
            font-size: 1.2rem;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }

        /* ===== BOTÕES MARVEL ===== */
        .btn-marvel {
            background: linear-gradient(180deg, var(--marvel-primary), #8B0000);
            color: white;
            border: none;
            border-radius: 60px;
            padding: 0.9rem 2rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            border-bottom: 6px solid #4A0C0C;
            transition: all 0.08s linear;
            box-shadow: 0 8px 0 #4A0C0C, 0 10px 20px rgba(0,0,0,0.3);
            font-size: 1rem;
            position: relative;
            overflow: hidden;
        }

        .btn-marvel::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-marvel:hover::before {
            left: 100%;
        }

        .btn-marvel:hover {
            background: linear-gradient(180deg, #FF4D4D, #9B1D1D);
            color: white;
            transform: translateY(4px);
            box-shadow: 0 4px 0 #4A0C0C, 0 12px 20px rgba(0,0,0,0.3);
            border-bottom-width: 4px;
        }

        .btn-outline-marvel {
            background: transparent;
            border: 3px solid var(--marvel-primary);
            color: var(--marvel-light);
            border-radius: 60px;
            padding: 0.8rem 1.8rem;
            font-weight: 800;
            transition: all 0.2s;
            border-bottom-width: 6px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .btn-outline-marvel:hover {
            background: var(--marvel-primary);
            border-color: var(--marvel-gold);
            color: white;
            transform: scale(0.96);
            border-bottom-width: 4px;
        }

        .btn-outline-danger {
            border: 3px solid #8B0000;
            color: #FF6B6B;
            border-bottom-width: 6px;
            background: transparent;
            border-radius: 60px;
            padding: 0.8rem 1.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .btn-outline-danger:hover {
            background: #8B0000;
            color: white;
            border-color: var(--marvel-gold);
            border-bottom-width: 4px;
            transform: translateY(2px);
        }

        /* ===== FORMULÁRIO MARVEL ===== */
        .form-marvel {
            background: linear-gradient(165deg, #1A1A1A, #0A0A0A);
            border: 6px solid var(--marvel-primary);
            border-radius: 40px;
            padding: 2.5rem;
            box-shadow:
                20px 20px 0 rgba(0,0,0,0.7),
                25px 25px 0 rgba(237, 29, 36, 0.3),
                inset 0 -8px 0 rgba(0,0,0,0.7);
            margin-bottom: 3rem;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .form-marvel::before {
            content: '⚡ NOVO REGISTRO ⚡';
            position: absolute;
            top: -20px;
            left: 30px;
            background: var(--marvel-gold);
            color: var(--marvel-dark);
            padding: 10px 30px;
            border-radius: 60px;
            font-weight: 900;
            font-size: 1.2rem;
            letter-spacing: 3px;
            border: 3px solid var(--marvel-primary);
            box-shadow: 0 6px 0 #B8860B;
            font-family: 'Oswald', sans-serif;
        }

        .form-marvel .form-control,
        .form-marvel .form-select {
            background: #252525;
            border: 3px solid #3D3D3D;
            color: white;
            border-radius: 16px;
            padding: 1rem 1.2rem;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .form-marvel .form-control:focus,
        .form-marvel .form-select:focus {
            background: #2D2D2D;
            border-color: var(--marvel-gold);
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.3);
            color: white;
            transform: scale(1.01);
        }

        .form-marvel .form-label {
            color: var(--marvel-gold);
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.95rem;
            margin-bottom: 0.7rem;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.8);
        }

        .form-marvel .form-text {
            color: #AAAAAA !important;
            font-weight: 500;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* ===== MODAL MARVEL ===== */
        .modal-content {
            background: linear-gradient(165deg, #1E1E1E, #0A0A0A);
            border: 8px solid var(--marvel-primary);
            border-radius: 50px;
            box-shadow: 0 30px 60px rgba(237, 29, 36, 0.5);
        }

        .modal-header {
            background: linear-gradient(90deg, var(--marvel-primary), #6A0E0E);
            border-bottom: 6px solid var(--marvel-gold);
            padding: 1.8rem;
            border-radius: 42px 42px 0 0;
        }

        .modal-title {
            font-family: 'Bangers', cursive;
            font-size: 2.5rem;
            letter-spacing: 4px;
            color: white;
            text-shadow: 3px 3px 0 #000000;
        }

        .modal-body {
            padding: 2.5rem;
        }

        .modal-footer {
            border-top: 4px solid var(--marvel-primary);
            padding: 1.8rem;
            border-radius: 0 0 42px 42px;
        }

        /* ===== TABELA DE DETALHES ===== */
        .table {
            color: white;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        .table th {
            color: var(--marvel-gold);
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.95rem;
            border: none;
            background: rgba(237, 29, 36, 0.2);
            border-radius: 15px 0 0 15px;
            padding: 15px 20px;
            vertical-align: middle;
        }

        .table td {
            color: white;
            border: none;
            background: rgba(0,0,0,0.4);
            border-radius: 0 15px 15px 0;
            padding: 15px 20px;
            font-weight: 500;
            font-size: 1.1rem;
            vertical-align: middle;
        }

        /* ===== BADGES E TAGS ===== */
        .badge-team {
            background: linear-gradient(45deg, var(--marvel-primary), #6A0E0E);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 60px;
            font-weight: 800;
            border: 3px solid var(--marvel-gold);
            display: inline-block;
            box-shadow: 0 6px 0 #3A0A0A;
            font-size: 1.1rem;
            letter-spacing: 2px;
        }

        .bg-marvel {
            background: linear-gradient(45deg, var(--marvel-primary), #8B1A1A) !important;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 60px;
            font-weight: 700;
            border: 2px solid var(--marvel-gold);
            font-size: 0.9rem;
            display: inline-block;
            margin: 0.2rem;
            box-shadow: 0 2px 0 #4A0C0C;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: linear-gradient(145deg, #1A1A1A, #0F0F0F);
            border: 6px dashed var(--marvel-primary);
            border-radius: 50px;
            margin: 2rem 0;
            position: relative;
        }

        .empty-state i {
            font-size: 6rem;
            color: var(--marvel-primary);
            text-shadow: 0 0 40px rgba(237, 29, 36, 0.8);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.9; }
        }

        .empty-state h4 {
            color: white;
            font-size: 2.5rem;
            font-family: 'Bangers', cursive;
            letter-spacing: 5px;
            margin-top: 2rem;
            text-shadow: 4px 4px 0 var(--marvel-primary);
        }

        /* ===== POWER LEVEL ===== */
        .power-level {
            width: 100%;
            height: 14px;
            background: #1A1A1A;
            border-radius: 20px;
            margin: 1.2rem 0;
            border: 2px solid var(--marvel-primary);
            overflow: hidden;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.5);
        }

        .power-level-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--marvel-gold), var(--marvel-primary), #8B0000);
            border-radius: 20px;
            position: relative;
            box-shadow: 0 0 20px var(--marvel-gold);
            transition: width 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
        }

        /* ===== ALERTA MARVEL ===== */
        .alert-marvel {
            background: linear-gradient(90deg, var(--marvel-primary), #8B1A1A);
            color: white;
            border: 4px solid var(--marvel-gold);
            border-radius: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 1.2rem 2rem;
            box-shadow: 0 10px 0 #4A0C0C;
            position: relative;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(0deg, #000000, #0A0A0A);
            border-top: 8px solid var(--marvel-primary) !important;
            margin-top: 5rem !important;
            padding: 3rem 0 !important;
            position: relative;
            clip-path: polygon(0 20%, 100% 0, 100% 100%, 0 100%);
        }

        .footer::before {
            content: '★★★★★★★★★★';
            position: absolute;
            top: -22px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--marvel-gold);
            font-size: 24px;
            letter-spacing: 15px;
            background: var(--marvel-dark);
            padding: 8px 40px;
            border-radius: 60px;
            border: 3px solid var(--marvel-primary);
            text-shadow: 0 0 20px #FFD700;
        }

        /* ===== LOADING SPINNER ===== */
        .loading-spinner {
            width: 5rem;
            height: 5rem;
            border: 8px solid rgba(237, 29, 36, 0.3);
            border-top-color: var(--marvel-gold);
            border-right-color: var(--marvel-primary);
            border-bottom-color: var(--marvel-gold);
            border-left-color: var(--marvel-primary);
            border-radius: 50%;
            animation: spinner 1s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
        }

        @keyframes spinner {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            margin-top: 1.8rem;
        }

        .action-buttons .btn {
            border-radius: 60px;
            font-weight: 800;
            flex: 1 1 auto;
        }

        /* ===== HERO COUNT ===== */
        #hero-count {
            background: var(--gradient-marvel);
            padding: 0.6rem 1.5rem;
            border-radius: 60px;
            border: 3px solid var(--marvel-gold);
            font-weight: 900;
            font-size: 1.3rem;
            color: white;
            text-shadow: 2px 2px 0 #000000;
            box-shadow: 0 5px 0 #4A0C0C;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 16px;
        }

        ::-webkit-scrollbar-track {
            background: var(--marvel-dark);
            border-left: 2px solid var(--marvel-primary);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, var(--marvel-primary), #8B0000);
            border: 3px solid var(--marvel-gold);
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #FF4D4D, #B11313);
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 992px) {
            .marvel-logo {
                font-size: 3.8rem;
            }
           
            .hero-avatar {
                width: 110px;
                height: 110px;
                font-size: 3rem;
                margin-top: -60px;
            }
           
            .hero-name {
                font-size: 1.9rem;
            }
        }

        @media (max-width: 768px) {
            .marvel-logo {
                font-size: 2.8rem;
                letter-spacing: 3px;
            }
           
            .marvel-subtitle {
                font-size: 1.1rem;
                letter-spacing: 3px;
            }
           
            .hero-avatar {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
                margin-top: -55px;
            }
           
            .hero-name {
                font-size: 1.7rem;
            }
           
            .btn-new-hero {
                padding: 0.8rem 1.8rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .marvel-logo {
                font-size: 2.2rem;
            }
           
            .hero-avatar {
                width: 90px;
                height: 90px;
                font-size: 2.2rem;
                margin-top: -50px;
            }
           
            .hero-name {
                font-size: 1.5rem;
            }
           
            .form-marvel::before {
                font-size: 0.9rem;
                padding: 8px 20px;
            }
        }

        /* ===== EFEITOS ESPECIAIS ===== */
        .comic-dots {
            background: radial-gradient(circle at 50% 50%, var(--marvel-primary) 1.5px, transparent 1.5px);
            background-size: 25px 25px;
            opacity: 0.05;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 5;
        }

        .hero-card .card-body {
            padding: 1.8rem;
            position: relative;
            z-index: 10;
        }

        .btn-close-white {
            filter: brightness(0) invert(1);
            opacity: 1;
        }

        .text-white-50 {
            color: rgba(255, 255, 255, 0.7) !important;
        }
    </style>
</head>
<body>
    <!-- COMIC DOTS BACKGROUND -->
    <div class="comic-dots"></div>

    <!-- HEADER MARVEL STUDIOS -->
    <header class="marvel-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7">
                    <h1 class="marvel-logo">
                        <i class="bi bi-lightning-charge-fill"></i> MARVEL STUDIOS
                    </h1>
                    <p class="marvel-subtitle">
                        <i class="bi bi-shield-fill-check"></i> HERO DATABASE • EARTH-616
                    </p>
                </div>
                <div class="col-lg-4 col-md-5 text-md-end text-start mt-4 mt-md-0">
                    <button class="btn btn-new-hero" onclick="showForm()">
                        <i class="bi bi-plus-circle-fill"></i> NOVO HERÓI
                    </button>
                    <p class="text-white-50 mt-3 mb-0 small">
                        <i class="bi bi-joystick"></i> "EXCELSIOR!" - STAN LEE ⚡
                    </p>
                </div>
            </div>
        </div>
    </header>

    <div class="container position-relative" style="z-index: 10;">
        <!-- ALERTAS TEMÁTICOS -->
        <div id="alert-container" class="mb-4"></div>
       
        <!-- FORMULÁRIO DE CADASTRO/EDIÇÃO -->
        <div class="form-marvel" id="hero-form-container" style="display: none;">
            <div class="d-flex align-items-center mb-5">
                <div class="hero-avatar" style="width: 80px; height: 80px; font-size: 2.2rem; margin: 0; border-width: 4px;">
                    <i class="bi bi-pencil-fill"></i>
                </div>
                <h3 class="ms-4 mb-0 text-white" id="form-title" style="font-family: 'Bangers', cursive; font-size: 2.2rem; letter-spacing: 3px;">
                    <span style="color: var(--marvel-gold); text-shadow: 3px 3px 0 #8B0000;">⚡</span> CADASTRO DE HERÓI
                </h3>
            </div>
           
            <form id="hero-form">
                <input type="hidden" id="hero-id">
               
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="nome" class="form-label">
                            <i class="bi bi-person-badge-fill"></i> NOME REAL
                        </label>
                        <input type="text" class="form-control" id="nome" name="nome" required
                               placeholder="Ex: Peter Benjamin Parker">
                        <div class="form-text">Identidade secreta do herói</div>
                    </div>
                   
                    <div class="col-md-6 mb-4">
                        <label for="codinome" class="form-label">
                            <i class="bi bi-mask"></i> CODINOME
                        </label>
                        <input type="text" class="form-control" id="codinome" name="codinome" required
                               placeholder="Ex: Homem-Aranha / Spider-Man">
                        <div class="form-text">Nome de super-herói</div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <label for="idade" class="form-label">
                            <i class="bi bi-calendar-heart-fill"></i> IDADE
                        </label>
                        <input type="number" class="form-control" id="idade" name="idade" min="0" max="1000" required
                               placeholder="25">
                        <div class="form-text">Idade atual</div>
                    </div>
                   
                    <div class="col-md-9 mb-4">
                        <label for="habilidades" class="form-label">
                            <i class="bi bi-stars"></i> HABILIDADES ESPECIAIS
                        </label>
                        <input type="text" class="form-control" id="habilidades" name="habilidades" required
                               placeholder="Força sobre-humana, Agilidade, Sentido de aranha, Lançador de teias">
                        <div class="form-text">Separe as habilidades por vírgula</div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="equipe" class="form-label">
                            <i class="bi bi-people-fill"></i> EQUIPE/AFILIAÇÃO
                        </label>
                        <select class="form-select" id="equipe" name="equipe" required>
                            <option value="">SELECIONE UMA EQUIPE</option>
                            <option value="Vingadores">⚔️ VINGADORES (AVENGERS)</option>
                            <option value="X-Men">❌ X-MEN</option>
                            <option value="Quarteto Fantástico">4️⃣ QUARTETO FANTÁSTICO</option>
                            <option value="Guardiões da Galáxia">🌌 GUARDIÕES DA GALÁXIA</option>
                            <option value="Defensores">🛡️ DEFENSORES</option>
                            <option value="Irmandade de Mutantes">☠️ IRMANDADE DE MUTANTES</option>
                            <option value="Esquadrão Sinistro">🦹 ESQUADRÃO SINISTRO</option>
                            <option value="Illuminati">👁️ ILLUMINATI</option>
                            <option value="Eternos">✨ ETERNOS</option>
                            <option value="Inumanos">🌋 INUMANOS</option>
                            <option value="Outros">⚡ OUTROS</option>
                        </select>
                    </div>
                   
                    <div class="col-md-6 mb-4">
                        <label for="primeira_aparicao" class="form-label">
                            <i class="bi bi-calendar2-week-fill"></i> PRIMEIRA APARIÇÃO
                        </label>
                        <input type="number" class="form-control" id="primeira_aparicao" name="primeira_aparicao"
                               min="1939" max="2025" required placeholder="1962">
                        <div class="form-text">Ano da 1ª aparição nos quadrinhos</div>
                    </div>
                </div>
               
                <div class="d-flex justify-content-end gap-3 mt-5">
                    <button type="button" class="btn btn-outline-secondary" onclick="hideForm()"
                            style="border: 3px solid #666; color: white; border-bottom-width: 6px; padding: 0.9rem 2.5rem; font-weight: 800; letter-spacing: 2px;">
                        <i class="bi bi-x-circle-fill"></i> CANCELAR
                    </button>
                    <button type="submit" class="btn btn-marvel" id="submit-btn" style="padding: 0.9rem 2.5rem;">
                        <i class="bi bi-save-fill"></i> SALVAR HERÓI
                    </button>
                </div>
            </form>
        </div>
       
        <!-- LISTA DE HERÓIS -->
        <div class="hero-card" style="overflow: visible;">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="hero-avatar" style="width: 70px; height: 70px; font-size: 1.8rem; margin: 0; border-width: 4px;">
                        <i class="bi bi-shield-fill"></i>
                    </div>
                    <h3 class="ms-4 mb-0 text-white" style="font-family: 'Bangers', cursive; font-size: 2.2rem; letter-spacing: 4px;">
                        HERÓIS CADASTRADOS
                        <span class="ms-3" id="hero-count" style="font-size: 1.8rem;">0</span>
                    </h3>
                </div>
               
                <!-- LOADING -->
                <div id="loading" class="text-center py-5">
                    <div class="spinner-border loading-spinner text-danger mb-4" role="status">
                        <span class="visually-hidden">Carregando...</span>
                    </div>
                    <p class="mt-3" style="color: var(--marvel-gold); font-size: 1.5rem; font-weight: 700; letter-spacing: 3px; text-transform: uppercase;">
                        CARREGANDO HERÓIS DO UNIVERSO MARVEL...
                    </p>
                </div>
               
                <!-- EMPTY STATE -->
                <div id="empty-state" class="empty-state" style="display: none;">
                    <i class="bi bi-emoji-frown"></i>
                    <h4>NENHUM HERÓI ENCONTRADO!</h4>
                    <p style="color: #CCCCCC; font-size: 1.3rem; margin-top: 1.5rem;">O universo Marvel está vazio e precisa de heróis!</p>
                    <p style="color: #AAAAAA; font-size: 1.1rem; margin-bottom: 2rem;">Seja o primeiro a adicionar um herói à base de dados.</p>
                    <button class="btn btn-marvel" onclick="showForm()" style="padding: 1rem 3rem; font-size: 1.2rem;">
                        <i class="bi bi-plus-circle-fill"></i> ADICIONAR PRIMEIRO HERÓI
                    </button>
                </div>
               
                <!-- CONTAINER DE CARDS -->
                <div id="heroes-container" class="row g-4 mt-2">
                    <!-- Cards serão inseridos via JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE DETALHES DO HERÓI -->
    <div class="modal fade" id="hero-detail-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail-hero-name">
                        <i class="bi bi-star-fill" style="color: var(--marvel-gold);"></i> HERÓI MARVEL
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="hero-avatar" id="detail-avatar" style="width: 160px; height: 160px; font-size: 4rem; margin: 0 auto 2rem;">
                                M
                            </div>
                            <h4 class="text-white mb-3" id="detail-codinome" style="font-family: 'Bangers', cursive; font-size: 2rem; letter-spacing: 2px;"></h4>
                            <span class="badge-team" id="detail-team"></span>
                           
                            <!-- POWER LEVEL INDICATOR -->
                            <div class="mt-5">
                                <span style="color: var(--marvel-gold); font-weight: 800; text-transform: uppercase; letter-spacing: 3px; font-size: 0.9rem;">
                                    <i class="bi bi-graph-up"></i> NÍVEL DE PODER
                                </span>
                                <div class="power-level">
                                    <div class="power-level-bar" id="detail-power" style="width: 85%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <th><i class="bi bi-person-fill"></i> NOME REAL</th>
                                    <td id="detail-nome">---</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-calendar-fill"></i> IDADE</th>
                                    <td id="detail-idade">---</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-calendar2-week-fill"></i> 1ª APARIÇÃO</th>
                                    <td id="detail-first-appearance">---</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-stars"></i> HABILIDADES</th>
                                    <td id="detail-habilidades">---</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-clock-fill"></i> CRIADO EM</th>
                                    <td id="detail-created">---</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-clock-history"></i> ATUALIZADO</th>
                                    <td id="detail-updated">---</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-marvel" data-bs-dismiss="modal" style="padding: 0.8rem 2.5rem;">
                        <i class="bi bi-x-lg"></i> FECHAR
                    </button>
                </div>
            </div>
        </div>
    </div>

   
