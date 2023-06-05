<?php
include_once("protectmn.php");

include_once("conexaomn.php");

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

  $query_questao = "SELECT * FROM quiz WHERE id = :id LIMIT 1";
  $result_questao = $conn->prepare($query_questao);
  $result_questao->bindParam(':id', $id);
  $result_questao->execute();

  $row_questao = $result_questao->fetch(PDO::FETCH_ASSOC);

  $retorna = ['erro' => false, 'dados' => $row_questao];

}else{
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma questão encontrada!</div>"];
}

echo json_encode($retorna);
