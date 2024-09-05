<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhar encomenda</title>
</head>
<body>
    <article class="content">
    <?php
        // Certifique-se de que a conexão com o banco de dados está estabelecida
        // Exemplo: $conn = new mysqli($servername, $username, $password, $dbname);

        $result = $conn->query("SELECT * FROM encomendas");

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Obtendo as atualizações da encomenda relacionada
                $result_atualizacoesencomenda = $conn->query("SELECT * FROM atualizacoesencomenda WHERE id_encomenda = '{$row['id_encomenda']}'");
                $row_atualizacoesencomenda = $result_atualizacoesencomenda->fetch_assoc();

                // Verificar se as atualizações foram encontradas
                if (!empty($row_atualizacoesencomenda)) {
                    // Fazendo a consulta de status baseado no status_id da encomenda
                    $result_status = $conn->query("SELECT status_id, nome_status FROM statusencomenda WHERE status_id = '{$row_atualizacoesencomenda['status_id']}'");
                    $row_status = $result_status->fetch_assoc();
                } else {
                    $row_status = null;
                }

                // Verificar se $row_status não é null e contém o status_id
                if ($row_status && $row_status['status_id'] != 3) { ?>
                    <div class="encomendas">
                        <div class="row">
                            <div class="col-6">
                                <label class="label-encomendas">Cliente: </label>
                                <label> <?php echo $row['nome_cliente'] ?? 'Não informado'; ?></label>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <label class="label-encomendas" style="font-size: 20px;">
                                    Pedido: <?php echo $row['id_encomenda'] ?? 'Não informado'; ?>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="label-encomendas">Horário Recolha: </label>
                                <label> <?php 
                                    $horario_recolha = $row['horario_recolha'] ?? null;
                                    if ($horario_recolha) {
                                        $datetime = new DateTime($horario_recolha);
                                        echo $datetime->format('H:i');
                                    } else {
                                        echo 'Não informado';
                                    }
                                ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="label-encomendas">Horário Entrega: </label>
                                <label> <?php 
                                    $horario_entrega = $row['horario_entrega'] ?? null;
                                    if ($horario_entrega) {
                                        $datetime = new DateTime($horario_entrega);
                                        echo $datetime->format('H:i');
                                    } else {
                                        echo 'Não informado';
                                    }
                                ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="label-encomendas">Morada: </label>
                                <label> <?php echo $row['morada_cliente'] ?? 'Não informado'; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="label-encomendas">Código Postal: </label>
                                <label> <?php echo $row['codigo_postal'] ?? 'Não informado'; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="label-encomendas">Observações: </label>
                                <label> <?php echo $row['observacao'] ?? 'Não informado'; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="label-encomendas">Status: </label>
                                <?php 
                                    if ($row_status) {
                                        switch ($row_status['status_id']) {
                                            case 1: ?>
                                                <label class="label-status-1"> <?php echo $row_status['nome_status'] ?? 'Não informado'; ?></label>
                                                <?php break;
                                            case 2: ?>
                                                <label class="label-status-2"> <?php echo $row_status['nome_status'] ?? 'Não informado'; ?></label>
                                                <?php break;
                                            case 4: ?>
                                                <label class="label-status-4"> <?php echo $row_status['nome_status'] ?? 'Não informado'; ?></label>
                                                <?php break;
                                            default: ?>
                                                <label class="label-status-default">Status desconhecido</label>
                                                <?php break;
                                        }
                                    } else { ?>
                                        <label class="label-status-default">Status desconhecido</label>
                                    <?php }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>PRODUTO</th>
                                            <th>QUANTIDADE</th>
                                        </tr>
                                    </thead>
                                    <tbody class="td-encomendas">
                                        <tr>
                                            <td><label><?php echo $row['produto'] ?? 'Não informado'; ?></label></td>
                                            <td><label><?php echo $row['quantidade_produto'] ?? 'Não informado'; ?></label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="display: flex; justify-content: center; margin-top: 15px;">
                            <div class="col-4" style="display: flex; justify-content: center;">
                                <button type="button" class="btn-vermelho" id="encerrar" data-status="3" data-value="<?php echo $row['id_encomenda']; ?>">
                                    <span class="icon"><i class="bi bi-x-square-fill"></i></span> ENCERRAR
                                </button>
                            </div>
                            <div class="col-4" style="display: flex; justify-content: center;">
                                <button type="button" class="btn-azul" id="em_curso" data-status="2" data-value="<?php echo $row['id_encomenda']; ?>">
                                    <span class="icon"><i class="bi bi-cart-check-fill"></i></span> EM CURSO
                                </button>
                            </div>
                            <div class="col-4" style="display: flex; justify-content: center;">
                                <button type="button" class="btn-verde" id="levantar" data-status="4" data-value="<?php echo $row['id_encomenda']; ?>">
                                    <span class="icon"><i class="bi bi-check-square-fill"></i></span> LEVANTAR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="spacing"></div><?php 
                } // Fim do if ($row_status['status_id'] != 3)
            } // Fim do while
        } // Fim do if ($result->num_rows > 0)
    ?>
    </article>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Função genérica para capturar o clique dos botões
            $('button').click(function() {
                var status = $(this).data('status'); // Obtém o valor do status do botão clicado
                var id_encomenda = $(this).data('value'); // Obtém o valor da encomenda do botão clicado

                console.log(id_encomenda);
                // Envia o status e id_encomenda via AJAX
                $.ajax({
                    url: "acompanhar_ajax.php",
                    method: "POST",
                    data: {
                        status: status,
                        id_encomenda: id_encomenda,
                        formulario: "alterar_status"
                    },
                    success: function(resposta) {
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Erro: " + textStatus + " - " + errorThrown);
                    }
                });

            });
        });
    </script>
</body>
</html>
