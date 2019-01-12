<?php
    require_once("cabecalho.php");
?>
    <h2>Cadastro de Usuários</h2>
    <form action="adiciona-usuario.php" method="post">
        <table class="table">
            <tr>
                <td>Nome:</td>
                <td><input class="form-control" type="text" name="nome"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input class="form-control" type="email" name="email"></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input class="form-control" type="password" name="senha"></td>
            </tr>
        </table>
        <button class="btn btn-primary botao">Cadastrar</button>
    </form>

<?php 
    require_once("rodape.php");
?>