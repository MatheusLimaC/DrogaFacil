<?php
// Inclui o arquivo de conexão com o banco
include_once('config.php');

// Verifica se o formulário de atualização foi enviado
if (isset($_POST['update'])) {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $crf = $_POST["crf"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $senha = $_POST["senha"];
    $sexo = $_POST["sexo"];

    // Prepara a declaração SQL para atualizar os dados do usuário
    $stmt = $con->prepare("UPDATE usuario SET nome=?, idade=?, crf=?, telefone=?, cpf=?, rg=?, senha=?, sexo=? WHERE id=?");
    
    // Vincula os parâmetros à declaração SQL
    $stmt->bind_param("sissssssi", $nome, $idade, $crf, $telefone, $cpf, $rg, $senha, $sexo, $id);
    
    // Executa a declaração preparada
    if ($stmt->execute()) {
        // Se a atualização for bem-sucedida, redireciona de volta para a página de usuários
        header('Location: usuario.php');
    } else {
        // Se ocorrer um erro durante a execução da declaração, exibe uma mensagem de erro
        echo "Erro ao atualizar registro: " . $con->error;
    }
}
?>
