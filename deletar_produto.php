<?php require_once 'cadeado.php';

if (!isset($_GET['id'])) {
    header('location:estoque.php?code=0');
    exit;
}

$id_produto = (int)$_GET['id']; // id do produto vindo via GET

require_once 'conexao.php';

$conn = conectar_banco();

$id_usuario = $_SESSION['id']; // id do usuário logado (SESSION)

$sql = "DELETE FROM tb_produtos WHERE id_produto = $id_produto AND usuario_id = $id_usuario";

mysqli_query($conn, $sql);

$linhas = mysqli_affected_rows($conn);

if ($linhas <= 0) {
    header('location:estoque.php?code=3');
    exit;
}

// se não houver erro, volta para home
header('location:estoque.php');

?>
