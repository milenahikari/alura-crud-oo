<?php   
    require_once("conecta.php");
    
    function buscaUsuario($conexao, $email, $senha){
        $senhaMd5 = md5($senha);
        /*Resolve o problema do usuário digitar aspas simples de modo o usuário não conseguir quebrar a query */
        $email = mysqli_real_escape_string($conexao, $email);
        $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
        $resultado = mysqli_query($conexao, $query);
        $usuario = mysqli_fetch_assoc($resultado);
        return $usuario;
    }

    function escapandoString($conexao, $item){
        return mysqli_real_escape_string($conexao, $item);
    }

    function insertUsuario($conexao, Usuario $usuario){
        $email = escapandoString($conexao, $usuario->getEmail());
        $senha = md5($usuario->getSenha());
        $nome = escapandoString($conexao, $usuario->getNome());

        if(!empty($email) && !empty($senha) && !empty($nome)){
            $query = "insert into usuarios (email, senha, nome) values ('{$email}', '{$senha}', '{$nome}')";
            return mysqli_query($conexao, $query);  
        } else{
            return false;
        }        
    }