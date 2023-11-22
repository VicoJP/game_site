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
    <div id="corpo">
        <?php
        if (!is_admin()) {
            echo msg_erro('Área restrita! Você não é administrador!');
        } else {
            if (!isset($_POST['usuario'])) {
                require "user-new-form.php";
            } else {
                $usuario = $_POST['usuario'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;
                $tipo = $_POST['tipo'] ?? null;

                if($senha1 === $senha2){
                    if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                        echo msg_erro("Todos os dados são obrigatórios!");
                    } else {
                        $senha = gerarHash($senha1);
                        $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                        try {
                            if ($banco->query($q)) {
                                echo msg_sucesso("Usuário $nome cadastrado com sucesso!");
                            } else {
                                echo msg_erro("Não foi possível criar o usuário $usuario.");
                            }
                        } catch (mysqli_sql_exception $o) {
                            if ($o->getCode() === 1062) {
                                echo msg_erro("O usuário $usuario já existe. Escolha um usuário diferente.");
                            } else {
                                echo msg_erro("Ocorreu um erro durante a criação do usuário.");
                            }
                        }
                    }
                } else {
                    echo msg_erro("Senhas não conferem. Repita o procedimento.");
                }
            }
        }

        ?>
        <a href="index.php"><span class="material-icons">arrow_back_ios</span></a>

    </div>
    <?php require_once "rodape.php";?>
</body>

</html>