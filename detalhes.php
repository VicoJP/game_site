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
    <title>Lista de jogos</title>
    <link rel="stylesheet" href="./estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="icones/icon_page3.png" type="image/x-icon">
</head>

<body>
    <div id="corpo">
        <?php
        $c = $_GET['cod'] ?? 0;
        $busca = $banco->query("select * from jogos where cod = '$c'");
        ?>
        <table class='detalhes'>
            <?php
            if (!$busca) {
                echo "Busca falhou! $banco->error";
            } else {
                if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    echo "<tr><td rowspan='3'><img src='$t' alt='/$t' class='full'></td>";
                    echo "<td><h2>$reg->nome</h2>";
                    echo "Nota: " .  number_format($reg->nota, 1) . "/10.0";
                   
                    echo "<tr><td>$reg->descricao</td></tr>";
                } else {
                    echo "<tr><td>Nenhum registro encontrado</td></tr>";
                }
            }

            ?>

        </table>
        <a href="index.php"><span class="material-icons">arrow_back_ios</span></a>
    </div>
    <?php include_once "rodape.php"; ?>
</body>

</html>