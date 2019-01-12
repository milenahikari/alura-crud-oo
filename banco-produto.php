<?php
    require_once("conecta.php");
    function listaProdutos($conexao){
        $produtos = array();
        $resultado = mysqli_query($conexao
        , "select p.*, c.nome as categoria_nome
           from produtos as p 
           join categorias as c on
           c.id=p.categoria_id");
        while($produto = mysqli_fetch_assoc($resultado)){
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function escapandoString($conexao, $item){
        return mysqli_real_escape_string($conexao, $item);
    }

    function insertProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
        $nome = escapandoString($conexao, $nome);
        $preco = escapandoString($conexao, $preco);
        $descricao = escapandoString($conexao, $descricao);
        $categoria_id = escapandoString($conexao, $categoria_id);

        if(!empty($nome) && !empty($preco) && !empty($categoria_id)){
            $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', '{$categoria_id}', {$usado})";
            return mysqli_query($conexao, $query);
        } else {
            return false;
        }
    }

    function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){
        $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, 
        usado = {$usado} where id = '{$id}'";
        return mysqli_query($conexao, $query);
    }

    function buscaProduto($conexao, $id){
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function removeProduto($conexao, $id){
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($conexao, $query);
    }
