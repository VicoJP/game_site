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

    <!-- <script>
        var produtoraEncontrada = <?php echo json_encode($produtoraExiste) ?>;
        if (produtoraEncontrada) {
            document.getElementById("cadastroProdutora").style.display("block");
        }
    </script> -->
</head>

<body>
    <div id="corpo">
        <h1>Cadastro de jogo</h1>
        <?php
        if (!is_admin()) {
            echo msg_erro("Área restrita! Você não é administrador!");
        } else {
            if (!isset($_POST['nome-jogo'])) {
                require "game-new-form.php";
            } else {
                $nomeJogo = $_POST['nome-jogo'] ?? null;
                $nota = $_POST['nota'] ?? null;
                $genero = $_POST['genero'] ?? null;
                $produtora = $_POST['produtora'] ?? null;
                $descricao = $_POST['descricao'] ?? null;
                $arquivo = $_FILES['arquivo'] ?? null;
                $arquivoNome = $arquivo['name'];
                include 'upload.php';
                if (empty($nomeJogo) || empty($nota) || empty($descricao) || empty($produtora) || empty($descricao)) {
                    echo msg_erro("Todos os dados são obrigatórios");
                } else {
                    $q = "INSERT into jogos (nome, genero, produtora, descricao, nota, capa) VALUES ('$nomeJogo', '$genero', '$produtora', '$descricao', '$nota', '$arquivoNome')";
                    if ($banco->query($q)) {
                        echo msg_sucesso("Adicionado o jogo $nomeJogo");
                    } else {
                        echo msg_erro("Não foi possivel adicionar o jogo $nome");
                    }
                }
            }
        }

        ?>
        <a href="index.php"><span class="material-icons">arrow_back_ios</span></a>
    </div>
</body>

</html>