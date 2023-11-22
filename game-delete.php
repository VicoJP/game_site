<?php
require_once "includes/banco.php";
require_once "includes/function.php";

if (isset($_POST['gameid'])) {
    $idJogo = $_POST['gameid'];

    $q = "DELETE from jogos WHERE cod = '$idJogo'";

    if ($busca = $banco->query($q)) {
        echo msg_sucesso(" $idJogo Deletado com sucesso!");
    } else {
        echo msg_erro("Nao foi possivel deletar");
    }
}

?>