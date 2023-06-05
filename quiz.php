<?php
include_once("protectmn.php");

include_once("conexao-loginmn.php");

if(!isset($_SESSION)){
    session_start();
}


$query_select_questoes = "SELECT * FROM quiz ORDER BY id ASC";
$query_questoes = $mysqli->query($query_select_questoes);

$query_select_respostas = "SELECT * FROM quiz WHERE id = 1";
$query_respostas = $mysqli->query($query_select_respostas);

$query_select_respostas2 = "SELECT * FROM quiz WHERE id = 2";
$query_respostas2 = $mysqli->query($query_select_respostas2);

$query_select_respostas3 = "SELECT * FROM quiz WHERE id = 3";
$query_respostas3 = $mysqli->query($query_select_respostas3);

$query_select_respostas4 = "SELECT * FROM quiz WHERE id = 4";
$query_respostas4 = $mysqli->query($query_select_respostas4);

$query_select_respostas5 = "SELECT * FROM quiz WHERE id = 5";
$query_respostas5 = $mysqli->query($query_select_respostas5);

$query_select_respostas6 = "SELECT * FROM quiz WHERE id = 6";
$query_respostas6 = $mysqli->query($query_select_respostas6);

$query_select_respostas7 = "SELECT * FROM quiz WHERE id = 7";
$query_respostas7 = $mysqli->query($query_select_respostas7);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/quiz.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Quiz</title>
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
                    <button style="color: #000;" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
    <span>Esperamos que tenha estudado a lição!</span>
    </div>

    <br>
    <div class="questoes">

        <?php while($questoes = $query_questoes->fetch_array()){ ?>
            <label for=""><?php echo $questoes['questao'];?></label><br>
            <span>A) <input type="radio" name="questao01" id="questao01-a"> <?php echo $questoes['alternativa_a']; ?></span><br>
            <span>B) <input type="radio" name="questao01" id="questao01-a"> <?php echo $questoes['alternativa_b']; ?></span><br>
            <span>C) <input type="radio" name="questao01" id="questao01-a"> <?php echo $questoes['alternativa_c']; ?></span><br>
            <span>D) <input type="radio" name="questao01" id="questao01-a"> <?php echo $questoes['alternativa_d']; ?></span><br><br>


            <?php } ?>

            <span>Respostas:</span>
            <div class="resposta">
                <?php while($respostas = $query_respostas->fetch_array()){ ?>

                    <span><?php echo "01-" . $respostas['resposta']; ?></span><br>

                <?php } ?>

                <?php while($respostas2 = $query_respostas2->fetch_array()){ ?>

                    <span><?php echo "02-" . $respostas2['resposta']; ?></span><br>

                <?php } ?>

                <?php while($respostas3 = $query_respostas3->fetch_array()){ ?>

                    <span><?php echo "03-" . $respostas3['resposta']; ?></span><br>

                <?php } ?>

                
                <?php while($respostas4 = $query_respostas4->fetch_array()){ ?>

                    <span><?php echo "04-" . $respostas4['resposta']; ?></span><br>

                <?php } ?>

                
                <?php while($respostas5 = $query_respostas5->fetch_array()){ ?>

                    <span><?php echo "05-" . $respostas5['resposta']; ?></span><br>

                <?php } ?>

                
                <?php while($respostas6 = $query_respostas6->fetch_array()){ ?>

                    <span><?php echo "06-" . $respostas6['resposta']; ?></span><br>

                <?php } ?>

                
                <?php while($respostas7 = $query_respostas7->fetch_array()){ ?>

                    <span><?php echo "07-" . $respostas7['resposta']; ?></span><br>

                <?php } ?>

                

                </div>
            <br>





        <!--
        <label for="">1- Um dos versos bíblicos do texto-chave dessa semana é "Lembra-te do dia de sábado para o santificar"</label><br>
        <span>A) <input type="radio" name="questao01" id="questao01-a"> Verdadeiro.</span><br>
        <span>B) <input type="radio" name="questao01" id="questao01-b"> Falso.</span><br>

            <label for="">Resposta correta: <br>
            <span id="resposta">A) Verdadeiro.</span><br>

        <hr>

        <label for="">2- De acordo com a lição, a nossa herança é:</label><br>
        <span>A) <input type="radio" name="questao02" id="questao02-a"> Única.</span><br>
        <span>B) <input type="radio" name="questao02" id="questao02-b"> Especial.</span><br>
        <span>C) <input type="radio" name="questao02" id="questao02-c"> Compartilhada.</span><br>
        <span>D) <input type="radio" name="questao02" id="questao02-d"> Eterna.</span><br>

            <label for="">Resposta correta: <br>
            <span id="resposta2">C) Compartilhada.</span><br>

        <hr>

        <label for="">3- De acordo com a lição, o que a observância do sábado revela?</label><br>
        <span>A)<input type="radio" name="questao03" id="questao03-a"> Que Jesus é digno de ser adorado como nosso criador.</span><br>
        <span>B)<input type="radio" name="questao03" id="questao03-b"> Que Jesus é digno de ser adorado como nosso salvador.</span><br>
        <span>C)<input type="radio" name="questao03" id="questao03-c"> Que Deus criou o sábado pensando no nosso descanso, e usar esse dia para fazer o bem ao próximo.</span><br>
        <span>D)<input type="radio" name="questao03" id="questao03-d"> Que Deus criou o sábado pensando na nossa comunhão, usando esse dia para fazer o bem ao próximo.</span><br>

            <label for="">Resposta correta: <br>
            <span id="resposta3">A) Que Jesus é digno de ser adorado como nosso criador.</span><br>

        <hr>

        <label for="">4- De acordo com a lição, a palavra hebraica traduzida como "dia" em Gênesis 1 é:</label><br>
        <span>A)<input type="radio" name="questao04" id="questao04-a"> Yom, com período de 12 horas.</span><br>
        <span>B)<input type="radio" name="questao04" id="questao04-b"> Yom, com período de 24 horas.</span><br>
        <span>C)<input type="radio" name="questao04" id="questao04-c"> Yad, com período de 12 horas.</span><br>
        <span>D)<input type="radio" name="questao04" id="questao04-d"> Yad, com período de 24 horas.</span><br>

            <label for="">Resposta correta: <br>
            <span id="resposta4">B) Yom, com período de 24 horas.</span><br>

        <hr>

        <label for="">5- A palavra da rede semântica dessa semana é:</label><br>
        <span>A)<input type="radio" name="questao05" id="questao05-a"> Criação.</span><br>
        <span>B)<input type="radio" name="questao05" id="questao05-b"> Descanso.</span><br>
        <span>C)<input type="radio" name="questao05" id="questao05-c"> Adoração.</span><br>
        <span>D)<input type="radio" name="questao05" id="questao05-d"> Sábado.</span><br>

            <label for="">Resposta correta: <br>
            <span id="resposta5">D) Sábado.</span><br>

        <hr>

        <label for="">6- De acordo com a lição, a mensagem de três anjos voando pelo meio do céu e ordenando adorar ao criador é a resposta de Deus:</label><br>
        <span>A)<input type="radio" name="questao06" id="questao06-a"> Ao desespero da humanidade do século 21.</span><br>
        <span>B)<input type="radio" name="questao06" id="questao06-b"> Ao sinal da volta de Cristo.</span><br>
        <span>C)<input type="radio" name="questao06" id="questao06-c"> Ao cumprimento das últimas profecias.</span><br>
        <span>D)<input type="radio" name="questao06" id="questao06-d"> Aos jovens da IASD Mundo Novo.</span><br>

            <label for="">Resposta correta: <br>
            <span id="resposta6">A) Ao desespero da humanidade do século 21.</span><br>

        <hr>

        <label for="">7- De acordo com a lição, qual é o grande memorial da obra criadora de Deus?</label><br>
        <span>A)<input type="radio" name="questao07" id="questao07-a"> Os mandamentos.</span><br>
        <span>B)<input type="radio" name="questao07" id="questao07-b"> A quantidade de dias da criação.</span><br>
        <span>C)<input type="radio" name="questao07" id="questao07-c"> O sábado.</span><br>
        <span>D)<input type="radio" name="questao07" id="questao07-d"> O homem conforme a sua imagem e semelhança.</span><br>

            <label for="">Resposta correta: <br>
            <span id="resposta7">C) O sábado.</span><br>

        <hr>
-->
    </div>
            <div class="salvar">
                <button id="exibir-resposta" class="btn bd primary">Salvar</button><br><br>
                <a href="home.php"><button id="exibir-resposta" class="btn bd primary">Voltar</button></a>
            </div>

    <div class="footer navbar-fixed-bottom">
        <span>Desenvolvido por Amorim Systems</span>
    </div>
    </div>

    <script src="js/custom-home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>