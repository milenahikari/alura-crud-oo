<?php
    //Começa a sessao: utiliza a sessão atual ou cria
    session_start(); 

    function usuarioEstaLogado(){
        return isset($_SESSION["usuario_logado"]);
    }
    function verificaUsuario(){
        if(!usuarioEstaLogado()){
            $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
            header("Location: index.php?falhaDeSeguranca=true");
            die();
        }
    }
    function usuarioLogado(){
        return $_SESSION["usuario_logado"];
    }
    function logaUsuario($email){
        $_SESSION["usuario_logado"] = $email;
    }
    function logout(){
        session_destroy();
        session_start();
    }