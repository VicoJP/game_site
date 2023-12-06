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
    <div class="corpo login" id="game_edit">
        <?php
             $jogo = $_GET['cod'];
        if (!is_admin() && !is_editor()) {
            echo msg_erro("Área restrita! Você não tem permissão para editar o jogo!");
        } else {
            if (!isset($_POST['nomeJogo'])) {
                require 'game-edit-form.php';
            } else {
                $nomeJogo = $_POST['nomeJogo'] ?? null;
                $nota = $_POST['nota'] ?? null;
                $genero = $_POST['genero'] ?? null;
                $produtora = $_POST['produtora'] ?? null;
                $descricao = $_POST['descricao'] ?? null;
                $arquivo = $_FILES['arquivo'] ?? null;

                $q = "UPDATE jogos SET nome = '$nomeJogo', nota = '$nota', genero = '$genero', produtora = '$produtora', descricao = '$descricao'";

                if(!is_null($arquivo)){
                    $arquivoNome = $arquivo['name'];
                    include 'upload.php';
                    $q .= ", capa = '$arquivoNome' where cod = '$jogo'";
                } else {
                    $q .= " where cod = '$jogo'";
                }
                    if ($busca = $banco->query($q)){
                        echo msg_sucesso("Jogo alterado com suceso!");
                    } else {
                        echo msg_erro("Não foi possível alterar os dados.");
                    }
                }

                
            }
        
        ?>
                <a href="index.php" class="voltar"><span class="material-icons">arrow_back_ios</span></a>
    </div>
</body>

</html>