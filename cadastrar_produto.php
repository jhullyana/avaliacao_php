<?php require_once 'cadeado.php';

require_once 'funcoes.php';

if (form_nao_enviado()) {
    header('location:home.php?code=0');
    exit;
}

if (campos_nao_preenchido()) {
    header('location:home.php?code=2');
    exit;
}

$produto = $_POST['produto'];
$descricao = $_POST['descricao'];
$quantidade = (int)$_POST['quantidade'];
$valor = (float)$_POST['valor'];
$id_usuario = $_SESSION['id'];

require_once 'conexao.php';

$conn = conectar_banco();

$sql = "INSERT INTO tb_produtos (produto, descricao, quantidade, valor, usuario_id) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    header('location:home.php?code=3');
    exit;
}

mysqli_stmt_bind_param($stmt, 'ssidi', 
    $produto, $descricao, $quantidade, $valor, $id_usuario);

if (!mysqli_stmt_execute($stmt)) {
    header('location:home.php?code=3');
    exit;
}

header('location:home.php');

?>
