<?php
    class UsuarioDao{
        private $conexao;

        function __construct($conexao) {
            $this->conexao = $conexao;
        }

        function buscaUsuario($email, $senha){
            $senhaMd5 = md5($senha);
            /*Resolve o problema do usuário digitar aspas simples de modo o usuário não conseguir quebrar a query */
            $email = mysqli_real_escape_string($this->conexao, $email);
            $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
            $resultado = mysqli_query($this->conexao, $query);
            $usuario = mysqli_fetch_assoc($resultado);
            return $usuario;
        }
    
        function insertUsuario(Usuario $usuario){
            $email = mysqli_real_escape_string($this->conexao, $usuario->getEmail());
            $senha = md5($usuario->getSenha());
            $nome = mysqli_real_escape_string($this->conexao, $usuario->getNome());
    
            if(!empty($email) && !empty($senha) && !empty($nome)){
                $query = "insert into usuarios (email, senha, nome) values ('{$email}', '{$senha}', '{$nome}')";
                return mysqli_query($this->conexao, $query);  
            } else{
                return false;
            }        
        }
    }
?>