<?php require_once 'cadeado.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">

    <h1>Meu Estoque</h1>

    <h2>Bem-vindo, <?= $_SESSION['usuario']; ?>!</h2>

    <p>
        <a href="logout.php">Logout</a>
    </p>

    <form action="cadastrar_produto.php" method="post">
        <div class="mb-3">
            <label for="produto" class="form-label">Nome do Produto:</label>
            <input type="text" name="produto" id="produto" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control">
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$):</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
        <a href="estoque.php">Ver estoque</a>
    </form>

    

</body>
</html>
