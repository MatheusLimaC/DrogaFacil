<?php
// Inclui o arquivo de conexão com o banco
include_once('config.php');

// Inicia a sessão PHP
session_start();

// Verifica se não existem as variáveis de sessão 'nome' e 'senha'
if ((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true)) {
    // Remove as variáveis de sessão 'nome' e 'senha' caso estejam erradas ou faltantes
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    // Redireciona para a página de login
    header('Location: index.php');
}

// Obtém o nome do usuário logado a partir da variável de sessão 'nome'
$logado = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="imagens/icones/ideia-icone-2-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="estilos/selecao.css">
    <style>

        #container-logo > #logo > i {
            cursor: pointer;
        }

        #container-logo > #logo {
            cursor: pointer;
        }
    </style>
    <title>Selecionar</title>
</head>
<body>
    <nav class="navbar">
        <div class="ms-5" id="container-logo">
            <a id="logo" href="" class="navbar-brand d-flex align-items-center">
                <i class="bi-bandaid-fill fs-1 me-2"></i>
                DrogaFacil</a>
        </div>
    
        <a href="sair.php"><button class="btn btn-light me-5">Sair</button></a>
    </nav>

    <div id="bem_vindo" class="text-center mt-3">
        <?php
            // Insere o nome da pessoa logada
            echo "<h3> Bem-vindo $logado!";
        ?>
    </div>

    <div id="linha" class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <img src="imagens/add-medicine-3.png" alt="Ícone remédio" class="card-img-top">
                    <h5 class="card-header">Gerenciar Medicamentos</h5>
                    <div class="card-body centralizar-botao">
                        <a href="medicamento.php"><button class="btn btn-primary btn-custom">Acessar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
