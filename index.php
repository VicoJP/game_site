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
    <title>Lista de jogos</title>
    <link rel="stylesheet" href="./estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="icones/icon_page3.png" type="image/x-icon">
</head>

<body>
    <header>


        <?php
        $ordem = $_GET['o'] ?? "ord-nome-asc";
        $chave = $_GET['c'] ?? "";

        if ($chave === 'null') {
            $chave = "";
        }
        $pagina = 0;
        $limite = 10;
        if (isset($_GET['pagina']) && (int)$_GET['pagina'] >= 0) {
            $pagina = (int)$_GET['pagina'];
        } else {
            $pagina = 0;
        }
        $offset = $limite * $pagina;
        ?>
        <div class="logo">
            <!-- Logo -->
            <img src="icones/icon_page3.png" alt="logo" id="logo-img">
            <h1>Games Area</h1>
        </div>
        <?php include_once "topo.php"; ?>
    </header>

    <div class="corpo">
        <h1>Escolha seu jogo</h1>
        <div class="pag">
            <?php
            if ($pagina !== 0) {
                ?>
                <a href="index.php?pagina=<?php echo $pagina - 1; ?>" class="pag-anterior">Página Anterior</a>
            <?php
            }
            ?>
            <a href="index.php?pagina=<?php echo $pagina + 1; ?> " class="pag-posterior">Página Posterior</a>
        </div>
        <nav>
            <!-- <form method="get" id="busca" action="index.php">
                <table class="listagem">
                    <tr>
                        <td><td><a href="javascript:void(0);" onclick="alterarOrdem('ord-nome');" id="ord-nome" class="ordem">Nome <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a> 
                        <td><a href="javascript:void(0);" onclick="alterarOrdem('ord-prod');" id="ord-prod" class="ordem">Produtora <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a>
                        <td><a href="javascript:void(0);" onclick="alterarOrdem('ord-nota');" id="ord-nota" class="ordem">Nota <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a>
                        <td><a href="javascript:void(0);" onclick="alterarOrdem('ord-gen');" id="ord-gen" class="ordem">Gênero <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a>
                    </tr>
                </table>
            </form> -->
        </nav>
        <table class="listagem">
            <form method="get" id="busca" action="index.php">
                <tr>
                    <td><input type="text" id="pesquisa" name="c" size="10" maxlength="40"><input type="submit" value="OK"></td>
                    <td><a href="javascript:void(0);" onclick="alterarOrdem('ord-nome');" id="ord-nome" class="ordem">Nome <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a>
                    <td><a href="javascript:void(0);" onclick="alterarOrdem('ord-prod');" id="ord-prod" class="ordem">Produtora <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a>
                    <td><a href="javascript:void(0);" onclick="alterarOrdem('ord-nota');" id="ord-nota" class="ordem">Nota <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a>
                    <td><a href="javascript:void(0);" onclick="alterarOrdem('ord-gen');" id="ord-gen" class="ordem">Gênero <span class="material-icons up">expand_less</span> <span class="material-icons down">expand_more</span><span class="material-icons normal"> unfold_more </span> </a>
                </tr>
            </form>
            <?php
            $q = "select j.cod, j.nome, g.genero, j.capa, p.produtora, j.nota from jogos as j join generos as g on j.genero = g.cod join produtoras as p on j.produtora = p.cod ";
            if (!empty($chave)) {
                $q .= "WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%'";
            }
            switch ($ordem) {
                case "ord-prod":
                    $q .= "ORDER BY p.produtora ASC";
                    break;
                    case "ord-nota":
                        $q .= "ORDER BY j.nota ASC";
                        break;
                        case "ord-gen":
                    $q .= "ORDER BY j.genero ASC";
                    break;
                    case "ord-prod-desc":
                    $q .= "ORDER BY p.produtora DESC";
                    break;
                    case "ord-nota-desc":
                    $q .= "ORDER BY j.nota DESC";
                    break;
                    case "ord-gen-desc":
                        $q .= "ORDER BY j.genero DESC";
                        break;
                        case "ord-nome-desc":
                            $q .= "ORDER BY j.nome DESC";
                    break;
                    case "ord-nome":
                        $q .= "ORDER BY j.nome ASC";
                        break;
                        default:
                        $q .= "ORDER BY j.nome";
                        break;
                    }
                    $q .= " LIMIT $limite OFFSET $offset";
                    $busca = $banco->query($q);
                    if (!$busca) {
                        echo "<tr><td>Não foi possivel executar a busca";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td id='no-reg'>Nenhum registro encontrado";
                } else {
                    while ($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t' class='mini'/>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                        echo "<td>$reg->produtora";
                        echo "<td>$reg->nota";
                        echo "<td>$reg->genero";
                        if (is_admin()) {
                            echo "<td>";
                            echo "<a href='game-new.php'><span class='material-icons'>add_circle</span></a> ";
                            echo "<a href='game-edit.php?cod=$reg->cod'><span class='material-icons'>edit</span></a> ";
                            echo "<a href='#' class='delete-game' data-game-id='$reg->cod'><span class='material-icons'>delete</span></a>";
                        } else if (is_editor()) {
                            echo "<td>";
                            echo "<span class='material-icons'>edit</span> ";
                        }
                    }
                }
            }
            ?>
            <img src="/" alt="">
        </table>
    </div>
    <?php include_once "rodape.php"; ?>
</body>
<script>
    var noReg = document.getElementById('no-reg')
    console.log(noReg)
    var pagPost = document.querySelector('.pag-posterior')
    if (noReg) {
        pagPost.style.display = 'none';
    }
</script>
<script>
    var tipoOrdem = localStorage.getItem("tipoOrdem");
    var classeAtual = localStorage.getItem("ordemClass");
    var ordemElement = document.getElementById(tipoOrdem);
    if (classeAtual) {
        debugger
        ordemElement.className = classeAtual;
        
    }
    const mostrarTodos = document.getElementById('mostrar-todos');
    console.log(mostrarTodos);

    mostrarTodos.addEventListener('click', function() {
        localStorage.setItem("ordemClass", "ordem");
    })
</script>
<script src="excluir-jogo.js"></script>
<script src="filtrar.js"></script>

</html>