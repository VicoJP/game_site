<?php
$banco = new mysqli("localhost", "id21520094_vivico", "24@Vic#88976", "id21520094_bd_games");
//$banco = new mysqli("localhost", "root", "", "bd_games");
if ($banco->connect_errno) {
    die();
}
$banco->query("set names 'utf8'");
$banco->query("set character_set_connection=utf8");
$banco->query("set character_set_client=utf8");
$banco->query("set character_set_results=utf8");
?>
