<?php

$form = $_POST['formulario'];

if ($form == "criar_pedido") {

    echo $nome_cliente = $_POST['nome_cliente'];
    echo $morada = $_POST['morada'];
    echo $codigo_postal = $_POST['codigo_postal'];
    echo $horario_entrega = $$_POST['horario_entrega'];
    echo $horario_recolha = $_POST['horario_recolha'];
    echo $observacao = $_POST['observacao'];
    echo $estafeta = $_POST['estafeta'];
    echo $encomendas = $_POST['encomendas']; // Array de encomendas

    // echo $sql = "INSERT INTO encomendas (morada_cliente, horario_recolha, horario_entrega, produto, quantidade_produto, codigo_postal, nome_cliente, observacao, estafeta_id)
    //                 VALUES ('$morada', '$horario_recolha', '$horario_entrega', '$produto', $quantidade_produto, '$codigo_postal', '$nome_cliente', '$observacao', '$estafeta')";
    //                 return;
    // Verifica se o array de encomendas não está vazio
    if (!empty($encomendas)) {
        foreach ($encomendas as $encomenda) {
            $produto = $conn->real_escape_string($encomenda['produto']);
            $quantidade_produto = intval($encomenda['quantidade']); // Converte para inteiro

            // Prepara a consulta SQL para inserção de cada produto
            $sql = "INSERT INTO encomendas (morada_cliente, horario_recolha, horario_entrega, produto, quantidade_produto, codigo_postal, nome_cliente, observacao, estafeta_id)
                    VALUES ('$morada', '$horario_recolha', '$horario_entrega', '$produto', $quantidade_produto, '$codigo_postal', '$nome_cliente', '$observacao', '$estafeta')";
             return;
            // Executa a consulta
            if ($conn->query($sql) !== TRUE) {
                echo "Erro ao inserir produto: " . $conn->error;
                exit;
            }
        }
        echo "Encomenda criada com sucesso!";
    } else {
        echo "Nenhum produto foi informado.";
    }
} else {
    echo "Nenhum dado foi enviado.";
}
?>
