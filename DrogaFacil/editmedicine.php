<?php
    // Verifica se o parâmetro 'id' foi passado via URL e não está vazio.
    if (!empty($_GET['id'])) {
        // Inclui o arquivo de configuração, que geralmente contém a conexão com o banco de dados.
        include 'config.php';

        // Armazena o valor do parâmetro 'id' em uma variável.
        $id = $_GET['id'];
        
        // Prepara uma consulta SQL para selecionar o registro na tabela 'medicamento' onde o 'id' seja igual ao valor passado.
        $sqlSelect = "SELECT * FROM medicamento WHERE id=$id";
        
        // Executa a consulta SQL.
        $result = $con->query($sqlSelect);
        
        // Verifica se a consulta retornou algum resultado.
        if ($result->num_rows > 0) {
            // Se o registro existir, obtém os dados do medicamento.
            $med_data = mysqli_fetch_assoc($result);
            $comercial = $med_data["comercial"];
            $generico = $med_data["generico"];
            $dosagem = $med_data["dosagem"];
            $temperatura = $med_data["temperatura"];
            $aplicacao = $med_data["aplicacao"];
            $laboratorio = $med_data["laboratorio"];
            $fornecedor = $med_data["fornecedor"];
            $quantidade = $med_data["quantidade"];
            $preco = $med_data["preco"];
            $validade = $med_data["validade"];
        } else {
            // Se nenhum registro for encontrado, redireciona para a página 'medicamento.php'.
            header('Location: medicamento.php');
            exit();
        }
    } else {
        // Se o 'id' não foi passado, redireciona para a página 'medicamento.php'.
        header('Location: medicamento.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="imagens/icones/ideia-icone-2-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="estilos/medicamento.css">
    <style>

        #container-logo > #logo > i {
            cursor: pointer;
        }

        #container-logo > #logo {
            cursor: pointer;
        }
    </style>
    <title>Medicamentos</title>
</head>
<body>
    <nav class="navbar">
        <div class="ms-5" id="container-logo">
            <a id="logo" href="selecao.php" class="navbar-brand d-flex align-items-center">
                <i class="bi-bandaid-fill fs-1 me-2"></i>
                DrogaFacil</a>
        </div>
        <span><i class="bi bi-capsule"></i></span>
        <a href="sair.php"><button class="btn btn-light me-5">Sair</button></a>
    </nav>

    <div class="container my-3">
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item1">Editar Medicamento</button>
                </div>
                <div class="accordion-collapse collapse show" id="item1">
                    <div class="accordion-body">
                        <form action="saveEdit_medicine.php" method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <label for="comercial">Nome Comercial</label>
                                    <input type="text" name="comercial" id="comercial" class="form-control" value="<?php echo $comercial ?>">
                                </div>
                                <div class="col-6">
                                    <label for="generico">Nome Genérico</label>
                                    <input type="text" name="generico" id="generico" class="form-control" value="<?php echo $generico ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="dosagem">Dosagem (mg/ml)</label>
                                    <input type="number" name="dosagem" id="dosagem" class="form-control" value="<?php echo $dosagem ?>">
                                </div>
                                <div class="col-5">
                                    <label for="temperatura">Temperatura de Armazenagem (°C)</label>
                                    <input type="number" name="temperatura" id="temperatura"  step="0.5" class="form-control" value="<?php echo $temperatura ?>">
                                </div>
                                <div class="col-4">
                                    <label for="aplicacao">Meio de Aplicação</label>
                                    <input type="text" name="aplicacao" id="aplicacao" class="form-control" value="<?php echo $aplicacao ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="laboratorio">Laboratório</label>
                                    <input type="text" name="laboratorio" id="laboratorio" class="form-control" value="<?php echo $laboratorio ?>">
                                </div>
                                <div class="col-6">
                                    <label for="fornecedor">Fornecedor</label>
                                    <input type="text" name="fornecedor" id="fornecedor" class="form-control" value="<?php echo $fornecedor ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" name="quantidade" id="quantidade" class="form-control" value="<?php echo $quantidade ?>">
                                </div>
                                <div class="col-4">
                                    <label for="preco">Preço (R$)</label>
                                    <input type="text" name="preco" id="preco" class="form-control" value="<?php echo $preco ?>">
                                </div>
                                <div class="col-6">
                                    <label for="validade">Validade</label>
                                    <input type="date" name="validade" id="validade" class="form-control" value="<?php echo $validade ?>">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <button type="submit" name="update" id="update" class="btn btn-primary btn-custom mt-3">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
