<h1>Novo usuário</h1>
<form action="user-new.php" method="post" class="form login">

    <table>
        <tr>
            <td>Usuário</td>
            <td><input type="text" name="usuario" id="usuario" maxlength="10" placeholder="Digite o usuário"></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><input type="text" name="nome" id="nome" maxlength="30" placeholder="Digite o nome"></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td><select name="tipo" id="tipo">
                <option value="admin">Administrador do Sistema</option>
                <option value="editor" selected>Editor Autorizado</option>
            </select></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type="password" name="senha1" id="senha1" maxlength="10" placeholder="******"></td>
        </tr>
        <tr>
            <td>Confirme a senha</td>
            <td><input type="password" name="senha2" id="senha2" maxlength="10" placeholder="******"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Salvar"></td>
        </tr>
    </table>

</form>