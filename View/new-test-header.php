<?php 
if (! isset($_SESSION)){
    session_start();
}

$name = $_SESSION["user"]["name"];
$EN = $_SESSION["user"]["id"];



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova prova: Cabeçalho</title>
    <link rel="stylesheet" href="../styles/make-test.css">
</head>
<body>
    <article>
        <form method="GET" action="/create-test-header">

            <label for="title">Insira o título da prova</label>
            <input type="text" name="title" id="title">
            
            <label for="classroom">Insira a turma</label>
            <input type="text" name="classroom" id="classroom">

            <input type="submit" value="Enviar">
        </form>
    </article>
</body>
</html>