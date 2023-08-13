<?php
require_once "../../conexao.php";

if (isset($_POST['cadastrar'])) {
    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];
    $Nota1 = $_POST["nota1"];
    $Nota2 = $_POST["nota2"];

    // Calcular a média
    $Media = ($Nota1 + $Nota2) / 2;

    // Inserir os dados no banco usando PDO
    $sql = "INSERT INTO disciplina (nomedisciplina, ch, semestre, idprofessor, Nota1, Nota2, Media)
            VALUES (:nomedisciplina, :ch, :semestre, :idprofessor, :Nota1, :Nota2, :Media)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nomedisciplina', $nomedisciplina);
    $stmt->bindParam(':ch', $ch);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':idprofessor', $idprofessor);
    $stmt->bindParam(':Nota1', $Nota1);
    $stmt->bindParam(':Nota2', $Nota2);
    $stmt->bindParam(':Media', $Media);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.replace('./listadisciplina.php');</script>";
    } else {
        echo "<script>alert('Erro ao alterar:'); window.location.replace('./caddisciplina.php');</script>";
    }
}

if (isset($_POST['alterar'])) {
    $id = $_POST["id"]; 
    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];
    $Nota1 = $_POST["nota1"];
    $Nota2 = $_POST["nota2"];

    // Calcular a média
    $Media = ($Nota1 + $Nota2) / 2;

    // Atualizar os dados no banco usando PDO
    $sql = "UPDATE disciplina SET nomedisciplina=:nomedisciplina, ch=:ch, semestre=:semestre, 
            idprofessor=:idprofessor, Nota1=:Nota1, Nota2=:Nota2, Media=:Media WHERE id=:id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nomedisciplina', $nomedisciplina);
    $stmt->bindParam(':ch', $ch);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':idprofessor', $idprofessor);
    $stmt->bindParam(':Nota1', $Nota1);
    $stmt->bindParam(':Nota2', $Nota2);
    $stmt->bindParam(':Media', $Media);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Alteração realizada com sucesso!'); window.location.replace('./listadisciplina.php');</script>";
    } else {
        echo "<script>alert('Erro ao alterar:'); window.location.replace('./alterardisciplina.php');</script>";
    }
}


if (isset($_GET["id"]) && isset($_GET["confirm"]) && $_GET["confirm"] == "true") {
    $id = $_GET["id"];

    // Verificar se o disciplina existe no banco de dados antes de prosseguir
    $sql_check = "SELECT id FROM disciplina WHERE id = :id";
    $stmt_check = $conexao->prepare($sql_check);
    $stmt_check->bindParam(":id", $id);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        $sql = "DELETE FROM disciplina WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            echo "<script>alert('disciplina excluído com sucesso.'); window.location.href = './listadisciplina.php';</script>";
        } else {
            echo "<script>alert('Erro ao excluir o disciplina.'); window.location.href = './listadisciplina.php';</script>";
        }
    } else {
        echo "<script>alert('disciplina não encontrado.'); window.location.href = './listadisciplina.php';</script>";
    }
}
?>
