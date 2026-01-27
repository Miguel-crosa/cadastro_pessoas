<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/style.css">
    <title>Consultar Usuarios</title>
</head>

<body>


    <div class="consultar">
        <h1>Consulta de Cadastros</h1>
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

        $sql = "SELECT * FROM cadastro";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

        if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo "<thead><tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Cpf</th>";
            echo "<th>Rg</th>";
            echo "<th>Data Nascimento</th>";
            echo "<th>Cep</th>";
            echo "<th>Rua</th>";
            echo "<th>Numero Residencia</th>";
            echo "<th>Celular</th>";
            echo "<th>E-mail</th>";
            echo "<th>Data Cadastro</th>";
            echo "<th>Status (ativo/inativo)</th>";
            echo "<th>Cargo</th>";
            echo "<th>Salário</th>";
            echo "<th>Sexo</th>";
            echo "<th>Idade</th>";
            echo "<th>Ações</th>";
            echo "</tr></thead>";
            echo "<tbody>";

            while ($linha = mysqli_fetch_assoc($resultado)) {

                echo "<tr>";
                echo "<td>" . htmlspecialchars($linha['id_pessoa']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_nome']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_cpf']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_rg']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_nascimento']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_cep']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_rua']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_casanumero']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_celular']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_email']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_datacadastro']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_status']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_cargo']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_salario']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_sexo']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['pessoa_idade']) . "</td>";
                echo "<td>";
                echo "<a href='alterar.php?id=" . $linha['id_pessoa'] . "' class='btn-editar'>Editar</a> ";
                echo "<a href='excluir.php?id=" . $linha['id_pessoa'] . "' class='btn-deletar' onclick='return confirm(\"Tem certeza que deseja deletar este registro?\");'>Deletar</a>";
                echo "</td>";
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