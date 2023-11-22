<?php

function thumb($arq)
{
    $caminho = "fotos/$arq";
    if (is_null($arq) || file_exists($arq)) {
        return "fotos/indisponivel.png";
    } else {
        return $caminho;
    }
}

function msg_sucesso($m){
    $resp = "<div class='sucesso'><p><span class='material-icons'>check_circle</span>$m</p></div>";
    return $resp;
}
function msg_aviso($m){
    $resp = "<div class='aviso'><p><span class='material-icons'>info</span>$m</p></div>";
    return $resp;
}
function msg_erro($m){
    $resp = "<div class='erro'><p><span class='material-icons'>error</span>$m</p></div>";
    return $resp;
}


?>