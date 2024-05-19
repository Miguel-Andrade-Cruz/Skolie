<?php

$modelTest = $_SESSION["models"];
require_once __DIR__ . "/../src/Display/display.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <link rel="stylesheet" href="styles/teacher.css">
</head>
<body>
    <nav>
        <h1><?= $_SESSION["user"]["name"] ?></h1>
        <h2><?= $_SESSION["user"]["id"] ?></h2>
        
        <p>Minhas provas</p>
        <p>Acompanhamento</p>
        <a href="/create-test-redirect">Nova prova</a>

        <a href="/logout">Sair</a>
    </nav>
    <main>

        <?php
        foreach($modelTest as $frameContent){
        
            echo displayFrame($frameContent);
        }
        ?>

    </main>
</body>
</html>