<?php
    require("class/Produto.php");

    $produto = new Produto();
    $produto->setNome("Livro de Literatur");
    $produto->setPreco(59.9);

    $outroProduto = new Produto();
    $outroProduto->setNome("Livro de Literatura");
    $outroProduto->setPreco(59.9);

    $outroProduto = $produto;

    /* 
        == Verifica igualdade entre os atributos dos objetos
        === Verifica igualdade da instância dos objetos
    */
    if($produto === $outroProduto) {
        echo "São iguais";
    } else {
        echo "São diferentes";
    }
?>