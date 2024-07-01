<?php
    // Inclui o arquivo de conexão com o banco
    include_once('config.php');

    // Verifica se o formulário de atualização foi enviado
    if(isset($_POST['update']))
    {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $comercial = $_POST["comercial"];
        $generico = $_POST["generico"];
        $dosagem = $_POST["dosagem"];
        $temperatura = $_POST["temperatura"];
        $aplicacao = $_POST["aplicacao"];
        $laboratorio = $_POST["laboratorio"];
        $fornecedor = $_POST["fornecedor"];
        $quantidade = $_POST["quantidade"];
        $preco = $_POST["preco"];
        $validade = $_POST["validade"];
        
        // Monta a query SQL para atualizar os dados do medicamento no banco de dados
        $sqlInsert = "UPDATE medicamento 
        SET comercial='$comercial',generico='$generico',dosagem='$dosagem',temperatura='$temperatura',aplicacao='$aplicacao',laboratorio='$laboratorio',fornecedor='$fornecedor',quantidade='$quantidade',preco='$preco',validade='$validade'
        WHERE id=$id";
        
        // Executa a query SQL no banco de dados
        $result = $con->query($sqlInsert);

        // Exibe o resultado da operação (pode ser útil para depuração)
        print_r($result);
    }

    // Redireciona o usuário de volta para a página de medicamentos após a atualização
    header('Location: medicamento.php');
?>
