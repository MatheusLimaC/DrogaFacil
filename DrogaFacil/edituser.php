<?php
// Inclui o arquivo que contém a função de verificação de acesso restrito.
include_once('acesso_restrito.php');

// Chama a função para verificar se o usuário tem a função 'admin'.
// Se não, redireciona para a página de seleção.
checkAccess('admin');

// Verifica se o parâmetro 'id' foi passado via URL e não está vazio.
if (!empty($_GET['id'])) {
    // Inclui o arquivo de configuração, que geralmente contém a conexão com o banco de dados.
    include 'config.php';

    // Armazena o valor do parâmetro 'id' em uma variável.
    $id = $_GET['id'];

    // Prepara uma consulta SQL para selecionar o registro na tabela 'usuario' onde o 'id' seja igual ao valor passado.
    $sqlSelect = "SELECT * FROM usuario WHERE id=$id";

    // Executa a consulta SQL.
    $result = $con->query($sqlSelect);

    // Verifica se a consulta retornou algum resultado.
    if ($result->num_rows > 0) {
        // Se o registro existir, obtém os dados do usuário.
        $user_data = mysqli_fetch_assoc($result);
        $nome = $user_data["nome"];
        $idade = $user_data["idade"];
        $crf = $user_data["crf"];
        $telefone = $user_data["telefone"];
        $cpf = $user_data["cpf"];
        $rg = $user_data["rg"];
        $senha = $user_data["senha"];
        $sexo = $user_data["sexo"];
        $role = $user_data["role"];
    } else {
        // Se nenhum registro for encontrado, redireciona para a página 'usuario.php'.
        header('Location: usuario.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="imagens/icones/ideia-icone-2-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="estilos/usuario.css">
    <style>
        
        #container-logo > #logo > i {
            cursor: pointer;
        }

        #container-logo > #logo {
            cursor: pointer;
        }
    </style>
    <title>Usuários</title>
</head>
<body>
    <nav class="navbar">
        <div class="ms-5" id="container-logo">
            <a id="logo" href="selecao.php" class="navbar-brand d-flex align-items-center">
                <i class="bi-bandaid-fill fs-1 me-2"></i> DrogaFacil
            </a>
        </div>
        <span><i class="bi bi-person-circle"></i></span>
        <a href="sair.php"><button class="btn btn-light me-5">Sair</button></a>
    </nav>

    <div class="container my-3">
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item1">Editar Usuário</button>
                </div>
                <div class="accordion-collapse collapse show" id="item1">
                    <div class="accordion-body">
                        <form action="saveEdit_user.php" method="POST">
                            <div>
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $nome ?>">
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="idade">Idade</label>
                                    <input type="number" name="idade" id="idade" class="form-control" value="<?php echo $idade ?>">
                                </div>
                                <div class="col-5">
                                    <label for="crf">CRF</label>
                                    <input type="text" name="crf" id="crf" class="form-control" value="<?php echo $crf ?>">
                                </div>
                                <div class="col-5">
                                    <label for="telefone">Telefone</label>
                                    <input type="tel" name="telefone" id="telefone" class="form-control" value="<?php echo $telefone ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $cpf ?>">
                                </div>
                                <div class="col-4">
                                    <label for="rg">RG</label>
                                    <input type="text" name="rg" id="rg" class="form-control" value="<?php echo $rg ?>">
                                </div>
                                <div class="col-4">
                                    <label for="senha">Senha</label>
                                    <input type="text" name="senha" id="senha" class="form-control" value="<?php echo $senha ?>">
                                </div>
                            </div>
                            <div class="mt-2">
                                <div>
                                    Sexo
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="masculino" name="sexo" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '' ?>>
                                    <label for="masculino" class="form-check-label">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="feminino" name="sexo" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : '' ?>>
                                    <label for="feminino" class="form-check-label">Feminino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="outro" name="sexo" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '' ?>>
                                    <label for="outro" class="form-check-label">Outro</label>
                                </div>
                            </div>
                            <div class="mt-2">
                                <input type="checkbox" id="admin" name="role" class="form-check-input" <?php echo ($role == 'admin') ? 'checked' : '' ?>>
                                <label for="admin" class="form-check-label">Acesso Privilegiado</label>
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