<?php

$conn = mysqli_connect("localhost", "root", "", "cadastro_pessoa", port: 3308);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/style.css">
    <title>inclusao</title>
</head>

<body>

    <section class="formulario">
        <div class="quadrado-fundo"><br>
            <form method="post">
                <label>Nome</label> <br>
                <input type="text" name="nome" required> <br><br>
                <label>Cpf</label> <br>
                <input type="text" name="cpf" required> <br><br>
                <label>Rg</label> <br>
                <input type="text" name="rg" required> <br><br>
                <label>Data de Nascimento</label> <br>
                <input type="date" name="data_nascimento" required> <br><br>
                <label>Cep</label> <br>
                <input type="text" name="cep" required> <br><br>
                <label>Rua</label> <br>
                <input type="text" name="rua" required> <br><br>
                <label>Numero da casa</label> <br>
                <input type="text" name="numero_casa" required> <br><br>
                <label>Celular</label> <br>
                <input type="text" name="celular" required> <br><br>
                <label>E-mail</label> <br>
                <input type="text" name="email" required> <br><br>
                <label>Data de Cadastro</label> <br>
                <input type="date" name="data_cadastro" required> <br><br>
                <label>Status/Atividade</label> <br>
                <input type="text" name="status_atividade" required> <br><br>
                <label>Cargo</label> <br>
                <input type="text" name="cargo" required> <br><br>
                <label>Salário</label> <br>
                <input type="number" name="salario" required> <br><br>
                <label>Sexo</label> <br>
                <input type="text" name="sexo" required> <br><br>
                <label>Idade</label> <br>
                <input type="number" name="idade" required> <br><br>

                <input type="submit" value="Enviar">
            </form>

        </div>
        <button onclick="window.location.href='../'">Voltar</button>
    </section>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];
        $data_nascimento = $_POST["data_nascimento"];
        $cep = $_POST["cep"];
        $rua = $_POST["rua"];
        $numero_casa = $_POST["numero_casa"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $data_cadastro = $_POST["data_cadastro"];
        $status_atividade = $_POST["status_atividade"];
        $cargo = $_POST["cargo"];
        $salario = $_POST["salario"];
        $sexo = $_POST["sexo"];
        $idade = $_POST["idade"];

        $msql = "INSERT INTO cadastro(pessoa_nome, pessoa_cpf, pessoa_rg, pessoa_nascimento, pessoa_cep, pessoa_rua, pessoa_casanumero, pessoa_celular, pessoa_email, pessoa_datacadastro, pessoa_status, pessoa_cargo, pessoa_salario, pessoa_sexo, pessoa_idade) 
        VALUES('$nome', '$cpf', '$rg', '$data_nascimento', '$cep', '$rua', '$numero_casa', '$celular', '$email', '$data_cadastro', '$status_atividade', '$cargo', '$salario', '$sexo', '$idade')
        ";

        if (mysqli_query($conn, $msql)) {
            echo "<script>alert('Dados inseridos com sucesso');</script>";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    ?>

</body>

</html>