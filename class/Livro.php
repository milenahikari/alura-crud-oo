<?php
    //Classe livro herda atributos de produto
    class Livro extends Produto{
        private $isbn;

        public function getIsbn() {
            return $this->isbn;
        }

        public function setIsbn($isbn) {
            return $this->isbn = $isbn;
        }

        //Reescrita de metodo da classe pai
        public function calculaImposto() {
           return $this->getPreco() * 0.065; 
        }
    }