<?php

$conn = mysqli_connect("localhost", "root", "", "cadastro_pessoa", port: 3308);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$registro = null;

if ($id > 0) {
    $sql = "SELECT * FROM cadastro WHERE id_pessoa = $id";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $registro = mysqli_fetch_assoc($resultado);
    } else {
        die("Registro não encontrado!");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $id > 0) {
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $cpf = mysqli_real_escape_string($conn, $_POST["cpf"]);
    $rg = mysqli_real_escape_string($conn, $_POST["rg"]);
    $data_nascimento = mysqli_real_escape_string($conn, $_POST["data_nascimento"]);
    $cep = mysqli_real_escape_string($conn, $_POST["cep"]);
    $rua = mysqli_real_escape_string($conn, $_POST["rua"]);
    $numero_casa = mysqli_real_escape_string($conn, $_POST["numero_casa"]);
    $celular = mysqli_real_escape_string($conn, $_POST["celular"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $data_cadastro = mysqli_real_escape_string($conn, $_POST["data_cadastro"]);
    $status_atividade = mysqli_real_escape_string($conn, $_POST["status_atividade"]);
    $cargo = mysqli_real_escape_string($conn, $_POST["cargo"]);
    $salario = mysqli_real_escape_string($conn, $_POST["salario"]);
    $sexo = mysqli_real_escape_string($conn, $_POST["sexo"]);
    $idade = mysqli_real_escape_string($conn, $_POST["idade"]);


    $sql = "UPDATE cadastro SET 
        pessoa_nome = '$nome', 
        pessoa_cpf = '$cpf', 
        pessoa_rg = '$rg', 
        pessoa_nascimento = '$data_nascimento', 
        pessoa_cep = '$cep', 
        pessoa_rua = '$rua', 
        pessoa_casanumero = '$numero_casa', 
        pessoa_celular = '$celular', 
        pessoa_email = '$email', 
        pessoa_datacadastro = '$data_cadastro', 
        pessoa_status = '$status_atividade', 
        pessoa_cargo = '$cargo', 
        pessoa_salario = '$salario',
        pessoa_sexo = '$sexo',
        pessoa_idade = '$idade'
    WHERE id_pessoa = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registro atualizado com sucesso!'); window.location.href='consultar.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar: " . mysqli_error($conn) . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/style.css">
    <title>Editar Cadastro</title>
</head>

<body>

    <section class="formulario">
        <div class="quadrado-fundo"><br>
            <h2>Editar Cadastro - ID: <?php echo htmlspecialchars($id); ?></h2>

            <?php if ($registro): ?>
                <form method="post">
                    <label>Nome</label> <br>
                    <input type="text" name="nome" value="<?php echo htmlspecialchars($registro['pessoa_nome']); ?>" required> <br><br>

                    <label>Cpf</label> <br>
                    <input type="text" name="cpf" value="<?php echo htmlspecialchars($registro['pessoa_cpf']); ?>" required> <br><br>

                    <label>Rg</label> <br>
                    <input type="text" name="rg" value="<?php echo htmlspecialchars($registro['pessoa_rg']); ?>" required> <br><br>

                    <label>Data de Nascimento</label> <br>
                    <input type="date" name="data_nascimento" value="<?php echo htmlspecialchars($registro['pessoa_nascimento']); ?>" required> <br><br>

                    <label>Cep</label> <br>
                    <input type="text" name="cep" value="<?php echo htmlspecialchars($registro['pessoa_cep']); ?>" required> <br><br>

                    <label>Rua</label> <br>
                    <input type="text" name="rua" value="<?php echo htmlspecialchars($registro['pessoa_rua']); ?>" required> <br><br>

                    <label>Numero da casa</label> <br>
                    <input type="text" name="numero_casa" value="<?php echo htmlspecialchars($registro['pessoa_casanumero']); ?>" required> <br><br>

                    <label>Celular</label> <br>
                    <input type="text" name="celular" value="<?php echo htmlspecialchars($registro['pessoa_celular']); ?>" required> <br><br>

                    <label>E-mail</label> <br>
                    <input type="text" name="email" value="<?php echo htmlspecialchars($registro['pessoa_email']); ?>" required> <br><br>

                    <label>Data de Cadastro</label> <br>
                    <input type="date" name="data_cadastro" value="<?php echo htmlspecialchars($registro['pessoa_datacadastro']); ?>" required> <br><br>

                    <label>Status/Atividade</label> <br>
                    <input type="text" name="status_atividade" value="<?php echo htmlspecialchars($registro['pessoa_status']); ?>" required> <br><br>

                    <label>Cargo</label> <br>
                    <input type="text" name="cargo" value="<?php echo htmlspecialchars($registro['pessoa_cargo']); ?>" required> <br><br>

                    <label>Salário</label> <br>
                    <input type="number" name="salario" value="<?php echo htmlspecialchars($registro['pessoa_salario']); ?>" required> <br><br>

                    <label>Sexo</label> <br>
                    <input type="text" name="sexo" value="<?php echo htmlspecialchars($registro['pessoa_sexo']); ?>" required> <br><br>

                    <label>Idade</label> <br>
                    <input type="number" name="idade" value="<?php echo htmlspecialchars($registro['pessoa_idade']); ?>" required> <br><br>

                    <input type="submit" value="Atualizar">
                </form>
            <?php endif; ?>

        </div>
        <button onclick="window.location.href='consultar.php'">Voltar</button>
    </section>

</body>

</html>