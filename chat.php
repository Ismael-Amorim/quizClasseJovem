<?php
include_once("protectmn.php");

include_once("conexao-loginmn.php");

if(!isset($_SESSION)){
    session_start();
}

$query_mensagem = "SELECT * FROM chat ORDER BY envio ASC";
$mensagem = $mysqli->query($query_mensagem);

$query_status = "SELECT * FROM status_quiz";
$status = $mysqli->query($query_status);

$status_quiz = $status->fetch_array();

if($status_quiz['status'] != "ativo"){ ?>

    <style>
        .responder-quiz{
            display: none !important;
        }
    </style>
    
    <?php }else{?>
    
        <style>
        .responder-quiz{
            display: block;
        }
    </style>
    <?php }?>



<?php if($_SESSION['nivel'] != "Master"){ ?>

<style>
    .master{
        display: none !important;
    }
</style>

<?php }else{?>

    <style>
    .master{
        display: block;
    }
</style>
<?php }?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/chat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Chat</title>
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
    <span>Olá, seja bem vindo(a) ao chat, <?php echo $_SESSION['nome']; ?>!</span><br>
    <span>Bora conversar!?</span><br><br>
    </div>

        <span>Últimas mensagens:</span><br><br>
        <span class="alert alert-danger" id="erro"></span>
            <div class="chat" id="chat">
                <?php while($msg = $mensagem->fetch_array()) {?>
                <span id="hora-envio"><?php echo date('d/m/Y H:i:s', strtotime($msg['envio'])); ?></span><br>
                <span id="nome"><?php echo $msg['nome_usuario'] . ":" ?><br> <?php echo $msg['mensagem']; ?></span><hr>
                <?php } ?>
                    <form id="enviar_mensagem" method="POST" action="cad_mensagem">
                        <div class="input-group mb-3">
                            <input required type="text" class="form-control" placeholder="Mensagem..." name="mensagem" id="mensagem">
                            <button type="submit" value="Enviar" id="cadMsg" name="cadMsg" onclick="reload()">Enviar</button>
                        </div>
                    </form>
            </div>


    <br>
    <div class="footer navbar-fixed-bottom">
        <span>Desenvolvido por Amorim Systems</span>
    </div>

    <script src="js/custom-chat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>