<?php

$conn = mysqli_connect("localhost", "root", "", "cadastro_pessoa", port: 3308);

if (!$conn) {
    die("Falha na conexão" . mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de Produtos</title>
    <link rel="stylesheet" href="../_css/style.css">
    <style>
        .quadrado-fundo input[type="submit"] {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>

    <section class="formulario">
        <div class="quadrado-fundo">
            <form method="post">
                <br><br>
                <label>ID da pessoa</label> <br>
                <select name="idpessoa" id="idPessoa">
                    <option value="selecPessoa">Selecione a Pessoa</option>
                    <?php
                    $sqlNome = "SELECT id_pessoa, pessoa_nome FROM cadastro_pessoa.cadastro";
                    $connect = $conn->query($sqlNome);
                    if ($connect) {
                        while ($u = $connect->fetch_assoc()) {
                            $id = $u['id_pessoa'];
                            $nome = htmlspecialchars($u['pessoa_nome']);
                            echo "<option value='$id'> $id | $nome</option>";
                        }
                    }
                    ?>
                </select><br><br>
                <label>Tipo do Produto</label><br>
                <input type="text" name="tipoProd"><br><br>
                <label>Data do Pedido</label><br>
                <input type="date" name="dataPed"><br><br>
                <label>Data da Entrega</label><br>
                <input type="date" name="dataEnt"><br><br>
                <label>Status do Pedido</label><br>
                <input type="text" name="statusPed"><br><br>
                <label>Local de partida</label><br>
                <input type="text" name="localPart"><br><br>
                <label>Local de chegada</label><br>
                <input type="text" name="localCheg"><br><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
        <button onclick="window.location.href='../'">Voltar</button>
    </section>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idPessoa = $_POST["idpessoa"];
        $tipoProd = $_POST["tipoProd"];
        $dataPed = $_POST["dataPed"];
        $dataEnt = $_POST["dataEnt"];
        $statusPed = $_POST["statusPed"];
        $localPart = $_POST["localPart"];
        $localCheg = $_POST["localCheg"];

        $sql = "INSERT INTO pedidos (id_pessoas, tipo_pedido, data_pedido, data_entrega, status_pedido, local_partida, local_chegada)
        VALUES('$idPessoa', '$tipoProd',  '$dataPed','$dataEnt','$statusPed', '$localPart', '$localCheg')
        ";

        if (!mysqli_query($conn, $sql)) {
            die("Erro ao inserir dados" . mysqli_error($conn));
        } else {
            echo "Enviado com sucesso";
        }
    }

    ?>

</body>

</html>