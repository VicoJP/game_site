<?php

$banco = new mysqli("127.0.0.1", "root", "", "bd_games");
if ($banco->connect_errno) {
    echo "<p> Encontrei um erro $banco->errno --> $banco->connect_error</p>";
    die();
}

$banco->query("set names 'utf8'");
$banco->query("set character_set_connection=utf8");
$banco->query("set character_set_client=utf8");
$banco->query("set character_set_results=utf8");



?>
