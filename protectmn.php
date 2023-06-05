<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>

</head>
<body>
    
</body>
</html>

<?php
if(!isset($_SESSION)){
    session_start();
}


if(!isset($_SESSION['id'])){
    echo "<div class='alert alert-danger' role='alert'>Você não pode acessar essa página pois não está logado.</div> <br>
    <div class='alert alert-info' role='alert'>
    <a href='login.php'>Login</a> 
    </div>'";
}
?>

