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

// Define o charset da conexão para UTF-8 (opcional, mas recomendado)
$conn->set_charset("utf8");
?>
