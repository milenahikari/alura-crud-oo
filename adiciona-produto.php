<?php 
    require_once("cabecalho.php");
    /*Executa somente uma vez, se já tiver sido executaod não executa novamente*/
    require_once("logica-usuario.php");

    verificaUsuario();

    $tipoProduto = $_POST['tipoProduto'];
    $categoria_id = $_POST['categoria_id'];

    $factory = new ProdutoFactory();
    $produto = $factory->criaPor($tipoProduto, $_POST);
    $produto->atualizaBaseadoEm($_POST);

    $produto->getCategoria()->setId($categoria_id);

    if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
    } else{
        $produto->setUsado("false");
    }

    $produtoDao = new ProdutoDao($conexao);

    if($produtoDao->insertProduto($produto)) { ?>
        <p class="text-success">Produto <?= $produto->getNome() ?> R$ <?= $produto->getPreco()?> adicionado com sucesso!</p>
    <?php } else { 
         $msg = mysqli_error($conexao);    
    ?>
        <p class="text-danger">O produto <?= $produto->getNome()?> não foi adicionado. Preencha todos os campos! <?=$msg?></p>
    <?php
    }

    //FECHA CONEXAO. O PHP FECHA AUTOMATICAMENTE A CONEXAO QUANDO TERMINA DE PROCESSAR A PAGINA
    //mysqli_close($conexao);
    
?>
    
<?php include("rodape.php")?>               