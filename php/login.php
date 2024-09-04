<?php
include('connect.php');
include('essentials.php');
include('error_log.php');
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