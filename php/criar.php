<?php
include('connect.php');
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar encomenda</title>
</head>
<body>
    <article class="content">
        <h1><?php echo "Criar encomenda";?> </h1>
       <form action=""> 
            <div class="row">
                <div class="col-12">
                    <label for="destinatario">Nome do Cliente:</label>
                    <input type="text" class="input-text" id="destinatario"></input>
                </div>
            </div>
       </form>
    </article>
</body>
</html>