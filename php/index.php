<?php
include('../functions/connect.php');
include('../functions/essentials.php');
include('../functions/error_log.php');

//############################ Iniciando a sessão através do sistema de LOGIN ####################################
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && isset($_POST['password'])) {

        // Limpando as variaveis username e password do metodo post, como forma de evitar um SQL Injection
        $login = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        $sql = "SELECT * FROM utilizadores WHERE login_utilizador = '$login' AND senha = '$password'";
        $result = $conn->query($sql) or die("Falha na execução do código SQL: ". $conn->error);

        if ($result->num_rows > 0) {
            $utilizador = $result->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            // Criando as variáveis de sessão que serão usadas
            $_SESSION['utilizador_id'] = $utilizador['utilizador_id'];
            $_SESSION['nome'] = $utilizador['nome'];
            $_SESSION['login_utilizador'] = $utilizador['login_utilizador'];
            $_SESSION['tipo_utilizador'] = $utilizador['tipo_utilizador'];


            // Redirecionando para a página de criação de encomendas
            header("Location: criar.php");
        } else {
            echo "
            <!DOCTYPE html>
            <html lang='pt-pt'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Login</title>
                </head>
                <body>
                    <div class='d-flex justify-content-center align-items-center' style='height: 100vh; margin-left: 85vh;'>
                        <div class='text-center'>
                            <img src='../src/img/logo.png' style='width: 300px; height: 200px;'><br>
                            <label>Login ou palavra-passe inválidos!</label><br>
                            <a href='index.php' class='btn btn-primary'>Ir a página de login</a>
                        </div>
                    </div>
                </body>
            </html>
            ";
            exit();
        }
    }
}
?>
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
                <img src="../src/img/logo.png" style="width: 300px; height: 200px;">
                <form action="" method="post">
                    <label for="username">Utilizador:</label><br>
                    <input class="input-text" type="text" id="username" name="username" required><br><br>
                    <label for="password">Palavra-passe:</label><br>
                    <input class="input-text" type="password" id="password" name="password" required><br><br>
                    <input type="submit" value="Login" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>