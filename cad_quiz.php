<?php 
include_once("protectmn.php");

include_once("conexaomn.php");

$dados_questoes = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados_questoes);
if(!empty($dados_questoes['cadQuestao'])){
$query_cadastro_questoes = "INSERT INTO quiz (questao, resposta, alternativa_a, alternativa_b, alternativa_c, alternativa_d)
                                    VALUES (:questao, :resposta, :alternativa_a, :alternativa_b, :alternativa_c, :alternativa_d)";
$cadastro_questoes = $conn->prepare($query_cadastro_questoes);
$cadastro_questoes->bindParam(':questao', $dados_questoes['questao'], PDO::PARAM_STR);
$cadastro_questoes->bindParam(':resposta', $dados_questoes['resposta'], PDO::PARAM_STR);
$cadastro_questoes->bindParam(':alternativa_a', $dados_questoes['alternativa_a'], PDO::PARAM_STR);
$cadastro_questoes->bindParam(':alternativa_b', $dados_questoes['alternativa_b'], PDO::PARAM_STR);
$cadastro_questoes->bindParam(':alternativa_c', $dados_questoes['alternativa_c'], PDO::PARAM_STR);
$cadastro_questoes->bindParam(':alternativa_d', $dados_questoes['alternativa_d'], PDO::PARAM_STR);
$cadastro_questoes->execute();

header("Location: cadastro_questoes.php");
}else{
    echo "erro";
}