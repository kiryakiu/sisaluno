<?php
require_once "../../conexao.php";
$stmt = $conexao->prepare("SELECT id, nome FROM professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>disciplina</title>
    <link rel="stylesheet" href="../../stilo/cadastro.css">
</head>

<body>

    <div class="titulo">
        <img src="../../imagens/kirya-logo.png" alt="">
        <a href="../../index.html">Início</a>
        <a href="../aluno/cadlauno.php">Cadastrar aluno</a>
        <a href="../professor/cadprofessor.php">Cadastrar professor</a>
    </div>
    <div class="conteudo">
        <h1>Cadastro de disciplina</h1>
        <form action="./cruddisiplina.php" method="POST">
            <div class="input">
                <label for="inome">Nome:</label>
                <input type="text" name="nomedisciplina" id="inome">
            </div>

            <div class="input dividido">
                <label for="isemestre">Semestre:</label>
                <input type="number" name="semestre" id="isemestre">
            </div>

            <div class="input dividido">
                <label for="icarga">Carga horária:</label>
                <input type="number" name="ch" id="icarga">
            </div>

            <div class="input ">
                <label for="iidprofessor">ID Professor:</label>

                <select name="idprofessor">
                    <option value="">Selecione um professor</option>
                    <?php foreach ($professores as $professor) { ?>
                        <option value="<?php echo $professor['id']; ?>"><?php echo $professor['nome']; ?></option>
                    <?php } ?>
                </select>

            </div>

            <div class="input dividido">
                <label for="nota1">Nota1:</label>
                <input type="number" name="nota1" id="nota1">
            </div>

            <div class="input dividido">
                <label for="nota2">Nota2:</label>
                <input type="number" name="nota2" id="nota2">
            </div>

            <div class="input">
                <input type="submit" class="butoes" id="cadastro" value="Cadastrar" name="cadastrar">
            </div>
        </form>

    </div>


</body>

</html>