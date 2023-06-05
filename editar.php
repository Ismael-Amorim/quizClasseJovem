<?php
include_once("protectmn.php");


session_start(); 
//limpar o buffer de saída
ob_start();

include_once "conexaomn.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (empty($dados['id'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
}else {
    $query_questao = "UPDATE quiz SET questao=:questao, resposta=:resposta, alternativa_a=:alternativa_a, alternativa_b=:alternativa_b, alternativa_c=:alternativa_c, alternativa_d=:alternativa_d WHERE id=:id";
    
    $edit_questao = $conn->prepare($query_questao);
    $edit_questao->bindParam(':questao', $dados['questao']);
    $edit_questao->bindParam(':resposta', $dados['resposta']);
    $edit_questao->bindParam(':alternativa_a', $dados['alternativa_a']);
    $edit_questao->bindParam(':alternativa_b', $dados['alternativa_b']);
    $edit_questao->bindParam(':alternativa_c', $dados['alternativa_c']);
    $edit_questao->bindParam(':alternativa_d', $dados['alternativa_d']);
    $edit_questao->bindParam(':id', $dados['id']);

    
    if ($edit_questao->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Questão editada com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Questão não editada com sucesso!</div>"];
    }
}

echo json_encode($retorna);