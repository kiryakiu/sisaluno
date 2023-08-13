<?php
require_once "../../conexao.php";

$stmt = $conexao->prepare("SELECT * FROM disciplina");
$stmt->execute();
$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getProfessorName($conexao, $idprofessor){
    $stmt = $conexao->prepare("SELECT nome FROM professor WHERE id = :id");
    $stmt->bindParam(':id', $idprofessor);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nome'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../stilo/lista.css">
</head>
<body>
    <div class="navigation">
        <img src="../../imagens/kirya-logo.png" alt="">
        <a href="../../index.html" id="voltar">Voltar</a>
    </div>
    <table>
        <tr id="titulo">
            <th>ID</th>
            <th>Nome</th>
            <th>Semestre</th>
            <th>Carga horária</th>
            <th>ID Professor</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Media</th>
            <th>Excluir</th>
            <th>Alterar</th>
        </tr>  
        <?php
        foreach ($disciplinas as $disciplina) { ?>
        <tr id="corpo">
            <th id="espaco"><?php echo $disciplina['id']; ?></th>
            <td><?php echo $disciplina['nomedisciplina']; ?></td>
            <td><?php echo $disciplina['semestre']; ?></td>
            <td><?php echo $disciplina['ch']; ?></td>
            <td><?php echo getProfessorName($conexao, $disciplina['idprofessor']); ?></td>
            <td><?php echo $disciplina['Nota1']; ?></td>
            <td><?php echo $disciplina['Nota2']; ?></td>
            <td><?php echo $disciplina['Media']; ?></td>
            <td><a href="./cruddisiplina.php?id=<?php echo $disciplina['id']; ?>">Excluir</a></td>
                <td><a class="alterar" href="./alterdisciplina.php?id=<?php echo $disciplina['id']; ?>">Alterar</a></td>
        </tr>
        <?php } ?>


    </table>
</body>
</html>