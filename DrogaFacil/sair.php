<?php
    // Inicia a sessão para poder acessar e manipular variáveis de sessão
    session_start();

    // Remove as variáveis de sessão 'nome' e 'senha'
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);

    // Redireciona o usuário para a página 'index.php'
    header('Location: index.php');
?>
