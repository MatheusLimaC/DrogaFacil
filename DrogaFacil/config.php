<?php 
    // Definição das variáveis de conexão com o banco de dados.
    
    $host = "localhost";      // Endereço do servidor MySQL.
    $banco = "farmacia";      // Nome do banco de dados.
    $user = "root";           // Nome de usuário do MySQL.
    $senha_user = "";         // Senha do usuário do MySQL.

    // Estabelece uma conexão com o banco de dados MySQL usando as credenciais fornecidas.
    $con = mysqli_connect($host, $user, $senha_user, $banco);

    // Verifica se a conexão foi bem-sucedida.
    if(!$con) {
        // Se a conexão falhar, exibe uma mensagem de erro e termina a execução do script.
        die("Conexão falhou: " . mysqli_connect_error());
    }

?>
