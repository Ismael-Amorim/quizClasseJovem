<?php
include_once("protectmn.php");

include_once("conexao-loginmn.php");

if(!isset($_SESSION)){
    session_start();
}

$query_status = "SELECT * FROM status_quiz";
$status = $mysqli->query($query_status);


while($verificar_status = $status->fetch_array()){

    if($verificar_status['status']!= "ativo"){ ?>
    <style>
    .responder-quiz{
        display: none;
    }
    </style>

    <?php ;}else{ ?>

    <style>
    .responder-quiz{
        display: block;
    }
    </style>

    <?php ;}

};



if($_SESSION['nome'] != "Ismael Amorim") { ?>

<style>
    .master{
        display: none;
    }
</style>

<?php }else{ ?>

    <style>
    .master{
        display: block;
    }
    .responder-quiz{
        display: block !important;
    }
    </style>

<?php ;}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>
    <div class="quiz">
    <div class="boas-vindas">
    <span>Classe Jovem IASD Mundo Novo</span><br><br>
    <span>Olá, seja bem vindo(a) <?php echo $_SESSION['nome']; ?>!</span><br>
    <span>Esperamos que tenha estudado a lição!</span><br>
    <span>O que você deseja fazer?</span><br>
    </div>

    <div class="options">
        <a class="master" href="alterar_status.php"><button type="button" class="btn bd primary">Alterar Status</button><br><br></a>
        <a class="master" href="cadastro_questoes.php"><button type="button" class="btn bd primary">Cadastrar quiz</button><br><br></a>
        <a class="master" href="editar_quiz.php"><button type="button" class="btn bd primary">Editar quiz</button><br><br></a>
        <a class="responder-quiz" href="quiz.php"><button type="button" class="btn bd primary">Responder quiz</button><br><br></a>
        <a href="ranking.php"><button type="button" class="btn bd primary">Ranking</button><br><br></a>
        <a href="chat.php"><button type="button" class="btn bd primary">Chat</button><br><br></a>
        <a href="logout.php"><button type="button" class="btn bd primary">Sair</button><br></a>

    </div>

    <div class="footer navbar-fixed-bottom">
        <span>Desenvolvido por Amorim Systems</span>
    </div>
    </div>

    <script src="js/custom-home.js"></script>
</body>
</html>