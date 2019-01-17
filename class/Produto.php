<?php
    class Produto {
        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $categoria;
        private $usado;

        function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {
           $this->nome = $nome;
           $this->preco = $preco;
           $this->descricao = $descricao;
           $this->categoria = $categoria;
           $this->usado = $usado;
        }

        //Método para imprimir objeto
        function __toString() {
            return $this->nome . ": R$ " . $this->preco;
        }

        //Comportamento para quando objeto é destruido
        //Instancia objeto, popula e depois de usar, limpa da memória
        /*function __destruct() {
            echo "Produto destruido";
        }*/

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            return $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getCategoria() {
            return $this->categoria;
        }

        public function getUsado() {
            return $this->usado;
        }

        public function setUsado($usado) {
            return $this->usado = $usado;
        }

        //Metodo: comportamento da classe
        //Parametro: se não receber um parametro, a função faz o calculo com o valor padrão
        public function precoComDesconto($valor = 0.1) {
            if($valor > 0 && $valor <= 0.5){
                $this->preco -= $this->preco * $valor;
            }
            return $this->preco;
        }

        public function temIsbn() {
            //Se for uma instancia de livro retorna true
            return $this instanceof Livro;
        }

        public function calculaImposto() {
            return $this->preco * 0.195;         
        }
    }
