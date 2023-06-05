<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "classe_jovem";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

} catch(PDOException $err){
    echo "Erro: Conezão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}
