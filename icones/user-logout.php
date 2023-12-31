<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/function.php";
require_once "includes/login.php";
?>

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
    <div id="corpo">
        <?php
        logout();
        echo msg_sucesso("Usuário desconectado!");
        ?>
        <a href="index.php"><span class="material-icons">arrow_back_ios</span></a>
    </div>
    <?php require_once "rodape.php";?>
</body>

</html>