<?php
    $conexao = mysqli_connect("localhost", "root", "", "loja");

/*
     $conexao = mysqli_connect("localhost", "id8112138_milena", "123456", "id8112138_loja");
    CONECTAR NO MYSQL COM FUNÇÃO QUE CRIA E DEVOLVE A CONEXAO
    ip, usuario, senha, nomeBanco

    Boa prática:
    - Quando o arquivo só irá ter arquivos .php, é uma boa 
    prática não fechar a tag do php no final
 */