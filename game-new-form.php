<form action="game-new.php" method="post" enctype="multipart/form-data" class="form login">
    <table>
        <tr>
            <td>Nome do jogo</td>
            <td><input type="text" name="nome-jogo" id="nome-jogo" size="20" maxlength="20"></td>
        </tr>
        <tr>
            <td>Nota</td>
            <td><input type="text" name="nota" id="nota" size="4" maxlength="4" pattern="\d+(\.\d{1,2})?"></td>
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
            <td><textarea name="descricao" id="descricao" cols="50" rows="5" maxlength="400"></textarea></td>
            <!-- <td><input type="text" name="descricao" id="descricao" size="50" maxlength="400" oninput="autoExpand(this)"></td> -->
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

<script>
    function autoExpand(element) {
    const maxWidth = 300;
    element.style.height = 'auto';

    const currentWidth = element.scrollWidth;

    if (currentWidth > maxWidth) {
        element.style.heigh
    }
    element.style.height = (element.scrollHeight) + 'px';

    

    console.log('teste')
}

</script>