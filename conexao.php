<?php 
function conectar_banco() {

    $servidor   = 'localhost';
    $usuario    = 'root';
    $senha      = '';
    $banco      = 'criar_banco';   
    
    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (!$conn) {
        exit("Erro na conexão: " . mysqli_connect_error());
    }

    return $conn;
}

?>