<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Código</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body { margin: 0; font-family: 'Roboto', sans-serif; background: #050505; color: #fff; }
        .page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem; }
        .card { width: 100%; max-width: 520px; background: #111; border: 1px solid #222; border-radius: 18px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.45); }
        .card-head { padding: 2rem; background: linear-gradient(135deg, rgba(230,36,41,0.95), rgba(36,20,20,0.95)); }
        .card-head h1 { margin: 0; font-size: 2rem; letter-spacing: 1px; }
        .card-head p { margin: 0.75rem 0 0; color: #ddd; font-size: 0.95rem; }
        .card-body { padding: 2rem; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; color: #ccc; font-weight: 600; }
        input { width: 100%; padding: 0.95rem 1rem; border-radius: 12px; border: 1px solid #252525; background: #121212; color: #fff; }
        input:focus { outline: none; border-color: #e62429; }
        .btn { width: 100%; padding: 1rem; border: none; border-radius: 12px; background: #e62429; color: #fff; font-weight: 700; cursor: pointer; transition: transform 0.2s ease; }
        .btn:hover { transform: translateY(-2px); }
        .help-text { margin-top: 1rem; color: #aaa; font-size: 0.9rem; }
        .link { color: #e62429; text-decoration: none; }
    </style>
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="card-head">
                <h1>Verificar Código</h1>
                <p>Digite o código enviado ao seu e-mail para prosseguir com a redefinição.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" placeholder="seuemail@marvel.com" required>
                </div>
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" placeholder="000000" required>
                </div>
                <button class="btn" id="verify-code">Verificar Código</button>
                <p class="help-text">Depois que o código for aceito, você será levado à página de redefinição de senha.</p>
                <p class="help-text">Voltar para <a class="link" href="{{ route('entrar') }}">Login</a></p>
            </div>
        </div>
    </div>
    <script>
        const params = new URLSearchParams(window.location.search);
        const emailParam = params.get('email');
        if (emailParam) {
            $('#email').val(emailParam);
        }

        $('#verify-code').on('click', function() {
            const email = $('#email').val().trim();
            const codigo = $('#codigo').val().trim();
            if (!email || !codigo) {
                alert('Informe o e-mail e o código para continuar.');
                return;
            }
            $(this).prop('disabled', true).text('Verificando...');
            $.ajax({
                url: '/api/confirmar_codigo_recuperacao',
                method: 'POST',
                data: { email, codigo },
                dataType: 'json',
                success: function(response) {
                    if (response.erro === 'n') {
                        alert('Código verificado! Redirecionando...');
                        window.location.href = '/senha/redefinir?token=' + encodeURIComponent(response.token) + '&email=' + encodeURIComponent(email);
                    } else {
                        alert(response.msg || 'Código inválido ou expirado.');
                    }
                },
                error: function(xhr) {
                    alert(xhr.responseJSON?.msg || 'Erro ao validar o código.');
                },
                complete: function() {
                    $('#verify-code').prop('disabled', false).text('Verificar Código');
                }
            });
        });
    </script>
</body>
</html>
