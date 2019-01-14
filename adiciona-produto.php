<?php 
    require_once("cabecalho.php");
    /*Executa somente uma vez, se já tiver sido executaod não executa novamente*/
    require_once("banco-produto.php");
    require_once("logica-usuario.php");
    require_once("class/Produto.php");
    require_once("class/Categoria.php");

    verificaUsuario();

    $produto = new Produto();
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

    if(insertProduto($conexao, $produto)) { ?>
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