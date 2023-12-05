<?php 
$jogo = $_GET['cod'];
$q = "SELECT j.cod, j.nome, g.genero, g.cod as generoCod, j.capa, p.produtora, p.cod as produtoraCod, j.nota, j.descricao from jogos as j join generos as g on j.genero = g.cod join produtoras as p on j.produtora = p.cod where j.cod = $jogo";

$busca = $banco->query($q);
$reg = $busca->fetch_object();

$genero = $reg->generoCod;
$produtora = $reg->produtoraCod;

?>

<form action="game-edit.php?cod=<?php echo "$jogo"?>" method="post" enctype="multipart/form-data" class="form login">
            <table>
                <tr>
                    <td>Nome do jogo</td>
                    <td><input type="text" name="nomeJogo" id="nomeJogo" maxlength="20" value="<?php echo $reg->nome ?>"></td>
                </tr>
                <tr>
                    <td>Nota</td>
                    <td><input type="number" name="nota" id="nota" value="<?php echo $reg->nota ?>"></td>
                </tr>
                <tr>
                    <td>Genero</td>
                    <td><select name="genero" id="genero" >
                        <?php 
                        $queryGenero = "SELECT * from generos";
                        $buscaGenero = $banco->query($queryGenero);

                        while($regG = $buscaGenero->fetch_object()){
                            $selected = ($regG->cod == $genero) ? "selected" : "";
                            echo "<option value='$regG->cod' $selected>$regG->genero</option>";
                        }
                        
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td>Produtora</td>
                    <td><select name="produtora" id="produtora">
                        <?php 
                        $queryProdutora = "SELECT * from produtoras";
                        $buscaProdutora = $banco->query($queryProdutora);
                        
                        while($regP = $buscaProdutora->fetch_object()){
                            $selected = ($regP->cod == $produtora) ? "selected" : "";
                            echo "<option value='$regP->cod' $selected>$regP->produtora</option>";
                        }
                        ?>
                        <option value="1">nome</option>
                    </select>
                </tr>
                <tr>
                    <td>Descricao</td>
                    <td><textarea name="descricao" id="descricao" value="<?php echo $reg->descricao ?>"><?php echo $reg->descricao ?></textarea></td>
                </tr>
                <tr>
                    <td>Envie a imagem</td>
                    <td class="img_edit"><img src="<?php $t = thumb($reg->capa); echo $t; ?>" class="full"></td>
                    <td><input type="file" name="arquivo" id="arquivo"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Salvar"></td>
                </tr>



            </table>


        </form>