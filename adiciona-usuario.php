<?php
    require_once("cabecalho.php");

    $usuario = new Usuario();

    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setNome($_POST['nome']);

    $usuarioDao  = new UsuarioDao($conexao);

    if($usuarioDao->insertUsuario($usuario)){ ?>
        <p class="text-success">Usuário <?=$usuario->getNome()?> foi adicionado!</p>
    <?php } else{?> 
        <p class="text-danger">Usuário <?=$usuario->gettNome()?> não foi adicionado. Preencha todos os campos!</p>
    <?php
    }
?>