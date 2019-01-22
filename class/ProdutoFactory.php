<?php
    /* Classe de criação : PRODUTO FACTORY
    - Classe que encapsula a criação de produtos: Dado um tipo de produto a classe cria esse produto desde que o tipo seja válido */
    class ProdutoFactory {
        private $classes = array("LivroFisico", "Ebook");

        public function criaPor($tipoProduto, $params) {

            //extraindo os valores 
            $nome = $params['nome'];
            $preco = $params['preco'];
            $descricao = $params['descricao'];
            $categoria = new Categoria();
            $usado = $params['usado'];

            //testando se o $tipoProduto existe no array $classes
            if (in_array($tipoProduto, $this->classes)) {
                //instanciando o objeto
                return new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
            }

            //se nao encontramos nada, vamos criar um produto: 
            return new LivroFisico($nome, $preco, $descricao, $categoria, $usado);
        }
    
    }
