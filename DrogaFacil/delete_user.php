<?php
// Inclui o arquivo 'acesso_restrito.php'.
include_once('acesso_restrito.php');

// Chama a função 'checkAccess' definida no arquivo 'acesso_restrito.php' para verificar se o usuário tem o papel de 'admin'.
checkAccess('admin');

// Verifica se o parâmetro 'id' foi passado via URL e não está vazio.
if(!empty($_GET['id']))
{
    // Inclui o arquivo de conexão com o banco.
    include_once('config.php');

    // Armazena o valor do parâmetro 'id' em uma variável.
    $id = $_GET['id'];

    // Prepara uma consulta SQL para selecionar o registro na tabela 'usuario' onde o 'id' seja igual ao valor passado.
    $sqlSelect = "SELECT * FROM usuario WHERE id=$id";

    // Executa a consulta SQL.
    $result = $con->query($sqlSelect);

    // Verifica se a consulta retornou algum resultado.
    if($result->num_rows > 0)
    {
        // Se o registro existir, prepara uma consulta SQL para deletar o registro onde o 'id' seja igual ao valor passado.
        $sqlDelete = "DELETE FROM usuario WHERE id=$id";
        // Executa a consulta SQL de deleção.
        $resultDelete = $con->query($sqlDelete);
    }
}

// Redireciona o navegador para a página 'usuario.php' após a execução das operações acima.
header('Location: usuario.php');

?>