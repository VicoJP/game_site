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
    <title>Login do usuário</title>
    <link rel="stylesheet" href="./estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="icones/icon_page3.png" type="image/x-icon">
    <style>
        table td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="corpo login" id="user_login">
        <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;

        if (is_null($u) || is_null($s)) {
            require "user-login-form.php";
        } else {
            $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
            $busca = $banco->query($q);
            if (!$busca) {
                echo msg_erro("Falha ao acessar o banco");
            } else {
                if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();
                    if (testarHash($s, $reg->senha)) {
                        header("Location: index.php");
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;
                        exit;
                    } else {
                        echo msg_erro("Senha inválida");
                    };
                } else {
                    echo msg_erro("Usuário não existe!");
                }
            }
        }
        ?>
        <a href="index.php" class="voltar"><span class="material-icons">arrow_back_ios</span></a>
    </div>
    <?php require_once "rodape.php"; ?>
</body>

</html>