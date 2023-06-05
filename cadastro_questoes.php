<?php
include_once("protectmn.php");

include_once("conexaomn.php");

if(!isset($_SESSION)){
    session_start();
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/cadastro-quiz.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cadastro Quiz</title>
</head>
<body>

    <div class="options">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Jovens IASD Mundo Novo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="master dropdown-item" href="alterar_status.php">Alterar Status</a></li>
                        <li><a class="master dropdown-item" href="cadastro_questoes.php">Cadastrar quiz</a></li>
                        <li><a class="master dropdown-item" href="editar_quiz.php">Editar quiz</a></li>
                        <li><a class="responder-quiz dropdown-item" href="quiz.php">Responder quiz</a></li>
                        <li><a class="dropdown-item" href="ranking.php">Ranking</a></li>
                        <li><a class="dropdown-item" href="chat.php">Chat</a></li>
                        <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>


    <div class="quiz">
    <div class="boas-vindas">
    <span>Classe Jovem IASD Mundo Novo</span><br><br>
    <span>Olá, seja bem vindo(a) <?php echo $_SESSION['nome']; ?>!</span><br>
    <span>Bora cadastrar as questões!</span><br>
    </div>

    <div class="options">
        <form action="cad_quiz.php" method="POST">
            <label for="">Questão:</label><br>
            <input class="form-control" type="text" name="questao" id="questao">
            <label for="">Alternativa A:</label><br>
            <input class="form-control" type="text" name="alternativa_a" id="alternativa_a">
            <label for="">Alternativa B:</label><br>
            <input class="form-control" type="text" name="alternativa_b" id="alternativa_b">
            <label for="">Alternativa C:</label><br>
            <input class="form-control" type="text" name="alternativa_c" id="alternativa_c">
            <label for="">Alternativa D:</label><br>
            <input class="form-control" type="text" name="alternativa_d" id="alternativa_d">
            <label for="">Resposta:</label><br>
            <input class="form-control" type="text" name="resposta" id="resposta"><br>
            <hr><br>

            <input type="submit" class="btn bd primar" value="Cadastrar" name="cadQuestao">
        </form>
        
    </div><br> <br>
    <a href="home.php"><button class="btn bd primary">Voltar</button></a>

    <div class="footer navbar-fixed-bottom">
        <span>Desenvolvido por Amorim Systems</span>
    </div>
    </div>

    <script src="js/custom-home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>