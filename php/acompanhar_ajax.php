<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $id_encomenda = $_POST['id_encomenda'];
    

    $tempo = new DateTime();
    $agora = $tempo->format('Y-m-d H:i:s');

    // echo "ID encomenda: ".$id_encomenda." Status: ".$status;
    
    
    echo $sql1 = "UPDATE atualizacoesencomenda
                  SET status_id = $status, atualizado_em = '$agora', 
                  atualizado_por = 1  --Alterar para o id do utilizador quando for tratar dessas partes
                  WHERE id_encomenda = $id_encomenda";
    return;
    // $result1 = $conn->query($sql1);
    // Processar o status conforme necessário
}
?>
