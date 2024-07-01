<?php 
    // Inclui o arquivo de conexão com o banco.
    include 'config.php';

    // Captura os dados enviados via POST pelo formulário
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

    // Cria a query SQL para inserir os dados na tabela 'medicamento'
    $sql = "INSERT INTO medicamento(comercial, generico, dosagem, temperatura, aplicacao, laboratorio, fornecedor, quantidade, preco, validade) VALUES('$comercial', '$generico', '$dosagem', '$temperatura', '$aplicacao', '$laboratorio', '$fornecedor', '$quantidade', '$preco', '$validade')";

    // Executa a query SQL
    $rs = mysqli_query($con, $sql);

    // Verifica se a inserção foi bem-sucedida
    if($rs){
        // Redireciona o usuário para a página 'medicamento.php' se a inserção for bem-sucedida
        header('Location: medicamento.php');
        exit();
    }    
?>
