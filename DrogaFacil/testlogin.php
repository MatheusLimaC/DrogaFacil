<?php
// Inicia a sessão
session_start();

// Verifica se o formulário foi submetido e se os campos 'nome' e 'senha' não estão vazios
if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha'])) {

    // Inclui o arquivo de conexão com o banco
    include_once('config.php');

    // Obtém o nome e a senha enviados via POST
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar se o usuário com o nome e senha fornecidos existe no banco de dados
    $sql = "SELECT * FROM usuario WHERE nome = '$nome' and senha = '$senha'";

    // Executa a consulta SQL no banco de dados
    $result = $con->query($sql);
    
    // Imprime o resultado da consulta para fins de depuração
    print_r($result);
    
    // Verifica se o número de linhas retornadas pela consulta é menor que 1 (ou seja, nenhum registro encontrado)
    if(mysqli_num_rows($result) < 1) {

        // Se não houver registros correspondentes, remove as variáveis de sessão 'nome' e 'senha' e redireciona para a página de login
        unset($_POST['nome']);
        unset($_POST['senha']);
        header('Location: index.php');
    }        
    else {
        // Se houver registros correspondentes, obtém os dados do usuário
        $user = $result->fetch_assoc();

        // Define as variáveis de sessão 'nome', 'senha' e 'role' com os dados do usuário
        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = $senha;
        $_SESSION['role'] = $user['role'];

        // Verifica o papel (role) do usuário
        if($user['role'] == 'admin'){
            
            // Se o usuário tiver a função 'admin', redireciona para a página de seleção para administradores
            header('Location: selecao.php');
        } else {
            // Se o usuário não tiver a função 'admin', redireciona para a página de seleção para usuários regulares
            header('Location: selecao_r.php');
        }
    }
}
else {
    // Se o formulário não foi submetido ou os campos estão vazios, redireciona para a página de login
    header('Location: index.php');
}
?>
