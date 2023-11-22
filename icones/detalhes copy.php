<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
    <link rel="stylesheet" href="./estilos/estilo.css">
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/function.php";
    ?>
    <div id="corpo">
        <?php
        $c = $_GET['cod'] ?? 0;
        $busca = $banco->query("select * from jogos where cod = '$c'");
        ?>
        <h1>Detalhes do jogo</h1>

        <table class='detalhes'>
            <tr>
                <td rowspan='3'>foto</td>
                <td>Nome do Jogo</td>
            </tr>
            <tr>
                <td>Descricao</td>
            </tr>
            <tr>
                <td>Adm</td>
            </tr>

        </table>
    </div>
</body>

</html>