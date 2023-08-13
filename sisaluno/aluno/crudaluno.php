<?php
require_once "../../conexao.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM aluno WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Aluno excluído sistema!'); window.location.href = './listaaluno.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir o aluno.'); window.location.href = './listaaluno.php';</script>";
    }
}

if (isset($_POST['cadastrar'])) {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];

    // Validando idade negativa
    if ($idade < 0) {
        echo "<script>alert('Não existe idade negativa!'); window.location.replace('./cadlauno.php');</script>";
    } else {
        // Validando status
        $validandoStatus = array("AP", "RP");
        if (!in_array($estatus, $validandoStatus)) {
            echo "<script>alert('Status inválido. Escolha entre Aprovado ou Reprovado!'); window.location.replace('./cadlauno.php');</script>";
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
                echo "<script>alert('Aluno inserido no sistema!'); window.location.replace('./listaaluno.php');</script>"; 
            } else {
                echo "<script>alert('Erro ao inserir o registro.'); window.location.replace('./cadlauno.php');</script>";
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
        echo "<script>alert(Não existe idade negativa!'); window.location.replace('./alteraluno.php?id=$id');</script>";
    } else {
        // Validando status
        $validandoStatus = array("AP", "RP");
        if (!in_array($estatus, $validandoStatus)) {
            echo "<script>alert('Status inválido. Escolha entre Aprovado ou Reprovado!'); window.location.replace('./alteraluno.php?id=$id');</script>";
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
                echo "<script>alert('Aluno atualizado no sistema!'); window.location.replace('./listaaluno.php');</script>";
            } else {
                echo "<script>alert('Erro ao atualizar o registro.'); window.location.replace('./alteraluno.php?id=$id');</script>";
            }
        }
    }
}



