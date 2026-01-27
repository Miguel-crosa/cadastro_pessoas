<?php

$conn = mysqli_connect("localhost", "root", "", "cadastro_pessoa", port: 3308);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql_check = "SELECT * FROM cadastro WHERE id_pessoa = $id";
    $resultado = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($resultado) > 0) {

        $sql_delete = "DELETE FROM cadastro WHERE id_pessoa = $id";

        if (mysqli_query($conn, $sql_delete)) {
            echo "<script>alert('Registro deletado com sucesso!'); window.location.href='consultar.php';</script>";
        } else {
            echo "<script>alert('Erro ao deletar: " . mysqli_error($conn) . "'); window.location.href='consultar.php';</script>";
        }
    } else {
        echo "<script>alert('Registro não encontrado!'); window.location.href='consultar.php';</script>";
    }
} else {
    echo "<script>alert('ID inválido!'); window.location.href='consultar.php';</script>";
}

mysqli_close($conn);
