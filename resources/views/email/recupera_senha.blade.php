<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0a0a0a;
            color: #fff;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background: #111;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
        }
        h1 {
            margin-bottom: 16px;
            color: #e62429;
        }
        p {
            color: #ccc;
            line-height: 1.6;
        }
        .code {
            display: inline-block;
            margin-top: 20px;
            padding: 20px 30px;
            background: #1b1b1b;
            border: 1px dashed #e62429;
            border-radius: 12px;
            font-size: 2rem;
            letter-spacing: 10px;
            color: #fff;
            font-weight: 700;
        }
        .footer {
            margin-top: 32px;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Recuperação de Senha</h1>
        <p>Recebemos uma solicitação para recuperar sua senha. Use o código abaixo para avançar no processo de redefinição.</p>
        <div class="code">{{ $codigo }}</div>
        <p class="footer">Este código é válido por 10 minutos. Se você não solicitou essa alteração, apenas ignore esta mensagem.</p>
    </div>
</body>
</html>
