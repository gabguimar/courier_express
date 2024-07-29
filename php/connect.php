<?php
$servername = "localhost";
$username = "root";
$password = "ggcs3007";
$database = "courier_express";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conectado com sucesso";

// Fecha a conexão
$conn->close();
?>
