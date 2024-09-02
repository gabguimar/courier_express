<?php
// Função para configurar o log de erros
function configureErrorLogging() {
    $currentDirectory = dirname(__FILE__);
    $logFile = $currentDirectory . '/php-error.log';

    ini_set('log_errors', 1);
    ini_set('error_log', $logFile);
    ini_set('display_errors', 0); // Desativa a exibição de erros no navegador
}

// Função para manipulação personalizada de erros
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Formata a mensagem de erro
    $logMessage = "[Erro $errno] $errstr - $errfile:$errline";
    
    // Registra o erro no arquivo de log
    error_log($logMessage);

    // Evita que o PHP exiba o erro e garante que o código continue executando
    return true;
}

// Função para manipulação personalizada de exceções
function customExceptionHandler($exception) {
    // Formata a mensagem da exceção
    $logMessage = "[Exceção] " . $exception->getMessage() . " em " . $exception->getFile() . ":" . $exception->getLine();
    
    // Registra a exceção no arquivo de log
    error_log($logMessage);

    // Exibe uma mensagem amigável para o usuário
    echo "<p>Um erro inesperado ocorreu. Estamos trabalhando para corrigir isso.</p>";
}

// Configura o log de erros e define os manipuladores personalizados
configureErrorLogging();
set_error_handler('customErrorHandler');
set_exception_handler('customExceptionHandler');

?>
