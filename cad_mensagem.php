<?php
if(!isset($_SESSION)){
    session_start();
}

include_once("protectmn.php");


$nome = $_SESSION['nome'];

include_once("conexaomn.php");


$dados_mensagem = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($dados_mensagem);

if(!empty($dados_mensagem['cadMsg'])){

$query_cadastro_mensagem = "INSERT INTO chat (nome_usuario, mensagem, envio)
                                    VALUES ('$nome', :mensagem, NOW())";
$cadastro_mensagem = $conn->prepare($query_cadastro_mensagem);
$cadastro_mensagem->bindParam(':mensagem', $dados_mensagem['mensagem'], PDO::PARAM_STR);
$cadastro_mensagem->execute();

header("Location: chat.php");
}else{
    echo "erro";
}