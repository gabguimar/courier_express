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
        $sql = "SELECT * FROM encomendas";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <div class="encomendas">
                    <div class="row">
                        <div class="col-12">
                            <label class="label-encomendas">Horário Recolha: </label>
                            <label> <?php 
                                // Cria um objeto DateTime a partir da coluna horario_recolha
                                $datetime = new DateTime($row['horario_recolha'] ?? 'now');

                                // Formata a data e hora para o formato desejado
                                $formattedDatetime = $datetime->format('H:i');
                                echo $formattedDatetime; ?>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="label-encomendas">Horário Entrega: </label>
                            <label> <?php 
                                $datetime = new DateTime($row['horario_entrega'] ?? 'now');
                                $formattedDatetime = $datetime->format('H:i');
                                echo $formattedDatetime; ?>
                            </label>
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
                    <div class="row">
                        <div class="col-12" style="display: flex; justify-content: center; margin-top: 15px;">
                            <button type="button" class="btn-verde"><?php echo "FINALIZAR ENCOMENDA";?> <i class="bi bi-check-circle"></i> </button>
                        </div>
                    </div>
                </div>
                <div class="spacing"></div>
            <?php
            }
        }
        ?>
    </article>
</body>
</html>
