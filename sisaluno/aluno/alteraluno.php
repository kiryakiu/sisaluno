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
        <a href="../professor/cadprofessor.html">Cadastrar professor</a>
        <a href="../disciplina/caddisciplina.html">Cadastrar disciplina</a>
    </div>
    <div class="conteudo"> 
        <h1>Cadastro de aluno</h1>
        <form action="" method="">
            <div class="input">
                <label for="inome">Nome completo:</label>
                <input type="text" name="Nome" id="inome">
            </div>
            
            <div class="input dividido">
                <label for="iestatus">Status:</label>
                <select name="estatus" id="iestatus">
                    <option value="AP">Aprovado</option>
                    <option value="RP">Reprovado</option>
                </select>
            </div>

            <div class="input dividido">
                <label for="iidade">Idade:</label>
                <input type="number" name="idade" id="iidade" min="18" max="150">
            </div>
            

            <div class="input">
                <label for="idatanascimento">Data de nascimento:</label>
                <input type="date" name="datanascimento" id="idatanascimento">
            </div>

            <div class="input">
                <label for="iendereco">Endereço:</label>
                <input type="text" name="endereco" id="iendereco">
            </div>
            
            <div class="input">
                <input type="submit" id="cadastro" value="Cadastrar">
            </div>
        </form>

    </div>

    
</body>
</html>