<?php require_once 'cadeado.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">

    <h1>Estoque</h1>

    <h2>Bem-vindo, <?= $_SESSION['usuario']; ?>!</h2>

    <p>
        <a href="logout.php">Logout</a> | 
        <a href="home.php">Cadastrar Novo Produto</a>
    </p>

    <?php 
        require_once 'funcoes.php';
        tratar_erros();

        require_once 'conexao.php';

        $conn = conectar_banco();
        $id = $_SESSION['id'];

        $sql = "SELECT id_produto, produto, descricao, quantidade, valor 
                FROM tb_produtos 
                WHERE usuario_id = $id";

        $resultado = mysqli_query($conn, $sql);

        $linhas = mysqli_num_rows($resultado);

        if ($linhas < 0) {
            exit("<h3>Erro ao buscar produtos do estoque. Tente novamente mais tarde ou contate o suporte.</h3>");
        }

        if ($linhas == 0) {
            echo "<h3>Seu estoque está vazio!</h3>";
        } else {
            echo '<div class="row">';
            echo '<div class="col col-md-10">';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Produto</th>';
            echo '<th>Descrição</th>';
            echo '<th>Quantidade</th>';
            echo '<th>Valor (R$)</th>';
            echo '<th>Ações</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($produto_atual = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';
                echo    '<td>'.$produto_atual['produto'].'</td>';
                echo    '<td>'.$produto_atual['descricao'].'</td>';
                echo    '<td>'.$produto_atual['quantidade'].'</td>';
                echo    '<td>R$ '.number_format($produto_atual['valor'], 2, ',', '.').'</td>';
                echo    '<td>';
                echo        '<a href="editar_produto.php?id='.$produto_atual['id_produto'].'" class="btn btn-success btn-sm">Editar</a> ';
                echo        '<a href="deletar_produto.php?id='.$produto_atual['id_produto'].'" class="btn btn-outline-danger btn-sm">Excluir</a>';
                echo    '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
    ?>

</body>
</html>
