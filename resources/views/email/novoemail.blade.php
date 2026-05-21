<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem-vindo ao Universo Marvel</title>
</head>
<body style="margin:0; padding:0; background-color:#111111; font-family:Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:linear-gradient(135deg,#0a0a0a 0%,#1f1f1f 100%); padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:620px; background-color:#ffffff; border:2px solid #ad2121; border-radius:14px; overflow:hidden;">
                    <tr>
                        <td style="background:linear-gradient(135deg,#ad2121 0%,#e23636 100%); padding:24px; text-align:center; border-bottom:3px solid #ffd700;">
                            <p style="margin:0; color:#ffd700; font-size:13px; font-weight:700; letter-spacing:2px;">MARVEL STUDIOS</p>
                            <h1 style="margin:8px 0 0; color:#ffffff; font-size:28px; line-height:1.2;">Bem-vindo, {{ $usuario->name }}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px 24px; color:#2d2d2d;">
                            <p style="margin:0 0 14px; font-size:16px; line-height:1.7;">
                                Seu cadastro foi realizado com sucesso no sistema.
                            </p>
                            <p style="margin:0 0 20px; font-size:15px; line-height:1.7; color:#555555;">
                                Agora você já pode acessar o universo de heróis e quadrinhos com seu usuário.
                            </p>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:0 auto 8px;">
                                <tr>
                                    <td align="center" style="background:linear-gradient(135deg,#ad2121,#e23636); border:1px solid #ffd700; border-radius:8px;">
                                        <a href="{{ url('/login') }}" style="display:inline-block; padding:12px 22px; color:#ffffff; text-decoration:none; font-size:14px; font-weight:700; letter-spacing:0.5px;">
                                            Acessar plataforma
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#1a1a1a; border-top:2px solid #ffd700; padding:14px 20px; text-align:center;">
                            <p style="margin:0; color:#ffd700; font-size:12px; letter-spacing:1px;">
                                EXCELSIOR
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
