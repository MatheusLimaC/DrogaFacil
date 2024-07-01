<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="imagens/icones/ideia-icone-2-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="estilos/style.css">
    <title>Login</title>
</head>
<body class="d-flex align-items-center">
    
    <main class="w-100 m-auto form-container">
        <form action="testlogin.php" method="POST" class="needs-validation" novalidate>
            <h1 class="mb-3">Login</h1>
            <div class="form-floating mb-3">
                <input type="text" name="nome" id="nome" class="form-control" placeholder=" " required>
                <label for="nome" class="form-label">Nome</label>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle"></i> Você deve informar o usuário.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="senha" id="senha" class="form-control" placeholder=" " required>
                <label for="senha" class="form-label">Senha</label>
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-circle"></i> Você deve informar uma senha.
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2" name="submit" value="Entrar">Entrar</button>
        </form>
    </main>

    <!-- Script para validação do formulário -->
    <script>
        (() => {
            'use strict'

            // Seleciona todos os formulários que precisam de validação
            const forms = document.querySelectorAll('.needs-validation')
            
            // Aplica a validação personalizada para cada formulário
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>