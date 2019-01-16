<?php  
    require_once("cabecalho.php");
    require_once("logica-usuario.php");
    
    $usuarioDao = new UsuarioDao($conexao);
    
    $usuario = $usuarioDao->buscaUsuario($_POST["email"], $_POST["senha"]);

    if($usuario == null){
        $_SESSION["danger"] = "Usuário ou senha inválido!";
        header("Location: index.php");
    }else{
        $_SESSION["success"] = "Usuário logado com sucesso!";
        logaUsuario($usuario["email"]);
        header("Location: index.php");
    }
    die();


