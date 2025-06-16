<?php 
require_once 'cadeado.php';

if (!isset($_GET['id'])) {
    header('location:home.php?code=0');
    exit;
}

$id_produto = (int)$_GET['id'];
$id_usuario = $_SESSION['id'];

require_once 'conexao.php';
$conn = conectar_banco();

$sql = "SELECT produto, descricao, quantidade, valor 
        FROM tb_produtos 
        WHERE id_produto = ? AND usuario_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $id_produto, $id_usuario);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) == 0) {
    header('location:home.php?code=4'); // produto não encontrado ou não pertence ao usuário
    exit;
}

$produto_atual = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container">
    <h1>Editar Produto</h1>
    <form action="editar_produto.php?id=<?= $id_produto ?>" method="post">
        <div class="mb-3">
            <label for="produto" class="form-label">Nome do Produto:</label>
            <input type="text" name="produto" id="produto" class="form-control" required value="<?= htmlspecialchars($produto_atual['produto']) ?>" />
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="<?= htmlspecialchars($produto_atual['descricao']) ?>" />
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" value="<?= (int)$produto_atual['quantidade'] ?>" />
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$):</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="<?= number_format($produto_atual['valor'], 2, '.', '') ?>" />
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="home.php" class="btn btn-secondary">Cancelar</a>
    </form>
         <br>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
         <a href="home.php"> <button class="btn btn-success" type="button">Voltar ao estoque</button></a>
         <a href="logout.php"> <button class="btn btn-danger" type="button">Logout</button></a>
         </div>
</body>
</html>

<?php
// Processa a atualização quando o form for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = $_POST['produto'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $quantidade = (int)($_POST['quantidade'] ?? 0);
    $valor = (float)($_POST['valor'] ?? 0);

    // Validação básica - pode melhorar se quiser
    if (trim($produto) === '') {
        header('location:editar_produto.php?id=' . $id_produto . '&code=2'); // erro: produto vazio
        exit;
    }

    $sql_update = "UPDATE tb_produtos SET produto = ?, descricao = ?, quantidade = ?, valor = ? 
                   WHERE id_produto = ? AND usuario_id = ?";

    $stmt_update = mysqli_prepare($conn, $sql_update);

    if (!$stmt_update) {
        header('location:editar_produto.php?id=' . $id_produto . '&code=3'); // erro no prepare
        exit;
    }

    mysqli_stmt_bind_param($stmt_update, 'ssidii', $produto, $descricao, $quantidade, $valor, $id_produto, $id_usuario);

    if (!mysqli_stmt_execute($stmt_update)) {
        header('location:editar_produto.php?id=' . $id_produto . '&code=3'); // erro na execução
        exit;
    }

    header('location:estoque.php?code=1'); // sucesso
    exit;
}


?>
