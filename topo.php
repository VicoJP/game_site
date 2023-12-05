<?php 
if (empty($_SESSION['user'])){
    echo "<div class='entrar'><a href='user-login.php'> Entrar </a></div>";
} else {
    echo "<div class='entrar logado'><a href='user-edit.php'> Meus dados </a> ";
    if (is_admin()) {
        echo "<a href='user-new.php'> Novo usuário </a>";
        echo "<a href='game-new.php'> Novo jogo </a>";
    }
    echo "<a href='user-logout.php'>Sair</a></div>";
}

?>
