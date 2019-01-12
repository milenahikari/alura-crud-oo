<?php 
    require_once("cabecalho.php");
    /*Executa somente uma vez, se já tiver sido executaod não executa novamente*/
    require_once("banco-produto.php");
    require_once("logica-usuario.php");

    verificaUsuario();
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];
    if(array_key_exists('usado', $_POST)){
        $usado = "true";
    } else{
        $usado = "false";
    }
        
    if(insertProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
        <p class="text-success">Produto <?= $nome ?> R$ <?= $preco?> adicionado com sucesso!</p>
    <?php } else { 
         $msg = mysqli_error($conexao);    
    ?>
        <p class="text-danger">O produto <?= $nome?> não foi adicionado. Preencha todos os campos! <?=$msg?></p>
    <?php
    }

    //FECHA CONEXAO. O PHP FECHA AUTOMATICAMENTE A CONEXAO QUANDO TERMINA DE PROCESSAR A PAGINA
    //mysqli_close($conexao);
    
?>
    
<?php include("rodape.php")?>               