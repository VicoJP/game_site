<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/function.php";
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
    <link rel="stylesheet" href="./estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="icones/icon_page3.png" type="image/x-icon">
</head>

<body>
    <div class="corpo">
        <?php
        logout();
        header("Location: index.php");

        exit;
        ?>
        <a href="index.php"><span class="material-icons">arrow_back_ios</span></a>
    </div>
    <?php require_once "rodape.php";?>
</body>

</html>