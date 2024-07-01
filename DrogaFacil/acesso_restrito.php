<?php
    // Inicia uma nova sessão ou retoma a sessão existente.
    session_start();

    // Define a função 'checkAccess' que verifica se o usuário tem o papel (role) necessário.
    function checkAccess($requiredRole) {
        // Verifica se a variável de sessão 'nome' não está definida ou se a variável de sessão 'role' é diferente do papel necessário.
        if (!isset($_SESSION['nome']) || $_SESSION['role'] != $requiredRole) {
            // Se qualquer uma das condições acima for verdadeira, redireciona o usuário para a página 'selecao_r.php'.
            header("Location: selecao_r.php");
            // Encerra a execução do script para garantir que o redirecionamento ocorra imediatamente.
            exit();
        }
    }
?>
