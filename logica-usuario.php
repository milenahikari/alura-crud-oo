<?php
    //Começa a sessao: utiliza a sessão atual ou cria
    session_start(); 

    /*Colocar usuario logado*/
    function logaUsuario($email){
        $_SESSION["usuario_logado"] = $email;
    }

    /*Verifica se o usuario está logado*/
    function usuarioEstaLogado(){
        return isset($_SESSION["usuario_logado"]);
    }

    /*Usuário não está logado e tenta usar aplicacao*/
    function verificaUsuario(){
        if(!usuarioEstaLogado()){
            $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
            header("Location: index.php?falhaDeSeguranca=true");
            die();
        }
    }

    /*Voce está logado como:*/
    function usuarioLogado(){
        return $_SESSION["usuario_logado"];
    }
    
    function logout(){
        session_destroy();
        session_start();
    }