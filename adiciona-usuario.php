<?php
    require_once("cabecalho.php");
    require_once("banco-usuario.php");
    require_once("class/Usuario.php");

    $usuario = new Usuario();

    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    $usuario->nome = $_POST['nome'];

    if(insertUsuario($conexao, $usuario)){ ?>
        <p class="text-success">Usuário <?=$usuario->nome?> foi adicionado!</p>
    <?php } else{?> 
        <p class="text-danger">Usuário <?=$usuario->nome?> não foi adicionado. Preencha todos os campos!</p>
    <?php
    }
?>