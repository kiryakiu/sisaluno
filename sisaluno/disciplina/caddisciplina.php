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
        <a href="../aluno/cadlauno.html">Cadastrar aluno</a>
        <a href="../professor/cadprofessor.html">Cadastrar professor</a>
    </div>
    <div class="conteudo"> 
        <h1>Cadastro de disciplina</h1>
        <form action="" method="">
            <div class="input">
                <label for="inome">Nome:</label>
                <input type="text" name="nome" id="inome">
            </div>

            <div class="input dividido">
                <label for="isemestre">Semestre:</label>
                <input type="text" name="semestre" id="isemestre">
            </div>

            <div class="input dividido">
                <label for="iidprofessor">ID Professor:</label>
                <input type="text" name="idprofessor" id="iidprofessor">
            </div>

            <div class="input">
                <label for="icarga">Carga horária:</label>
                <input type="number" min="1" name="idade" id="icarga">
            </div>



            <div class="input">
                <input type="submit" class="butoes" id="cadastro" value="Cadastrar">
            </div>
        </form>

    </div>

    
</body>
</html>