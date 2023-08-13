<?php

require_once "../../conexao.php";

$sql = "SELECT * FROM aluno";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <th>Idade</th>
            <th>Endereço</th>
            <th>Status</th>
            <th>Data nascimento</th>
            <th>Nome</th>
            <th>Excluir</th>
            <th>Alterar</th>
        </tr>
        <?php foreach ($alunos as $aluno) { ?>
            <tr id="corpo">
                <th id="espaco"><?php echo $aluno['id']; ?></th>
                <td><?php echo $aluno['idade']; ?></td>
                <td><?php echo $aluno['endereco']; ?></td>
                <td><?php echo $aluno['estatus']; ?></td>
                <td><?php echo $aluno['datanascimento']; ?></td>
                <td><?php echo $aluno['nome']; ?></td>
                <td><a href="./crudaluno.php?id=<?php echo $aluno['id']; ?>">Excluir</a></td>
                <td><a class="alterar" href="./alteraluno.php?id=<?php echo $aluno['id']; ?>">Alterar</a></td>
            </tr>
        <?php } ?>

    </table>
</body>

</html>