<form action="game-new.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Nome do jogo</td>
            <td><input type="text" name="nome-jogo" id="nome-jogo" size="20" maxlength="20"></td>
        </tr>
        <tr>
            <td>Nota</td>
            <td><input type="number" name="nota" id="nota" size="4" maxlength="4"></td>
        </tr>
        <tr>
            <td>Gênero</td>
            <td>
                <select name="genero" id="genero">
                    <?php 
                        $queryGenero = "SELECT * from generos";
                        $buscaGenero = $banco->query($queryGenero);
                        while($regG = $buscaGenero->fetch_object()){
                            echo "<option value='$regG->cod'>$regG->genero</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Produtora</td>
            <td>
                <select name="produtora" id="produtora">
                    <?php 
                        $queryProdutora = "SELECT * from produtoras";
                        $buscaProdutora = $banco->query($queryProdutora);
                        while ($regP = $buscaProdutora->fetch_object()){
                            echo "<option value='$regP->cod'>$regP->produtora</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><input type="text" name="descricao" id="descricao" size="50" maxlength="400"></td>
        </tr>
        <tr>
            <td>Envie a imagem</td>
            <td><input type="file" name="arquivo" id="arquivo"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Enviar"></td>
        </tr>


    </table>
</form>