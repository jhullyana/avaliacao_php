<?php 

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function form_em_branco() {
    return empty($_POST['usuario']) || empty($_POST['senha']);
}

function produto_em_branco() {
    return empty($_POST['produto']);
}


function tratar_erros() {
    if (isset($_GET['code'])) {
        $code = $_GET['code'];
        $mensagem = '';
        $tipo = 'danger'; 
        switch($code) {
            case 0:
                $mensagem = "⚠️ Por favor, acesse o formulário corretamente.";
                break;
            case 1:
                $mensagem = "❌ Usuário ou senha inválidos.";
                break;
            case 2:
                $mensagem = "⚠️ Preencha todos os campos.";
                break;
            case 3:
                $mensagem = "❌ Erro ao preparar a consulta no banco de dados.";
                break;
            case 4:
                $mensagem = "❌ Erro ao executar o comando no banco de dados.";
                break;
            default:
                $mensagem = "❗Erro desconhecido.";
                break;
        }

        echo "<div class='alert alert-$tipo alert-dismissible fade show' role='alert'>
                $mensagem
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
}


?>