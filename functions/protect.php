<?php 

// Verifica se a sessão contém um ID de usuário válido, o que indica que o usuário está autenticado
// Se o ID não estiver definido, a sessão é interrompida e uma página de erro é exibida

if(!isset($_SESSION)){
	session_start();
}
if (!isset($_SESSION['utilizador_id'])) {
    die('
    <!DOCTYPE html>
    <html lang="pt-pt">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
        </head>
        <body>
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh; margin-left: 85vh;">
                <div class="text-center">
                    <img src="../src/img/logo.png" style="width: 300px; height: 200px;"><br>
					<label>Você não tem acesso a essa página</label><br>
					<a href="index.php"class="btn btn-primary">Ir a página de login</a>
                </div>
            </div>
        </body>
    </html>');
}


?>