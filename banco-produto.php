<?php
    require_once("conecta.php");
    require_once("class/Produto.php");
    require_once("class/Categoria.php");

    function listaProdutos($conexao){
        $produtos = array();
        $resultado = mysqli_query($conexao
        , "select p.*, c.nome as categoria_nome
           from produtos as p 
           join categorias as c on
           c.id=p.categoria_id");
        while($produto_array = mysqli_fetch_assoc($resultado)){

            $categoria = new Categoria();
            $categoria->nome = $produto_array['categoria_nome'];

            $produto = new Produto();
            $produto->id = $produto_array['id'];
            $produto->nome = $produto_array['nome'];
            $produto->preco = $produto_array['preco'];
            $produto->descricao = $produto_array['descricao'];
            $produto->categoria = $categoria;
            $produto->usado = $produto_array['usado'];
            
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function escapandoString($conexao, $item){
        return mysqli_real_escape_string($conexao, $item);
    }

    function insertProduto($conexao, Produto $produto) {
        $nome = escapandoString($conexao, $produto->nome);
        $preco = escapandoString($conexao, $produto->preco);
        $descricao = escapandoString($conexao, $produto->descricao);
        $categoria = escapandoString($conexao, $produto->categoria->id);
        $usado = $produto->usado;

        if(!empty($nome) && !empty($preco) && !empty($categoria)){
            $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', '{$categoria}', {$usado})";
            return mysqli_query($conexao, $query);
        } else {
            return false;
        }
    }

    function alteraProduto($conexao, $produto){
        $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', categoria_id = {$produto->categoria->id}, 
        usado = {$produto->usado} where id = '{$produto->id}'";
        return mysqli_query($conexao, $query);
    }

    function buscaProduto($conexao, $id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);
    
        $categoria = new Categoria();
        $categoria->id = $produto_buscado['categoria_id'];
    
        $produto = new Produto();
        $produto->id = $produto_buscado['id'];
        $produto->nome = $produto_buscado['nome'];
        $produto->descricao = $produto_buscado['descricao'];
        $produto->categoria = $categoria;
        $produto->preco = $produto_buscado['preco'];
        $produto->usado = $produto_buscado['usado'];
    
        return $produto;
    }

    function removeProduto($conexao, $id){
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($conexao, $query);
    }
