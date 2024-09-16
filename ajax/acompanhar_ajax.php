<?php
include('../functions/connect.php'); // Inclui o arquivo de conexão com a BD
include('../functions/protect.php'); // Inclui o arquivo de sessão 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $id_encomenda = $_POST['id_encomenda'];
    $utilizador_id = $_SESSION['utilizador_id'];

    $tempo = new DateTime();
    $agora = $tempo->format('Y-m-d H:i:s');
    $sql1 = "UPDATE atualizacoesencomenda
             SET status_id = $status, atualizado_em = '$agora', 
             atualizado_por = $utilizador_id   
             WHERE id_encomenda = $id_encomenda";
    $result1 = $conn->query($sql1);
}
?>
