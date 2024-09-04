<?php
include('connect.php'); // Inclui o arquivo de conexão

// Obtém o último ID da encomenda
$sql = "SELECT id_encomenda FROM encomendas ORDER BY id_encomenda DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id_encomenda = $row ? $row['id_encomenda'] + 1 : 1; // Se não houver resultado, começa do ID 1

$form = $_POST['formulario'] ?? '';

if ($form === "criar_pedido") {
    // Coletando os dados do formulário com segurança
    $nome_cliente = $conn->real_escape_string($_POST['nome_cliente'] ?? '');
    $morada = $conn->real_escape_string($_POST['morada'] ?? '');
    $codigo_postal = $conn->real_escape_string($_POST['codigo_postal'] ?? '');
    $horario_recolha = date('Y-m-d H:i:s', strtotime($_POST['horario_recolha'] ?? ''));
    $horario_entrega = date('Y-m-d H:i:s', strtotime($_POST['horario_entrega'] ?? ''));
    $observacao = $conn->real_escape_string($_POST['observacao'] ?? '');
    $estafeta = $conn->real_escape_string($_POST['estafeta'] ?? '');
    $produto = $conn->real_escape_string($_POST['produto'] ?? '');
    $quantidade = (int)($_POST['quantidade'] ?? 0);

    $tempo = new DateTime();
    $agora = $tempo->format('Y-m-d H:i:s');
    

    // Criando a consulta SQL para inserir os dados nas tabela 'encomendas', 'statusencomenda', 'atualizacaoencomenda'
    $sql = "INSERT INTO encomendas (id_encomenda, morada_cliente, horario_recolha, horario_entrega, produto, quantidade_produto, codigo_postal, nome_cliente, observacao, estafeta_id)
            VALUES ($id_encomenda, '$morada', '$horario_recolha', '$horario_entrega', '$produto', $quantidade, '$codigo_postal', '$nome_cliente', '$observacao', '$estafeta')";
    // return;
    $result = $conn->query($sql);

     $sql1= "INSERT INTO atualizacoesencomenda (id_encomenda, status_id, atualizado_em, atualizado_por)
            VALUES ($id_encomenda, 1, '$agora', 1)"; // Substituir 1 por código do usuário quando existirem as variáveis de sessão.
    // return;
    $result1 = $conn->query($sql1);


    $queries = $sql . $sql1; // Concatenate queries

    if ($result && $result1) {
        echo "Encomenda criada com sucesso!";
    } else {
        echo "Erro ao inserir a encomenda: " . $conn->error;
    }
} else {
    echo "Nenhum dado foi enviado.";
}
?>
