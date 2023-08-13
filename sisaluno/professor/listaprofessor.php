<?php

require_once "../../conexao.php";

$sql = "SELECT * FROM professor";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$professors = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            <th>CPF</th>
            <th>Excluir</th>
            <th>Alterar</th>
        </tr>
        <?php foreach ($professors as $professor) { ?>
        <tr id="corpo">
            <th id="espaco"><?php echo $professor['id']; ?></th>
            <td><?php echo $professor['idade']; ?></td>
            <td><?php echo $professor['endereco']; ?></</td>
            <td><?php echo $professor['estatus']; ?></td>
            <td><?php echo $professor['datanascimento']; ?></td>
            <td><?php echo $professor['nome']; ?></td>
            <td><?php echo $professor['cpf']; ?></td>
            <td><a href="./crudprofessor.php?id=<?php echo $professor['id']; ?>">Excluir</a></td>
            <td><a href="./alterprofessor.php?id=<?php echo $professor['id']; ?>">Alterar</a></td>
        </tr>
        <?php } ?>

    </table>
</body>

</html>