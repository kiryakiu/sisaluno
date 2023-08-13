<?php

if (!isset($_GET["id"])) {
    header("Location: listaluno.php");
    exit();
}

$id = $_GET["id"];

require_once "../../conexao.php";

$stmt = $conexao->prepare("SELECT * FROM aluno WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aluno</title>
    <link rel="stylesheet" href="../../stilo/cadastro.css">
</head>
<body>

    <div class="titulo">
        <img src="../../imagens/kirya-logo.png" alt="">
        <a href="../../index.html">Início</a>
        <a href="../professor/cadprofessor.php">Cadastrar professor</a>
        <a href="../disciplina/caddisciplina.php">Cadastrar disciplina</a>
    </div>
    <div class="conteudo"> 
        <h1>Editando aluno</h1>
        <form action="./crudaluno.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
            <div class="input">
                <label for="inome">Nome completo:</label>
                <input type="text" name="nome" id="inome" value="<?php echo $aluno['nome']; ?>">
            </div>
            
            <div class="input dividido">
                <label for="iestatus">Status:</label>
                <select name="estatus" id="iestatus">
                    <option value="<?php echo $aluno['estatus']; ?>"><?php echo $aluno['estatus']; ?></option>
                    <option value="AP">Aprovado</option>
                    <option value="RP">Reprovado</option>
                </select>
            </div>

            <div class="input dividido">
                <label for="iidade">Idade:</label>
                <input type="number" name="idade" id="iidade" value="<?php echo $aluno['idade']; ?>">
            </div>
            

            <div class="input">
                <label for="idatanascimento">Data de nascimento:</label>
                <input type="date" name="datanascimento" id="idatanascimento" value="<?php echo $aluno['datanascimento']; ?>">
            </div>

            <div class="input">
                <label for="iendereco">Endereço:</label>
                <input type="text" name="endereco" id="iendereco" value="<?php echo $aluno['endereco']; ?>">
            </div>
            
            <div class="input">
                <input type="submit" id="cadastro" value="Alterar" name="alterar">
            </div>
        </form>

    </div>

    
</body>
</html>