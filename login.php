<?php

include("conexao-loginmn.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/stylemn.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Classe Jovem</title>
</head>
<body>
    <div class="login">
        <div class="rounded mx-auto d-block">
            <img style="width: 12rem;" src="logo.jpg" alt="Amorim Systems">
        </div>
        <form id="login-usuario" method="POST" action="">

            <?php
                if(isset($_POST['usuario']) || isset($_POST['senha'])){

                    if(strlen($_POST['usuario']) == 0){
                        echo "<div style='text-align: center' class='msgAlertErroLogin' role='alert'>Necessário preencher o campo usuario! </div>";
                    }else if(strlen($_POST['senha']) == 0){
                        echo "<div style='text-align: center' class='msgAlertErroLogin' role='alert'>Necessário preencher o campo senha!</div>";
                    }else{
                        $usuario = $mysqli->real_escape_string($_POST['usuario']);
                        $senha = $mysqli->real_escape_string($_POST['senha']);
                        
                    
                        $sql_code = "SELECT * FROM cadastro WHERE usuario = '$usuario' AND senha = '$senha'";
                        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
                    
                    
                        $quantidade = $sql_query->num_rows;
                    
                        if($quantidade == 1){
                            $usuario = $sql_query->fetch_assoc();
                    
                    
                    
                            if(!isset($_SESSION)){
                                session_start();
                            }
                    
                            $_SESSION['id'] = $usuario['id'];
                            $_SESSION['nome'] = $usuario['nome'];
                            $_SESSION['nivel'] = $usuario['nivel'];

                            header("Location: home.php");
                        }else{
                            echo "<div style='text-align: center' class='msgAlertErroLogin' role='alert'>Erro: usuario ou senha incorretos!</div>";
                        }
                    }
                }
            ?>
            <div class="opcoes">
                <label for="usuario">Usuário:</label><br>
                <input id="usuario" name="usuario" type="text" maxlength="11"><br>
                <label for="senha">Senha:</label><br>
                <input id="senha" name="senha" type="password">
            </div>
            <input class="btn bd primary" type="submit" value="Entrar">
        </form>
    </div>
    <div class="footer navbar-fixed-bottom">
        <span>Desenvolvido por Amorim Systems</span>
    </div>
</body>
</html>