<?php 
    // Inclui o arquivo de conexão com o banco
    include 'config.php';

    // Inclui o arquivo de controle de acesso e verifica o acesso do usuário
    include_once('acesso_restrito.php');
    checkAccess('admin');

    // Captura os dados enviados via POST pelo formulário
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $crf = $_POST["crf"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $senha = $_POST["senha"];
    $sexo = $_POST["genero"];

    // Define o papel do usuário como 'user' por padrão
    $role = "user";

    // Verifica se o papel do usuário foi enviado no formulário e atualiza a variável
    if (isset($_POST["role"])) {
        $role = $_POST["role"];
    } 

    // Cria a query SQL para inserir os dados na tabela 'usuario'
    $sql = "INSERT INTO usuario(nome, idade, crf, telefone, cpf, rg, senha, sexo, role) VALUES('$nome', '$idade', '$crf', '$telefone', '$cpf', '$rg', '$senha', '$sexo', '$role')";

    // Executa a query SQL
    $rs = mysqli_query($con, $sql);

    // Verifica se a inserção foi bem-sucedida
    if ($rs) {
        // Redireciona o usuário para a página 'usuario.php' se a inserção for bem-sucedida
        header('Location: usuario.php');
        exit();
    }    
?>