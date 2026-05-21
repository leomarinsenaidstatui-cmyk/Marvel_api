<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
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
                <h1>Redefinir Senha</h1>
                <p>Informe a nova senha duas vezes para confirmar. Você será redirecionado ao login ao concluir.</p>
            </div>
            <div class="card-body">
                <input type="hidden" id="token">
                <input type="hidden" id="email">
                <div class="form-group">
                    <label for="senha">Nova Senha</label>
                    <input type="password" id="senha" placeholder="••••••••" required>
                </div>
                <div class="form-group">
                    <label for="senha_confirmacao">Confirmar Senha</label>
                    <input type="password" id="senha_confirmacao" placeholder="••••••••" required>
                </div>
                <button class="btn" id="reset-password">Redefinir Senha</button>
                <p class="help-text">Após redefinir, use sua nova senha para entrar.</p>
                <p class="help-text">Voltar para <a class="link" href="{{ route('entrar') }}">Login</a></p>
            </div>
        </div>
    </div>
    <script>
        const params = new URLSearchParams(window.location.search);
        const tokenParam = params.get('token');
        const emailParam = params.get('email');
        if (!tokenParam || !emailParam) {
            alert('Token ou e-mail ausente. Retorne ao início do processo.');
            window.location.href = '/esqueci-senha';
        }
        $('#token').val(tokenParam);
        $('#email').val(emailParam);

        $('#reset-password').on('click', function() {
            const senha = $('#senha').val().trim();
            const confirmacao = $('#senha_confirmacao').val().trim();
            const token = $('#token').val();
            const email = $('#email').val();

            if (!senha || !confirmacao) {
                alert('Preencha os dois campos de senha.');
                return;
            }
            if (senha !== confirmacao) {
                alert('As senhas não coincidem.');
                return;
            }

            $(this).prop('disabled', true).text('Processando...');
            $.ajax({
                url: '/api/resetar_senha',
                method: 'POST',
                data: { email, token, senha, senha_confirmation: confirmacao },
                dataType: 'json',
                success: function(response) {
                    if (response.erro === 'n') {
                        alert('Senha redefinida com sucesso! Volte ao login.');
                        window.location.href = '/entrar';
                    } else {
                        alert(response.msg || 'Erro ao redefinir sua senha.');
                    }
                },
                error: function(xhr) {
                    alert(xhr.responseJSON?.msg || 'Não foi possível redefinir a senha.');
                },
                complete: function() {
                    $('#reset-password').prop('disabled', false).text('Redefinir Senha');
                }
            });
        });
    </script>
</body>
</html>
