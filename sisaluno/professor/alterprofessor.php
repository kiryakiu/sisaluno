<?php

if (!isset($_GET["id"])) {

    header("Location: listaprofessor.php");
    exit();
}

require_once "../../conexao.php";

$id = $_GET["id"];


$stmt = $conexao->prepare("SELECT * FROM professor WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$professor = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>professor</title>
    <link rel="stylesheet" href="../../stilo/cadastro.css">
</head>
<body>

    <div class="titulo">
        <img src="../../imagens/kirya-logo.png" alt="">
        <a href="../../index.html">Início</a>
        <a href="../aluno/cadlauno.html">Cadastrar aluno</a>
        <a href="../disciplina/caddisciplina.html">Cadastrar disciplina</a>
    </div>
    <div class="conteudo"> 
        <h1>Editando professor</h1>
        <form action="./crudprofessor.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
            <div class="input">
                <label for="inome">Nome completo:</label>
                <input type="text" name="nome" id="inome" value="<?php echo $professor['nome']; ?>">
            </div>
            
            <div class="input dividido">
                <label for="iestatus">Status:</label>
                <select name="estatus" id="iestatus">
                    <option value="<?php echo $professor['estatus']; ?>"><?php echo $professor['estatus']; ?></option>
                    <option value="ativo">ativo</option>
                    <option value="desativo">desativo</option>
                </select>
            </div>

            <div class="input dividido">
                <label for="idatanascimento">Data de nascimento:</label>
                <input type="date" name="datanascimento" id="idatanascimento" value="<?php echo $professor['datanascimento']; ?>">
            </div>

            <div class="input dividido">
                <label for="iidade">Idade:</label>
                <input type="number" name="idade" id="iidade" value="<?php echo $professor['idade']; ?>">
            </div>
            
            <div class="input dividido">
                <label for="icpf">CPF:</label>
                <input type="number" name="cpf" id="icpf" value="<?php echo $professor['cpf']; ?>">
            </div> 

            <div class="input">
                <label for="iendereco">Endereço:</label>
                <input type="text" name="endereco" id="iendereco" value="<?php echo $professor['endereco']; ?>">
            </div>
            
            <div class="input">
                <input type="submit" id="cadastro" value="alterar" name="alterar">
            </div>
        </form>

    </div>

    
</body>
</html>