<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚡ MARVEL STUDIOS - HERO DATABASE ⚡</title>
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bangers&family=Montserrat:wght@300;400;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(145deg, #0a0a0a 0%, #1f1f1f 100%);
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
            position: relative;
            overflow-x: hidden;
            color: #e0e0e0;
        }

        /* Efeito de fundo cinematográfico */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(226, 54, 54, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* Partículas de fundo (efeito de estrelas) */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(2px 2px at 15px 60px, #fff, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 72px 433px, #fff, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 850px 330px, #ffd700, rgba(0,0,0,0)),
                radial-gradient(3px 3px at 243px 888px, #e23636, rgba(0,0,0,0));
            background-size: 200px 200px;
            background-repeat: repeat;
            opacity: 0.3;
            animation: starsPulse 8s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes starsPulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.5; }
        }

        /* Navbar Aprimorada */
        .navbar {
            background: linear-gradient(90deg, #ad2121 0%, #e23636 100%);
            padding: 1rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 0 2px rgba(255, 215, 0, 0.3);
            position: relative;
            z-index: 10;
            border-bottom: 3px solid #ffd700;
        }

        .logo {
            color: white;
            font-size: 2.2rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-family: 'Bangers', cursive;
            text-shadow: 3px 3px 0 #000, 5px 5px 0 rgba(0, 0, 0, 0.5);
            position: relative;
            display: inline-block;
        }

        .logo::after {
            content: 'STUDIOS';
            font-size: 0.9rem;
            font-family: 'Montserrat', sans-serif;
            position: absolute;
            bottom: -12px;
            right: 0;
            color: #ffd700;
            letter-spacing: 3px;
            text-shadow: 1px 1px 0 #000;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #ffd700;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::before {
            width: 100%;
        }

        .nav-links a:hover {
            color: #ffd700;
            transform: translateY(-2px);
        }

        /* Container principal */
        .container {
            position: relative;
            z-index: 2;
            padding: 3rem 1rem;
        }

        /* Card Principal com design cinematográfico */
        .card {
            background: rgba(20, 20, 20, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 25px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.7), 0 0 0 3px #e23636, 0 0 20px #ffd700;
            max-width: 950px;
            margin: 0 auto;
            animation: slideUp 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 215, 0, 0.1) 50%, transparent 70%);
            animation: shine 3s infinite;
            pointer-events: none;
        }

        @keyframes shine {
            0% { transform: translateX(-100%); }
            20% { transform: translateX(100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Header do Card com efeito 3D */
        .card-header {
            background: linear-gradient(135deg, #e23636 0%, #8b1a1a 100%);
            color: white;
            border-radius: 25px 25px 0 0 !important;
            padding: 2rem;
            border-bottom: 4px solid #ffd700;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 15px,
                rgba(255, 255, 255, 0.1) 15px,
                rgba(255, 255, 255, 0.1) 30px
            );
        }

        .card-header::after {
            content: '⚡';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 5rem;
            opacity: 0.2;
            color: #ffd700;
        }

        .card-header h5 {
            font-family: 'Bangers', cursive;
            font-size: 3.5rem;
            letter-spacing: 5px;
            text-shadow: 4px 4px 0 #000, 6px 6px 0 rgba(0, 0, 0, 0.5);
            margin: 0;
            position: relative;
            z-index: 1;
            line-height: 1.2;
        }

        .card-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0.5rem 0 0;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            z-index: 1;
        }

        /* Corpo do Card */
        .card-body {
            padding: 3rem;
            background: rgba(255, 255, 255, 0.97);
            border-radius: 0 0 25px 25px;
        }

        /* Labels com design premium */
        .form-label {
            font-weight: 700;
            color: #1a1a1a;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1.5px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-label i {
            color: #e23636;
            font-size: 1.2rem;
        }

        .required:after {
            content: "*";
            color: #e23636;
            font-weight: bold;
            margin-left: 4px;
            font-size: 1.2rem;
        }

        /* Inputs com design moderno */
        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 0.9rem 1.2rem;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            background: white;
            color: #333;
            font-weight: 500;
        }

        .form-control:focus, .form-select:focus {
            border-color: #e23636;
            box-shadow: 0 0 0 0.3rem rgba(226, 54, 54, 0.15), 0 5px 15px rgba(226, 54, 54, 0.3);
            transform: translateY(-3px) scale(1.01);
            outline: none;
        }

        .form-control:hover, .form-select:hover {
            border-color: #b22222;
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: #999;
            font-weight: 300;
        }

        /* Form text estilizado */
        .form-text {
            color: #666;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            padding-left: 1rem;
            border-left: 3px solid #e23636;
            font-style: italic;
        }

        /* Botões com design cinematográfico */
        .btn {
            padding: 1rem 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-radius: 15px;
            border: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            font-size: 1rem;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-marvel {
            background: linear-gradient(145deg, #e23636, #9b1d1d);
            color: white;
            box-shadow: 0 10px 25px rgba(226, 54, 54, 0.5), 0 0 0 2px rgba(255, 215, 0, 0.5);
        }

        .btn-marvel:hover {
            background: linear-gradient(145deg, #f23e3e, #ab1d1d);
            color: white;
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 35px rgba(226, 54, 54, 0.7), 0 0 0 3px #ffd700;
        }

        .btn-marvel:active {
            transform: translateY(-2px) scale(0.98);
        }

        .btn-danger {
            background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
            color: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            border: 1px solid #444;
        }

        .btn-danger:hover {
            background: linear-gradient(145deg, #3a3a3a, #2a2a2a);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7);
            border-color: #ffd700;
        }

        .btn i {
            margin-right: 10px;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .btn:hover i {
            transform: rotate(360deg);
        }

        /* Animações das linhas */
        .row {
            animation: fadeInRow 0.6s ease forwards;
            opacity: 0;
        }

        .row:nth-child(1) { animation-delay: 0.1s; }
        .row:nth-child(2) { animation-delay: 0.2s; }
        .row:nth-child(3) { animation-delay: 0.3s; }
        .row:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInRow {
            to {
                opacity: 1;
            }
        }

        /* Divisor com efeito */
        .gap-2 {
            margin-top: 2.5rem;
            position: relative;
            display: flex;
            gap: 1.5rem !important;
        }

        .gap-2::before {
            content: "";
            position: absolute;
            top: -1.5rem;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #e23636, #ffd700, #e23636, transparent);
            border-radius: 50%;
        }

        /* Responsividade aprimorada */
        @media (max-width: 992px) {
            .navbar {
                padding: 1rem 1.5rem;
                flex-direction: column;
                gap: 1rem;
            }
            
            .logo {
                font-size: 2rem;
            }
            
            .nav-links {
                gap: 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .card-header h5 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .nav-links a {
                font-size: 0.9rem;
            }
            
            .card-header {
                padding: 1.5rem;
            }
            
            .card-header h5 {
                font-size: 2rem;
                letter-spacing: 3px;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .btn {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
            
            .gap-2 {
                flex-direction: column;
            }
            
            .gap-2 .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 1.8rem;
            }
            
            .logo::after {
                font-size: 0.7rem;
                bottom: -10px;
            }
            
            .nav-links {
                gap: 0.8rem;
            }
            
            .nav-links a {
                font-size: 0.8rem;
            }
            
            .card-header h5 {
                font-size: 1.6rem;
            }
            
            .card-header p {
                font-size: 0.9rem;
                letter-spacing: 2px;
            }
            
            .form-label {
                font-size: 0.8rem;
            }
            
            .form-control, .form-select {
                padding: 0.7rem 1rem;
            }
        }
          .marvel-footer {
        background: linear-gradient(90deg, #ad2121 0%, #e23636 100%);
        color: white;
        position: relative;
        z-index: 10;
        border-top: 3px solid #ffd700;
        box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.5);
        margin-top: 4rem;
        font-family: 'Montserrat', sans-serif;
    }

    /* Efeito de brilho no topo */
    .marvel-footer::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, transparent, #ffd700, #fff, #ffd700, transparent);
        animation: footerShine 3s infinite;
    }

    @keyframes footerShine {
        0% { transform: translateX(-100%); }
        50% { transform: translateX(100%); }
        100% { transform: translateX(100%); }
    }

    .footer-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 3rem 2rem;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 2fr;
        gap: 2rem;
        position: relative;
    }

    /* Seções da footer */
    .footer-section {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    .footer-section:nth-child(1) { animation-delay: 0.1s; }
    .footer-section:nth-child(2) { animation-delay: 0.2s; }
    .footer-section:nth-child(3) { animation-delay: 0.3s; }
    .footer-section:nth-child(4) { animation-delay: 0.4s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Logo na footer */
    .footer-logo {
        font-family: 'Bangers', cursive;
        font-size: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 4px;
        text-shadow: 3px 3px 0 #000, 5px 5px 0 rgba(0, 0, 0, 0.5);
        margin-bottom: 0.5rem;
        position: relative;
        display: inline-block;
    }

    .footer-logo::after {
        content: '⚡';
        position: absolute;
        top: -10px;
        right: -30px;
        font-size: 2rem;
        color: #ffd700;
        filter: drop-shadow(2px 2px 2px #000);
    }

    .footer-tagline {
        font-size: 1.2rem;
        font-weight: 700;
        color: #ffd700;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 0 #000;
    }

    .footer-description {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    /* Redes sociais */
    .social-links {
        display: flex;
        gap: 1rem;
    }

    .social-link {
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 215, 0, 0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .social-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.4s ease;
    }

    .social-link:hover::before {
        left: 100%;
    }

    .social-link:hover {
        background: #ffd700;
        color: #ad2121;
        transform: translateY(-5px) rotate(360deg);
        border-color: white;
        box-shadow: 0 5px 15px rgba(255, 215, 0, 0.5);
    }

    /* Títulos das seções */
    .footer-title {
        font-family: 'Bangers', cursive;
        font-size: 1.5rem;
        letter-spacing: 2px;
        color: #ffd700;
        text-shadow: 2px 2px 0 #000;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: white;
        box-shadow: 0 0 10px #ffd700;
    }

    /* Listas de links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 0.8rem;
    }

    .footer-links a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.95rem;
    }

    .footer-links a i {
        font-size: 0.8rem;
        color: #ffd700;
        transition: transform 0.3s ease;
    }

    .footer-links a:hover {
        color: #ffd700;
        transform: translateX(10px);
    }

    .footer-links a:hover i {
        transform: translateX(5px);
    }

    /* Newsletter */
    .newsletter {
        margin-top: 2rem;
    }

    .newsletter-title {
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: #ffd700;
        margin-bottom: 0.8rem;
        text-transform: uppercase;
    }

    .newsletter-box {
        display: flex;
        gap: 0.5rem;
    }

    .newsletter-input {
        flex: 1;
        padding: 0.8rem 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .newsletter-input:focus {
        outline: none;
        border-color: #ffd700;
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
    }

    .newsletter-btn {
        width: 50px;
        height: 50px;
        background: #ffd700;
        border: none;
        border-radius: 10px;
        color: #ad2121;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .newsletter-btn:hover {
        background: white;
        transform: rotate(360deg) scale(1.1);
        box-shadow: 0 0 20px #ffd700;
    }

    .newsletter-text {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 0.8rem;
        font-style: italic;
    }

    /* Footer bottom */
    .footer-bottom {
        background: rgba(0, 0, 0, 0.3);
        padding: 1.5rem 2rem;
        border-top: 2px solid #ffd700;
        position: relative;
    }

    .bottom-content {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .copyright {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
        margin: 0;
    }

    .legal-links {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .legal-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .legal-links a:hover {
        color: #ffd700;
        text-decoration: underline;
    }

    .separator {
        color: #ffd700;
        font-weight: bold;
    }

    /* Responsividade */
    @media (max-width: 992px) {
        .footer-content {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .footer-content {
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 2rem 1.5rem;
        }

        .footer-section {
            text-align: center;
        }

        .footer-title::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .social-links {
            justify-content: center;
        }

        .footer-links a {
            justify-content: center;
        }

        .newsletter-box {
            max-width: 400px;
            margin: 0 auto;
        }

        .bottom-content {
            flex-direction: column;
            text-align: center;
        }

        .legal-links {
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .footer-logo {
            font-size: 2rem;
        }

        .footer-logo::after {
            font-size: 1.5rem;
            right: -25px;
        }

        .footer-tagline {
            font-size: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            font-size: 1.3rem;
        }

        .legal-links {
            gap: 0.5rem;
        }
}
    </style>
</head>

<body>
    <div class="stars"></div>
    
    <nav class="navbar">
        <div class="logo">MARVEL</div>
        <ul class="nav-links">
            <li><a href="{{route('welcome')}}"><i class="bi bi-house-door-fill"></i> Início</a></li>
            <li><a href="{{route('herois')}}"><i class="bi bi-shield-fill"></i> Heróis</a></li>
            <li><a href="{{route('quadrinhos')}}"><i class="bi bi-book-fill"></i> Quadrinhos</a></li>
            <li><a href="{{route('entrar')}}"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
            <li><a href="{{route('cadastro')}}"><i class="bi bi-person-plus-fill"></i> Cadastre-se</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
<!-- Footer Marvel Studios - Versão Simples -->
<footer class="marvel-footer-simple">
    <!-- Linha dourada superior -->
    <div class="footer-gold-line"></div>
    
    <div class="footer-container">
        <!-- Logo e Redes Sociais -->
        <div class="footer-main">
            <div class="footer-brand">
                <div class="footer-logo">MARVEL</div>
                <span class="footer-tagline">EXCELSIOR! 👾</span>
            </div>
            
            <p class="footer-description">
                O universo cinematográfico mais épico de todos os tempos. 
                Heróis, lendas e histórias que inspiram gerações.
            </p>
            
            <div class="social-icons">
                <a href="facebook.com" class="social-icon" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="x.com" class="social-icon" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="instagram.com" class="social-icon" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="tiktok.com" class="social-icon" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                <a href="youtube.com" class="social-icon" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            </div>
        </div>

        <!-- Links Rápidos e Newsletter (sem heróis) -->
        <div class="footer-grid">
            <!-- Explorar -->
            <div class="footer-col">
                <h4 class="footer-col-title">EXPLORAR</h4>
                <ul class="footer-col-links">
                    <li><a href="{{route('inicio')}}">Heróis</a></li>
                    <li><a href="{{route('quadrinhos')}}">Quadrinhos</a></li>
                    
                </ul>
            </div>

            <!-- Suporte -->
            <div class="footer-col">
                <h4 class="footer-col-title">SUPORTE</h4>
                <ul class="footer-col-links">
                    <li><a href="#">Ajuda</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">Termos de Uso</a></li>
                    <li><a href="#">Privacidade</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="footer-col newsletter-col">
                <h4 class="footer-col-title">NEWSLETTER</h4>
                <div class="newsletter-form">
                    <input type="email" placeholder="Seu e-mail" class="newsletter-input">
                    <button class="newsletter-button">
                        <i class="bi bi-send-fill"></i>
                    </button>
                </div>
                <p class="newsletter-note">Receba novidades do universo Marvel</p>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright">
        <div class="copyright-container">
            <p class="copyright-text">© 2026 MARVEL STUDIOS. Todos os direitos reservados.</p>
            <div class="legal-links">
                <a href="#">Termos</a>
                <span class="dot">•</span>
                <a href="#">Privacidade</a>
                <span class="dot">•</span>
                <a href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<!-- Estilos da Footer Simples -->
<style>
    .marvel-footer-simple {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        background: linear-gradient(135deg, #ad2121 0%, #c92a2a 100%);
        color: white;
        font-family: 'Montserrat', sans-serif;
        border-top: 3px solid #ffd700;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.3);
        margin-top: 40px;
    }

    .footer-gold-line {
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, transparent, #ffd700, #fff, #ffd700, transparent);
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem 2rem;
    }

    /* Seção principal (logo + descrição) */
    .footer-main {
        text-align: center;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(255, 215, 0, 0.3);
    }

    .footer-brand {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
    }

    .footer-logo {
        font-family: 'Bangers', cursive;
        font-size: 3rem;
        letter-spacing: 3px;
        text-shadow: 3px 3px 0 #000;
        line-height: 1;
    }

    .footer-tagline {
        font-family: 'Bangers', cursive;
        font-size: 1.8rem;
        color: #ffd700;
        text-shadow: 2px 2px 0 #000;
    }

    .footer-description {
        max-width: 600px;
        margin: 1rem auto 1.5rem;
        font-size: 1rem;
        line-height: 1.6;
        opacity: 0.9;
    }

    /* Redes sociais */
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 1.2rem;
    }

    .social-icon {
        width: 44px;
        height: 44px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 215, 0, 0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        background: #ffd700;
        color: #ad2121;
        transform: translateY(-3px);
        border-color: white;
    }

    /* Grid de colunas */
    .footer-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3rem;
        margin-bottom: 2rem;
    }

    .footer-col-title {
        font-family: 'Bangers', cursive;
        font-size: 1.4rem;
        color: #ffd700;
        text-shadow: 1px 1px 0 #000;
        margin-bottom: 1.2rem;
        letter-spacing: 1px;
    }

    .footer-col-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-col-links li {
        margin-bottom: 0.8rem;
    }

    .footer-col-links a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .footer-col-links a:hover {
        color: #ffd700;
        transform: translateX(5px);
    }

    /* Newsletter */
    .newsletter-form {
        display: flex;
        gap: 0.5rem;
        max-width: 280px;
    }

    .newsletter-input {
        flex: 1;
        padding: 0.8rem 1rem;
        border: 1px solid rgba(255, 215, 0, 0.5);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.15);
        color: white;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
        font-style: italic;
    }

    .newsletter-input:focus {
        outline: none;
        border-color: #ffd700;
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
    }

    .newsletter-button {
        width: 46px;
        height: 46px;
        background: #ffd700;
        border: none;
        border-radius: 8px;
        color: #ad2121;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .newsletter-button:hover {
        background: white;
        transform: scale(1.05);
    }

    .newsletter-note {
        font-size: 0.8rem;
        opacity: 0.7;
        margin-top: 0.5rem;
        font-style: italic;
    }

    /* Copyright */
    .footer-copyright {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        background: rgba(0, 0, 0, 0.3);
        border-top: 1px solid rgba(255, 215, 0, 0.3);
        padding: 1.2rem 0;
    }

    .copyright-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .copyright-text {
        font-size: 0.9rem;
        opacity: 0.9;
        margin: 0;
    }

    .legal-links {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        flex-wrap: wrap;
    }

    .legal-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .legal-links a:hover {
        color: #ffd700;
    }

    .dot {
        color: #ffd700;
        font-size: 0.8rem;
    }

    /* Responsividade */
    @media (max-width: 900px) {
        .footer-grid {
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .footer-container {
            padding: 2rem 1.5rem;
        }

        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .newsletter-col {
            grid-column: 1 / -1;
            text-align: center;
        }

        .newsletter-form {
            max-width: 300px;
            margin: 0 auto;
        }

        .footer-logo {
            font-size: 2.5rem;
        }

        .footer-tagline {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .footer-grid {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .footer-col-links a:hover {
            transform: none;
        }

        .copyright-container {
            flex-direction: column;
            text-align: center;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            font-size: 1.3rem;
        }
    }
</style>
    <!-- Bootstrap JS (opcional, mas recomendado) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>