<?php
include('connect.php');
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar encomenda</title>
</head>
<body>
    <article class="content">
        <h1><?php echo "Criar encomenda";?> </h1>
        <div class="spacing"></div>
        <!-- Campos do Formulário -->
        <div class="row">
            <div class="col-6">
                <label for="nome_cliente">Nome do Cliente:</label><br>
                <input type="text" class="input-text" id="nome_cliente" placeholder="Digite o nome do cliente" />
            </div>
            <div class="col-6">
                <label for="morada">Morada:</label><br>
                <input type="text" class="input-text" id="morada" placeholder="Digite a morada do cliente" />
            </div>
            <div class="spacing"></div>
            <div class="col-6">
                <label for="codigo_postal">Código Postal:</label><br>
                <input type="text" class="input-text" id="codigo_postal" placeholder="Digite o código postal" />
            </div>
        </div>
        <div class="spacing"></div>
        <div class="row">
            <div class="col-6">
                <label for="horario_entrega">Horário Entrega:</label><br>
                <input type="time" class="input-text" id="horario_entrega" />
            </div>
            <div class="col-6">
                <label for="horario_recolha">Horário Recolha:</label><br>
                <input type="time" class="input-text" id="horario_recolha" />
            </div>
        </div>
        <div class="spacing"></div>
        <h1><?php echo "Atribuir encomenda";?> </h1>
        <div class="spacing"></div>
        <div class="row">
            <div class="col-6">
                <label for="estafeta">Estafeta:</label><br>
                <select class="input-select" name="estafeta" id="estafeta">
                    <option value="0">Selecione um estafeta</option>
                    <?php
                        $sql = "SELECT utilizador_id, nome FROM utilizadores";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['utilizador_id']}'>{$row['nome']}</option>";
                            }
                        } else {
                            echo "<option value=''>0 resultados</option>";
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="spacing"></div>
        <h1><?php echo "Descrição da encomenda";?> </h1>
        <div class="spacing"></div>
        
        <div class="row">
            <div class="col-12">
                <table id="tabela_encomendas">
                    <thead>
                        <tr>
                            <th>PRODUTO</th>
                            <th>QUANTIDADE</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="input-text" name="produto" placeholder="Produto" /></td>
                            <td><input type="number" class="input-text" name="quantidade" placeholder="Quantidade" /></td>
                            <td><button type="button" class="btn-vermelho" onclick="removerLinha(this)">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                <div class="spacing"></div>
                <div class="row">
                    <div class="col-12" style="display: flex; justify-content: flex-end;">
                        <button class="btn-azul" id="botaoAdicionar" onclick="adicionarLinha()">ADICIONAR <span class="icon"><i class="bi bi-plus-circle-fill"></i></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacing linha"></div>
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: flex-end;">
                <button type="button" class="btn-vermelho"><?php echo "LIMPAR";?></button>
                <div class="espaco"></div>
                <button type="submit" class="btn-verde"><?php echo "GERAR";?></button>
            </div>
        </div>
    </article>
</body>
</html>
