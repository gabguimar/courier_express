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

// Fecha a conexão
$conn->close();
?>
