<?php 
    require_once("cabecalho.php");
    require_once("banco-produto.php");
    require_once("class/Produto.php");
    require_once("class/Categoria.php");

    $produto = new Produto();
    $produto->setId($_POST['id']);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setDescricao($_POST['descricao']);

    $categoria = new Categoria();
    $categoria->setId($_POST['categoria_id']);
    
    if(array_key_exists('usado', $_POST)){
        $produto->setUsado("true");
    } else{
        $produto->setUsado("false");
    }

    $produto->setCategoria($categoria);
        
    if(alteraProduto($conexao, $produto)) { ?>
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