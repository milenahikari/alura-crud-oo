<?php 
    require_once("cabecalho.php");
    /*Executa somente uma vez, se já tiver sido executaod não executa novamente*/
    require_once("banco-produto.php");
    require_once("logica-usuario.php");

    verificaUsuario();

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