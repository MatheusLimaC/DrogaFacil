<?php

    // Verifica se o parâmetro 'id' foi passado via URL e não está vazio.
    if(!empty($_GET['id']))
    {
        // Inclui o arquivo de conexão
        include_once('config.php');

        // Armazena o valor do parâmetro 'id' em uma variável.
        $id = $_GET['id'];

        // Prepara uma consulta SQL para selecionar o registro na tabela 'medicamento' onde o 'id' seja igual ao valor passado.
        $sqlSelect = "SELECT * FROM medicamento WHERE id=$id";

        // Executa a consulta SQL.
        $result = $con->query($sqlSelect);

        if($result->num_rows > 0)
        {
            // Se o registro existir, prepara uma consulta SQL para deletar o registro onde o 'id' seja igual ao valor passado.
            $sqlDelete = "DELETE FROM medicamento WHERE id=$id";
            // Executa a consulta SQL de deleção.
            $resultDelete = $con->query($sqlDelete);
        }
    }

    // Redireciona o navegador para a página 'medicamento.php' após execução.
    header('Location: medicamento.php');
   
?>
