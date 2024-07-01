<?php
    // Inclui o arquivo de conexão com o banco
    include_once('config.php');

    // Cria a query SQL para selecionar todos os registros da tabela 'medicamento' ordenados pelo ID em ordem decrescente
    $sql= "SELECT * FROM medicamento ORDER BY id DESC";
    
    // Executa a query SQL e armazena o resultado na variável $result
    $result = $con ->query ($sql);
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
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item1">Adicionar</button>
                </div>
                <div class="accordion-collapse collapse" id="item1">
                    <div class="accordion-body">
                        <form action="insertmedicine.php" method="POST" id="adicionar2" name="adicionar2">
                            <div class="row">
                                <div class="col-6">
                                    <label for="comercial">Nome Comercial</label>
                                    <input type="text" name="comercial" id="comercial" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="generico">Nome Genérico</label>
                                    <input type="text" name="generico" id="generico" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="dosagem">Dosagem (mg/ml)</label>
                                    <input type="number" name="dosagem" id="dosagem" class="form-control">
                                </div>
                                <div class="col-5">
                                    <label for="temperatura">Temperatura de Armazenagem (°C)</label>
                                    <input type="number" name="temperatura" id="temperatura"  step="0.5" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="aplicacao">Meio de Aplicação</label>
                                    <input type="text" name="aplicacao" id="aplicacao" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="laboratorio">Laboratório</label>
                                    <input type="text" name="laboratorio" id="laboratorio" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="fornecedor">Fornecedor</label>
                                    <input type="text" name="fornecedor" id="fornecedor" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" name="quantidade" id="quantidade" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="preco">Preço (R$)</label>
                                    <input type="text" name="preco" id="preco" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="validade">Validade</label>
                                    <input type="date" name="validade" id="validade" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-custom mt-3" >Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item2">Editar/Excluir</button>
                </div>
                <div class="accordion-collapse collapse" id="item2">
                    <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Comercial</th>
                            <th scope="col">Genérico</th>
                            <th scope="col">Dosagem</th>
                            <th scope="col">Temp</th>
                            <th scope="col">Aplic</th>
                            <th scope="col">Lab</th>
                            <th scope="col">Forn</th>
                            <th scope="col">Qntd</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Val</th>
                            <th scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // Loop para exibir os dados dos medicamentos
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                // Exibe uma linha da tabela para cada medicamento
                                echo "<tr>";
                                echo "<td>".$user_data['id']. "</td>";
                                echo "<td>".$user_data['comercial']. "</td>";
                                echo "<td>".$user_data['generico']. "</td>";
                                echo "<td>".$user_data['dosagem']. "</td>";
                                echo "<td>".$user_data['temperatura']. "</td>";
                                echo "<td>".$user_data['aplicacao']. "</td>";
                                echo "<td>".$user_data['laboratorio']. "</td>";
                                echo "<td>".$user_data['fornecedor']. "</td>";
                                echo "<td>".$user_data['quantidade']. "</td>";
                                echo "<td>".$user_data['preco']. "</td>";
                                echo "<td>".$user_data['validade']. "</td>";
                                // Botões de edição e exclusão para cada medicamento
                                echo "<td>
                                    <a class='btn btn-sm btn-primary btn-edit-custom' href='editmedicine.php?id=$user_data[id]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                        </svg>
                                    </a>
                                    <a class='btn btn-sm btn-danger btn-delete-custom' href='delete_medicine.php?id=$user_data[id]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                                        </svg>
                                    </a>
                                </td>";
                                echo "</tr>";
                            }
                        ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>