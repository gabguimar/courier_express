<?php
// Ativar exibição de erros
ini_set('display_errors', 1);

// Ativar log de erros
ini_set('log_errors', 1);

// Definir o caminho do arquivo de log de erros para o diretório atual
ini_set('error_log', __DIR__ . '/php_errors.log');

// Definir o nível de relatório de erros
error_reporting(E_ALL);

// Seu código PHP vai aqui
?>
