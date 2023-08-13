<?php
require_once "../../conexao.php";

if (isset($_POST['cadastrar'])) {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];

    // Validando idade negativa
    if ($idade < 0) {
        echo "<script>alert('A idade não pode ser negativa.'); window.location.replace('./cadaluno.php');</script>";
    } else {
        // Validando status
        $validandoStatus = array("AP", "RP", "TR");
        if (!in_array($estatus, $validandoStatus)) {
            echo "<script>alert('Estatus inválido. Escolha entre AP, RP ou TR.'); window.location.replace('./cadaluno.php');</script>";
        } else {
            $sql = "INSERT INTO aluno (nome, idade, datanascimento, endereco, estatus)
                    VALUES (:nome, :idade, :datanascimento, :endereco, :estatus)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":idade", $idade);
            $stmt->bindParam(":datanascimento", $datanascimento);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":estatus", $estatus);

            if ($stmt->execute()) {
                echo "<script>alert('Registro inserido com sucesso.'); window.location.replace('./listaaluno.php');</script>"; 
            } else {
                echo "<script>alert('Erro ao inserir o registro.'); window.location.replace('./cadaluno.php');</script>";
            }
        }
    }
}

if (isset($_POST['alterar'])) {
    $id = $_POST["id"]; 
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];

    // Validando idade negativa
    if ($idade < 0) {
        echo "<script>alert('A idade não pode ser negativa.'); window.location.replace('./alteraraluno.php?id=$id');</script>";
    } else {
        // Validando status
        $validandoStatus = array("AP", "RP", "TR");
        if (!in_array($estatus, $validandoStatus)) {
            echo "<script>alert('Estatus inválido. Escolha entre AP, RP ou TR.'); window.location.replace('./alteraraluno.php?id=$id');</script>";
        } else {
            $sql = "UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :estatus WHERE id = :id";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":idade", $idade);
            $stmt->bindParam(":datanascimento", $datanascimento);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":estatus", $estatus);
            $stmt->bindParam(":id", $id);

            if ($stmt->execute()) {
                echo "<script>alert('Registro atualizado com sucesso.'); window.location.replace('./listaaluno.php');</script>";
            } else {
                echo "<script>alert('Erro ao atualizar o registro.'); window.location.replace('./alteraraluno.php?id=$id');</script>";
            }
        }
    }
}



if (isset($_GET["id"]) && isset($_GET["confirm"]) && $_GET["confirm"] == "true") {
    $id = $_GET["id"];

    // Verificar se o aluno existe no banco de dados antes de prosseguir
    $sql_check = "SELECT id FROM aluno WHERE id = :id";
    $stmt_check = $conexao->prepare($sql_check);
    $stmt_check->bindParam(":id", $id);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        $sql = "DELETE FROM aluno WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Aluno excluído com sucesso.'); window.location.href = './listaaluno.php';</script>";
        } else {
            echo "<script>alert('Erro ao excluir o aluno.'); window.location.href = './listaaluno.php';</script>";
        }
    } else {
        echo "<script>alert('Aluno não encontrado.'); window.location.href = './listaaluno.php';</script>";
    }
}
?>
