<?php   
    require_once("cabecalho.php");
    require_once("banco-produto.php");
    require_once("logica-usuario.php");

    $id = $_POST['id'];
    removeProduto($conexao, $id);
    $_SESSION["success"] = "Produto removido com sucesso!";
    //REDIRECIONAR PAGINA
    header("Location: produto-lista.php");
    //SEMPRE DEPOIS DE UM LOCATION, FAZER O PHP ENCERRAR AQUI
    die();
?>

   