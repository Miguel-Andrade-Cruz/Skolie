<?php 
    require_once __DIR__ . "/../src/display/display.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/homepage.css">
    <title>Skolie: Estude, o resto é com a gente</title>
</head>
<body>
    <main>
        <img src="/imgs/Logo.svg" alt="Skolie">
        <h1>Estude! O resto é com a gente</h1>
        
        <?php 
            if (isset($_GET["validate"])) {
                displayInvalidLogin($_GET["validate"]);
            }
        ?>

        <form action="/login" method="POST">
            
            <input type="email" name="email" class="info" id="email" placeholder="Email">
            
            <input type="password" name="password" class="info" id="password" placeholder="Senha">
            
            
            <input type="submit" id="submit" value="Entrar">
        </form>


    </main>
</body>
</html>