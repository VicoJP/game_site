<?php
$pasta_destino = 'C:\\xampp\\htdocs\\site_game\\fotos\\';

$nome_arquivo = $_FILES['arquivo']['name'];
$caminho_arquivo = "$pasta_destino" . "$nome_arquivo";



if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho_arquivo)) {
    echo 'Arquivo enviado com sucesso!';
} else {
    echo 'Falha ao mover o arquivo para a pasta de destino.';
}

?>