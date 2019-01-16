<?php   
    require_once("cabecalho.php");
    require_once("logica-usuario.php");

    $produtoDao = new ProdutoDao($conexao);

    $id = $_POST['id'];
    $produtoDao->removeProduto($id);
    $_SESSION["success"] = "Produto removido com sucesso!";
    //REDIRECIONAR PAGINA
    header("Location: produto-lista.php");
    //SEMPRE DEPOIS DE UM LOCATION, FAZER O PHP ENCERRAR AQUI
    die();
?>

   