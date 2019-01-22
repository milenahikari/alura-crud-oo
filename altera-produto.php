<?php 
    require_once("cabecalho.php");

    $produto_id = $_POST['id'];
    $tipoProduto = $_POST['tipoProduto'];
    $categoria_id = $_POST['categoria_id'];

    $factory = new ProdutoFactory();
    $produto =$factory->criaPor($tipoProduto, $_POST);
    $produto->atualizaBaseadoEm($_POST);

    $produto->setId($produto_id);
    $produto->getCategoria()->setId($categoria_id);
    
    if(array_key_exists('usado', $_POST)){
        $produto->setUsado("true");
    } else{
        $produto->setUsado("false");
    }
        
    $produtoDao = new ProdutoDao($conexao);

    if($produtoDao->alteraProduto($produto)) { ?>
        <p class="text-success">O Produto <?= $produto->getNome() ?> R$ <?= $produto->getPreco()?> foi alterado!</p>
    <?php } else { 
         $msg = mysqli_error($conexao);    
    ?>
        <p class="text-danger">O produto <?= $produto->getNome()?> não foi alterado: <?=$msg?></p>
    <?php
    }

    //FECHA CONEXAO. O PHP FECHA AUTOMATICAMENTE A CONEXAO QUANDO TERMINA DE PROCESSAR A PAGINA
    //mysqli_close($conexao);
    
?>
    
<?php include("rodape.php")?>              