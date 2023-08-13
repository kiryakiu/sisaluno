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
        <a href="../aluno/cadlauno.php">Cadastrar aluno</a>
        <a href="../disciplina/caddisciplina.php">Cadastrar disciplina</a>
    </div>
    <div class="conteudo"> 
        <h1>Cadastro de professor</h1>
        <form action="./crudprofessor.php" method="POST">
            <div class="input">
                <label for="inome">Nome completo:</label>
                <input type="text" name="nome" id="inome">
            </div>
            
            <div class="input dividido">
                <label for="iestatus">Status:</label>
                <select name="estatus" id="iestatus">
                    <option value="ativo">Ativo</option>
                    <option value="desativo">Desativo</option>
                </select>
            </div>

            <div class="input dividido">
                <label for="idatanascimento">Data de nascimento:</label>
                <input type="date" name="datanascimento" id="idatanascimento">
            </div>

            <div class="input dividido">
                <label for="iidade">Idade:</label>
                <input type="number" name="idade" id="iidade">
            </div>
            
            <div class="input dividido">
                <label for="icpf">CPF:</label>
                <input type="number" name="cpf" id="icpf">
            </div>

            <div class="input">
                <label for="iendereco">Endereço:</label>
                <input type="text" name="endereco" id="iendereco">
            </div>
            
            <div class="input">
                <input type="submit" id="cadastro" value="Cadastrar" name="cadastrar">
            </div>
        </form>

    </div>

    
</body>
</html>