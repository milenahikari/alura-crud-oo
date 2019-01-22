<?php
    //Classe livro herda atributos de produto
    //Classe livro é uma abstração de um livro, ou seja, contém as regras de negócio de um livro mas não podemos instancia-lo
    abstract class Livro extends Produto{
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