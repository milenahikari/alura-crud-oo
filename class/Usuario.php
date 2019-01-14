<?php
    class Usuario {
        private $id;
        private $email;
        private $senha;
        private $nome;

        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            return $this->id = $id;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            return $this->email = $email;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            return $this->senha = $senha;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            return $this->nome = $nome;
        }

}