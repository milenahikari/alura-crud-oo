<?php 
    require_once("cabecalho.php");

    $categoria = new Categoria();
    $categoria->setId($_POST['categoria_id']);

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    
    if(array_key_exists('usado', $_POST)){
        $usado = "true";
    } else{
        $usado = "false";
    }

    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
    $produto->setId($_POST['id']);
        
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