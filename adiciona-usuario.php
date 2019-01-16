<?php
    require_once("cabecalho.php");
    require_once("banco-usuario.php");

    $usuario = new Usuario();

    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setNome($_POST['nome']);

    if(insertUsuario($conexao, $usuario)){ ?>
        <p class="text-success">Usuário <?=$usuario->getNome()?> foi adicionado!</p>
    <?php } else{?> 
        <p class="text-danger">Usuário <?=$usuario->gettNome()?> não foi adicionado. Preencha todos os campos!</p>
    <?php
    }
?>