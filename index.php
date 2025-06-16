<?php 
    require_once 'funcoes.php';

    tratar_erros();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 col-12 col-md-6 col-lg-4">
        <h2 class="text-center mb-4">Login</h2>

        <form action="verificar.php" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário:</label>
                <input type="text" class="form-control" name="usuario" id="usuario" required>
                <div class="form-text">Não compartilhe seu usuário com ninguém</div>
            </div>
            
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Entrar</button>
            </div>
        </form>
    </div>
</div>

    <br>
    
    <div class="mb-3">
        
            <label for="usuario" class="form-label">Usuário:</label><br>
            <input type="text" class="form-control" name="usuario" id="usuario">
            <div id="emailHelp" class="form-text">Não compartilhe seu usuário com ninguém</div>
    </div>
        
    <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label><br>
            <input type="password" class="form-control" name="senha" id="senha">
    </div>

        <button type="submit" class="btn btn-success ">Login</button>

    </form>

</body>
</html>