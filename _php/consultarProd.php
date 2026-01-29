<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/style.css">
    <title>Consultar Usuarios</title>
    <style>
        .data {
            width: 15%;
        }
    </style>
</head>

<body>

    <div class="consultar">
        <h1>Consulta de Pedidos</h1>
        <?php

        $servername = "localhost";
        $database = "cadastro_pessoa";
        $username = "root";
        $password = "";
        $port = 3308;

        $conn = mysqli_connect($servername, $username, $password, $database, $port);

        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        $sql = "SELECT 
                    cdprod.id_pedidos,
                    cdpess.pessoa_nome,
                    cdprod.tipo_pedido,
                    cdprod.data_pedido,
                    cdprod.data_entrega,
                    cdprod.status_pedido,
                    cdprod.local_partida,
                    cdprod.local_chegada
                FROM
	                pedidos cdprod
                INNER JOIN
	                cadastro cdpess
                ON
	                cdprod.id_pessoas = cdpess.id_pessoa;";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

        if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo "<thead><tr>";
            echo "<th>ID Pedido</th>";
            echo "<th>Pessoa</th>";
            echo "<th>Tipo do Pedido</th>";
            echo "<th>Data Pedido</th>";
            echo "<th>Data Entrega</th>";
            echo "<th>Status Pedido</th>";
            echo "<th>Local de Partida</th>";
            echo "<th>Local de Chegada</th>";
            echo "</tr></thead>";
            echo "<tbody>";

            while ($linha = mysqli_fetch_assoc($resultado)) {

                echo "<tr>";
                echo "<td>" . htmlspecialchars($linha['id_pedidos']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_nome']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['tipo_pedido']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['data_pedido']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['data_entrega']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['status_pedido']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['local_partida']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['local_chegada']) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Nenhum registro encontrado.";
        }

        mysqli_close($conn);

        ?>
    </div>

    <div class="botao-inclusao">
        <button onclick="window.location.href='../'">Voltar</button>
    </div>

</body>

</html>